'use strict';

var app = angular.module('builderApp', ['ngSanitize','ui.select','mgo-angular-wizard','restangular','ui-notification','oitozero.ngSweetAlert','ui.bootstrap','frapontillo.bootstrap-duallistbox','daterangepicker']);

app.run(function(Restangular, $rootScope) {
    $rootScope.baseUrl = angular.element('#url').val();
    Restangular.setBaseUrl($rootScope.baseUrl);
});

app.config(function($interpolateProvider,RestangularProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');


    RestangularProvider.addResponseInterceptor(parseApiResponse);
    function parseApiResponse(data, operation) {
        var response = data;
        if (operation === 'getList' && data.data) {
            response = data.data;
            response.metadata = _.omit(data, 'data');
        }
        return response;
    }
});

/*************************************************
 * App Controllers
 *************************************************/
app.controller('builder', function($scope,Restangular,Notification,SweetAlert,$rootScope,$timeout,$window) {

   /**
     * default fields
     */
    NProgress.configure({minimum: 0.01,trickleRate: 0.03, trickleSpeed: 600, showSpinner: false});
    $scope.availableValidations = ['accepted',
            'active_url',
            'alpha',
            'alpha_dash',
            'alpha_num',
            'array',
            'boolean',
            'date',
            'distinct',
            'email',
            'filled',
            'image',
            'integer',
            'ip',
            'json',
            'numeric',
            'present',
            'required',
            'string',
            'timezone',
            'url'
        ];
    $scope.availableOptions = [];
    $scope.newItemNo = 1;
    $scope.finalModule={};
    $scope.finalModule.fields=[];
    $scope.fields =
        [{'index':$scope.newItemNo,title: 'field0',type:'string',length:30,htmlType:'text',validations:[],searchable:true,fillable:true,show:true,grid:true,select:[],radio:[],checkbox:1}];
    $scope.fieldTypes =[
       // {id:"increment",name:"increment"},
        {id:"string",name:"String"},
        {id:"integer",name:"integer"},
        {id:"smallinteger",name:"smallinteger"},
        {id:"double",name:"double"},
        {id:"float",name:"float"},
        {id:"char",name:"char"},
        {id:"decimal",name:"decimal"},
        {id:"dateTime",name:"dateTime"},
        {id:"date",name:"Date"},
        {id:"enum",name:"enum"},
        {id:"boolean",name:"boolean"},
        {id:"text",name:"text"}
    ];
    $scope.htmlTypes =[
        {id:"text",name:"Text"},
        {id:"email",name:"Email"},
        {id:"number",name:"Number"},
        {id:"date",name:"Date"},
        // {id:"file",name:"File"},
        {id:"password",name:"Password"},
        {id:"textarea",name:"Textarea"},
        {id:"select",name:"Select"},
        {id:"radio",name:"Radio"},
        {id:"checkbox",name:"Checkbox"},
        {id:"editor",name:"Editor"},
        {id:"image",name:"Image"},
        {id:"multipleImage",name:"Multiple Image"}
    ];
    var token = $('#_token').val();


    /**
     * Modules List
     */
    NProgress.start();
    Restangular.all('/admin/modules').getList().then(function (result) {
        $scope.moduleList = result;
        NProgress.done();
    });


    /**
     * Module Change Status
     */
    $scope.changeStatus = function(module){
        var token = $('#_token').val();
        Restangular.all('/admin/modules/disable')
            .customPOST({},"", {data:module.status, name:module.name}, {"X-CSRF-TOKEN":token})
            .then(function(result){
                $rootScope.$broadcast('modulelist.update');
        });
    };



    /**
     * Add new module
     */
    $scope.active=0;
    $scope.addNewModule = function(){
        $scope.showTab2 = true;
        //$('a[href="#tab1module"]').parent().removeClass('active');
        //$("#tab1module").removeClass('active in');
        $scope.active=1;
        $scope.updateMode = false;
        $scope.newItemNo = 1;
        $scope.finalModule={};
        $scope.finalModule.fields=[];
        $scope.fields =
            [{'index':$scope.newItemNo,title: 'field0',type:'string',length:30,htmlType:'text',validations:[],searchable:true,fillable:true,show:true,grid:true,select:[],radio:[],checkbox:1}];
    };


    /**
     * Watch field name for convert to lowercase
     */
    $scope.$watch('finalModule.name',function (newVal) {
        if($scope.finalModule.name) {
            $scope.finalModule.name = newVal.replace(/^\d+|[^a-zA-Z1-9]|\s+|_|-/g, '');
        }
    },true);
    $scope.correctNameField = function(){
        angular.forEach($scope.fields,function (value, key) {
			$timeout(function(){
				value.title = value.title.toLowerCase().replace(/^\d+|[^a-zA-Z1-9]|-|_|\s+|^id+$/g,'');
			},1000)           
        })
    };
    $scope.$watch('fields', $scope.correctNameField, true);



    /**
     * Add new field
     */
    $scope.addNewField = function() {
        var id = $scope.fields.length+1;
        $scope.fields.push({'index':id,'title':'field'+ id,type:'string',length:30,htmlType:'text',validations:[],select:[],radio:[],checkbox:1,grid:false,show:true,fillable:true,searchable:true});
    };


    /**
     * Remove field
     */
    $scope.removeField = function(item) {
        var index = $scope.fields.indexOf(item);
        $scope.fields.splice(index,1);
    };


    /**
     * Convert to Final JSON
     */
    $scope.convert = function(fields) {
        $scope.finalModule.fields = [];
        angular.forEach(fields, function (value, key) {
            var additonalHtmlType = '';
            switch (value.htmlType) {
                case 'checkbox':
                    additonalHtmlType = ':' + value.checkbox;
                    break;
                case 'select':
                    additonalHtmlType = ':' + value.select;
                    break;
                case 'radio':
                    additonalHtmlType = ':' + value.radio;
                    break;
                default:
            }
            /* if fieldType equal enum it shouldn't has length */
            if(value.type!='string'){
                value.length = '';
            }

            /* check undefined length */
            var tempLength;
            if (value.length) {
                tempLength = ',' + value.length;
            } else {
                tempLength = '';
            }

            // prevent from ID import
            if (value.title != 'ID') {
                var tempField = {
                    fieldInput: value.title + ':' + value.type + tempLength,
                    htmlType: value.htmlType + additonalHtmlType,
                    validations: value.validations + '',
                    searchable: value.searchable,
                    fillable: value.fillable,
                    inForm: value.show,
                    inGrid: value.grid
                };

                // remove property that equal false
                Object.keys(tempField).forEach(function (key, index) {
                    if (tempField[key] === false) {
                        delete tempField[key];
                    }
                });

                /* Convert comma to pipe */
                tempField.validations = tempField.validations.replace(/,/g, "|");

                $scope.finalModule.fields.push(tempField);
            } else {
                console.log('You don\'t need to to add ID field to system. CRUD builder added automatically a ID for any module. we skip it.');
            }
        });
    };

    /**
     * save module
     * @param fields
     */
    $scope.save = function(fields){
        // convert fields
        $scope.convert(fields);
        $scope.disable = true;
        // Ajax Request
        var token = $('#_token').val();
        NProgress.start();
        Restangular.all('/admin/modules')
            .customPOST({}, "", {name:$scope.finalModule.name,description: $scope.finalModule.description,fields:[$scope.finalModule.fields]}, {"X-CSRF-TOKEN":token})
            .then(function(data){
                Restangular.all('/admin/modules/new')
                    .customPOST({}, "", data.success, {"X-CSRF-TOKEN":token})
                    .then(function(result){
                        Notification({
                            message:'Module added successfully',
                            templateUrl:'../assets/vendors/angular-ui-notification/tpl/success.tpl.html'
                        },'success');
                        $rootScope.$broadcast('modulelist.update');
                        NProgress.done();
                        $scope.finalModule={};
                        $scope.finalModule.fields = [];
                        $scope.fields =
                            [{'index':$scope.newItemNo,title: 'field0',type:'string',length:30,htmlType:'text',validations:[],searchable:true,fillable:true,show:true,grid:true,select:[],radio:[],checkbox:1}];
                        $scope.disable = false;

                        swal({
                            title: 'Generated',
                            text: 'Module generated successfully',
                            type:"success",
                            confirmButtonText: 'Ok'
                        });
                        location.reload();

                    },function(response){
                        NProgress.done();
                        Notification({
                            message: response ,
                            templateUrl:'../assets/vendors/angular-ui-notification/tpl/validation.tpl.html'
                        },'warning');
                        $scope.disable = false;
                    })
            },function(response) {
                NProgress.done();
                Notification({
                    message: response.data.error ,
                    templateUrl:'../assets/vendors/angular-ui-notification/tpl/validation.tpl.html'
                },'warning');
                //$rootScope.$broadcast('task.validationError',response.data.error);
                $scope.disable = false;
            })

    };

    /**
     * Delete Module
     */
    $scope.delete = function(module){
        var token = $('#_token').val();
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    swal.enableLoading();
                    NProgress.start();
                    Restangular.one('/admin/modules',module.id).remove({},{"X-CSRF-TOKEN":token}).then(function(result){
                        Restangular.one('/admin/modules/modulerollback')
                            .customPOST({}, "", {first_module:result.first_module,page:'delete_module'}, {"X-CSRF-TOKEN":token})
                            .then(function(result){
                                $rootScope.$broadcast('modulelist.update');
                                resolve();
                            },function(response){
                                NProgress.done();
                                swal({
                                    title: 'Failed',
                                    text: 'Error in rollback process.',
                                    type:"error",
                                    confirmButtonText: 'Ok'
                                })
                            });
                    },function(response){
                        NProgress.done();
                        swal({
                            title: 'Failed',
                            text: response.data.error,
                            type:"error",
                            confirmButtonText: 'Ok'
                        })
                    })
                });
            }
            }).then(function(result){
                NProgress.done();
                if (result) {
                    swal({
                        title: 'Deleted',
                        text: 'Module deleted successfully',
                        type:"success",
                        confirmButtonText: 'Ok'
                    })
                }
            });
    };


    /**
     * Edit Module
     */
    $scope.editModule = function(module){
        $scope.showTab2 = false;
        var moduleId = module.id;
        var token = $('#_token').val();
        NProgress.start();
        Restangular.one('/admin/modules/'+moduleId+'/edit').get()
            .then(function(result){
                NProgress.done();
                $scope.finalModule = result;
                var tempfields = JSON.parse(result.fields);

                // active tab 2
                $scope.showTab2 = true;
                $scope.active = 1;
                $scope.updateMode = true;

                // reversConvert
                $scope.fields =[];
                var field ={};
                angular.forEach(tempfields,function(key,value){
                    var tmpArr = key.fieldInput.split(/(,|:)/i);// parse by (:,) an insert in array
                    var tmpHtmlTypeArr = key.htmlType.split(":");// parse by (:) an insert in array
                    if(tmpHtmlTypeArr[1]){
                        var tmpHtmlTypeSelectRadioArr = tmpHtmlTypeArr[1].split(",");
                    }
                    var tmpValidArr = key.validations.split('|');// parse by (|) and insert to array
                    if(tmpValidArr[0]===""){// check if null
                        tmpValidArr=[];
                    }

                    /* add exist property to field */
                    field['title'] =  tmpArr[0];
                    field['type'] =  tmpArr[2];
                    if(tmpArr[4]){
                        field['length'] =  JSON.parse(tmpArr[4]);
                    }else{
                        field['length'] = '';
                    }
                    field['htmlType'] = tmpHtmlTypeArr[0];
                    switch (field['htmlType']) {
                        case 'checkbox':
                            field['checkbox'] =  tmpHtmlTypeArr[1];
                            break;
                        case 'select':
                            field['select'] = tmpHtmlTypeSelectRadioArr;
                            break;
                        case 'radio':
                            field['radio'] = tmpHtmlTypeSelectRadioArr;
                            break;
                        default:
                    }

                    field['validations'] = tmpValidArr;
                    if(key.searchable){
                        field['searchable'] = JSON.parse(key.searchable);
                    }else{
                        field['searchable'] = false;
                    }

                    if(key.fillable){
                        field['fillable'] = JSON.parse(key.fillable);
                    }else{
                        field['fillable'] = false;
                    }

                    if(key.inForm){
                        field['show'] = JSON.parse(key.inForm);
                    }else{
                        field['show'] = false;
                    }

                    if(key.inGrid){
                        field['grid'] = JSON.parse(key.inGrid);
                    }else{
                        field['grid'] = false;
                    }

                    $scope.fields.push(field);
                    field ={};
                });
            },function(error){
                console.log(error);
                NProgress.done();
            })

    };


    /**
     * Update Module
     */
    $scope.update = function(fields) {
        // convert module fields
        $scope.convert(fields);

        var token = $('#_token').val();

        // confirm ajax
        swal({
            title: "Are you sure?",
            text: "Module's files and data will be deleted and generate again",
            type: "warning",
            confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function () {
                return new Promise(function (resolve) {
                    swal.enableLoading();
                    $scope.disable = true;
                    NProgress.start();
                    Restangular.all('/admin/modules/'+$scope.finalModule.id)
                        .customPUT({}, "", {name:$scope.finalModule.name,description: $scope.finalModule.description,fields:[$scope.finalModule.fields]}, {"X-CSRF-TOKEN":token})
                        .then(function(data){

                            Restangular.all('/admin/modules/updatesecondlevel')
                                .customPOST({}, "", data.success, {"X-CSRF-TOKEN":token})
                                .then(function(result){

                                    Restangular.all('/admin/modules/new')
                                        .customPOST({}, "", result.success, {"X-CSRF-TOKEN":token})
                                        .then(function(result){
                                            $rootScope.$broadcast('modulelist.update');
                                            NProgress.done();
                                            $scope.disable = false;
                                            resolve();
                                        })

                                },function(response){
                                    // Notification({
                                    //     message: response ,
                                    //     templateUrl:'../assets/vendors/angular-ui-notification/tpl/validation.tpl.html'
                                    // },'warning');
                                    swal({
                                        title: 'Failed',
                                        text: response,
                                        type:"error",
                                        confirmButtonText: 'Ok'
                                    });
                                    NProgress.done();
                                    $scope.disable = false;
                                });
                        },function(response) {
                            NProgress.done();
                            Notification({
                                message: response.data.error ,
                                templateUrl:'../assets/vendors/angular-ui-notification/tpl/validation.tpl.html'
                            },'warning');
                            swal({
                                title: 'Failed',
                                text: 'Module has validation error',
                                type:"error",
                                confirmButtonText: 'Ok'
                            });
                            $scope.disable = false;
                            //$rootScope.$broadcast('task.validationError',response.data.error);
                        })

                })
            }
        }).then(function (result) {
            NProgress.done();
            $scope.disable = false;
            if (result) {
                swal({
                    title: 'Regenerate',
                    text: 'Module Regenerate successfully',
                    type: "success",
                    confirmButtonText: 'Ok'
                })
            }
            location.reload();
        });
    };

    /** 
     * Reset Module
     */
    $scope.resetPlmb = function () {
        swal({
            title: 'Are you sure to reset PLMB?',
            text: "Reset PLMB affected on all users that view demo",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!'
        }).then(function(result) {
            if(result){
                $window.location.href = '/plmb/reset_page.php';
            };
        });
    };

    /******************
     * Event Listener
     *******************/
    $scope.$on('modulelist.update', function() {
        Restangular.all('/admin/modules').getList().then(function (result) {
            $scope.moduleList = result;
        });
    });







/*******************************************************************************************************************
 * Module Relationship Controller
 *
 *******************************************************************************************************************/

    /**
     * Default variable
     */
    $scope.relations = [];
    Restangular.all('/admin/relation/getrelation').getList().then(function(result){
        $scope.relations = result;

        // get all modules
        Restangular.all('/admin/modules').getList().then(function(result){
            $scope.moduleName = result;

            // process other relation
            if($scope.relations.length){
                angular.forEach($scope.relations,function (value, key) {
                    // initial second
                    $scope.initSecond($scope.moduleName,value.first);

                    // fetch fields
                    $scope.fetchFields(value.second)
                });

            }
        });
    });

    /**
     * Fetch Module
     * @param module
     */
    $scope.fetchFields = function(module){
        Restangular.all('/admin/relation/showcolumn/'+module).getList().then(function(result){
            $scope.avaliableFields = result;
        });
    };


    /**
     * new relation
     */
    $scope.addRelation = function(){
        $scope.relations.push({});
    };

    $scope.removeRelation = function(item){
        var index = $scope.relations.indexOf(item);
        $scope.relations.splice(index,1);
    };

    /* remove first module selected item from second module list */
    $scope.initSecond = function (moduleName,selected) {
        $scope.avalibaleModuleSecound = moduleName.filter(function(obj) {
            return obj.name !== selected;
        });
        $scope.avalibaleModuleSecound.push({id:0,name:'User'});
    };

    $scope.avalibaleRelationType = [{id: 0 , name:'Many-To-One'},{id:1 , name:'Many-To-Many'}];



    /**
     * update relation
     */
    // $scope.updateRelation = function (relation) {
    //     swal({
    //         title: 'Are you sure?',
    //         type: 'info',
    //         customClass: 'swal-wide',
    //         showCancelButton: true,
    //         allowOutsideClick: false,
    //         preConfirm: function() {
    //             return new Promise(function(resolve) {
    //                 swal.enableLoading();
    //                 Restangular.one('/admin/relation/'+relation.id)
    //                     .customPUT({}, "", relation, {"X-CSRF-TOKEN":token}).then(function(result){
    //                     resolve();
    //                 },function(response){
    //                     swal({
    //                         title: 'Failed',
    //                         text: 'Relation doesn\'t update.',
    //                         type:"error",
    //                         confirmButtonText: 'Ok'
    //                     })
    //                 })
    //             });
    //         }
    //     }).then(function(result) {
    //         if(result) {
    //             swal({
    //                 type: 'success',
    //                 title: 'Updated!',
    //                 text: 'Relation Updated!'
    //             });
    //         }
    //     })
    // };


    /**
     * Remove Relation from DB
     */
    $scope.removeRelationDB = function (relation) {
        swal({
            title: 'Are you sure to remove?',
            text:  "This process may take 40 seconds.",
            type: 'warning',
            customClass: 'swal-wide',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    swal.enableLoading();
                    NProgress.start();
                    Restangular.one('/admin/relation/'+relation.id)
                        .remove({}, {"X-CSRF-TOKEN":token}).then(function(result){
                        resolve();
                        NProgress.done();
                    },function(response){
                        NProgress.done();
                        swal({
                            title: 'Failed',
                            text: 'Relation doesn\'t delete.',
                            type:"error",
                            confirmButtonText: 'Ok'
                        })
                    })
                });
            }
        }).then(function(result) {
            NProgress.done();
            if(result) {
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Relation Removed!'
                });
                Restangular.all('/admin/relation/getrelation').getList().then(function(result){
                    $scope.relations = result;
                });
            }
        })
    };


    /**
     * Initial image to canvas
     */
    if(document.getElementById('myCanvas')){
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var imageObj = new Image();
    }


    /**
     * Apply Relation
     */
    $scope.applyRelation = function(relation){
        if(relation.relation_type === 0){ // if relation was many-to-one
            imageObj.onload = function() {
                context.drawImage(imageObj, 0, 0);
                context.font = "14px Arial";
                context.fillStyle = "red";
                context.fillText(relation.second+"_id", 70, 232);
                context.fillText(relation.second_field_name, 379, 325);
                context.fillText(relation.first, 50, 46);
                context.fillText(relation.second, 360, 270);
                context.fillText(relation.second, 320, 203);
                // context.beginPath();
                // context.rect(10, 10, 550, 390);
                // context.strokeStyle = 'white';
                // context.stroke();
                // context.fillStyle = "white";
                // context.fillText(relation.merge_folder + ' Directory', 10, 390);
            };
            imageObj.src = $rootScope.baseUrl +"/assets/img/db/many-to-one.jpg";
        } else if(relation.relation_type === 1){ // if relation was many-to-many
            imageObj.onload = function() {
                context.drawImage(imageObj, 0, 0);
                context.font = "14px Arial";
                context.fillStyle = "red";
                context.fillText(relation.first+"_id", 175, 279);
                context.fillText(relation.second+"_id", 175, 255);
                context.fillText(relation.second_field_name + '1, ' + relation.second_field_name + '2, '+relation.second_field_name +'3, ...', 240, 390);
                context.fillText(relation.second, 235, 360);
                context.fillText(relation.second, 36, 25);
                context.fillText(relation.first, 315, 38);
                context.fillText(relation.second + "_" +relation.first, 160, 203);
            };
            imageObj.src = $rootScope.baseUrl+"/assets/img/db/many-to-many.jpg";
        }

        swal({
                title: "It's your relationships. Are you sure?",
                //text: canvas,
                html: canvas,
                customClass: 'swal-wide',
                showCancelButton: true,
                allowOutsideClick: false,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        swal.enableLoading();
                        NProgress.start();
                        Restangular.one('/admin/relation')
                            .customPOST({}, "", relation, {"X-CSRF-TOKEN":token}).then(function(result){
                            Restangular.one('/admin/relation/modulerollback')
                                .customPOST({}, "", {page:'relation_module'}, {"X-CSRF-TOKEN":token})
                                .then(function(result){
                                    $rootScope.$broadcast('relationList.update');
                                    resolve();
                                    NProgress.done();
                                },function(response){
                                    NProgress.done();
                                    swal({
                                        title: 'Failed',
                                        text: 'Error in migrate process.',
                                        type:"error",
                                        confirmButtonText: 'Ok'
                                    })
                                });
                        },function(response){
                            NProgress.done();
                            swal({
                                title: 'Failed',
                                text: response.data.error,
                                type:"error",
                                confirmButtonText: 'Ok'
                            })
                        })
                    });
                }
            }).then(function(result) {
                NProgress.done();
                if(result) {
                    swal({
                        type: 'success',
                        title: 'Relationship applied!'
                    });
                }
        })
    };


    /***********************************************
     * Event Listener
     ***********************************************/
    $scope.$on('relationList.update', function() {
        Restangular.all('/admin/relation/getrelation').getList().then(function (result) {
            $scope.relations = result;
        });
    });

});








/**********************************************************************************************************************************
 * Query Builder
 *
 **********************************************************************************************************************************/
app.controller('querybuilder', function($scope,Restangular,$uibModal,$httpParamSerializerJQLike,Notification,SweetAlert,$rootScope,$timeout){

    /**
     * Default variable
     */
    NProgress.configure({minimum: 0.01,trickleRate: 0.03, trickleSpeed: 600, showSpinner: false});
    $scope.report ={};
    $scope.report = {
        dateFilter: {
            dateRange: {
                startDate: new Date(),
                endDate: new Date()
            }
        }
    };
    $scope.report.filters = [{}];
    $scope.report.orderDesc = '';
    $scope.reportList =[];
    $scope.fields = [];
    $scope.conditions = [
        {
            id : 'eq',
            name: 'Equal'
        },
        {
            id:'neq',
            name:'Not equal'
        },
        {
            id:'gt',
            name:'Greater than'
        },
        {
            id:'gte',
            name:'Greater than equal'
        },
        {
            id:'lt',
            name:'Less than'
        },
        {
            id:'lte',
            name:'Less than equal'
        },
        {
            id:'nlike',
            name:'Not like'
        },
        {
            id:'like',
            name:'like'
        },
        {
            id:'nin',
            name:'not in'
        },
        {
            id:'nn',
            name:'not null'
        },
        {
            id:'inq',
            name:'in'
        }
    ];
    $scope.chartType = [{id:'1',name:'Pie Chart'},{id:2,name:'Ring Chart'},{id:3,name:'Stack Bar Chart'},{id:4,name:'Line Chart'},{id:5,name:'Time Series'},{id:6,name:'Area Chart'},{id:7,name:'Bar Chart'}];
    $scope.moduleList = [{id:1,name:'product'},{id:2,name:'task'}];
    $scope.countable = function (item) {
        if (item.dataType === 'datetime' || item.dataType === 'integer') {
            return item;
        }
    };
    $scope.duringOpt = ['Today','Yesterday','This week','Last week','This month','This year','Last year'];
    $scope.reconcil = [{id:'and',name:'AND'},{id:'or',name:'OR'}];
    $scope.showTab3 = false;


    /**
     * Filter date
     */
    $scope.dateFilter = function(item){
        return item.dataType == 'date' || item.dataType == 'datetime';
    };

    /**
     * During Select - with ng-change dateFilter.dateRange changed
     */
    $scope.duringChange = function (item) {
        switch (item) {
            case 'Today':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().startOf('day');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().endOf('day');
                break;
            case 'Yesterday':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().subtract(1, 'days').startOf('day');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().subtract(1, 'days').endOf('day');
                break;
            case 'This week':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().startOf('isoWeek');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().endOf('isoWeek');
                break;
            case 'Last week':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().subtract(1, 'weeks').startOf('isoWeek');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().subtract(1, 'weeks').endOf('isoWeek');
                break;
            case 'This month':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().startOf('month');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().endOf('month');
                break;
            case 'This year':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().startOf('year');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().endOf('year');
                break;
            case 'Last year':
                $scope.report.dateFilter.dateRange.startDate = moment().utc().subtract(1, 'year').startOf('year');
                $scope.report.dateFilter.dateRange.endDate = moment().utc().subtract(1, 'year').endOf('year');
                break;
            default:
        } 
    };


    /**
     * Active add new report
     */
    $scope.active=0;
    $scope.addNewReport = function(){
        Restangular.all('/admin/reportbuilders/modules').getList().then(function (result) {
            $scope.result = result;
            $scope.moduleList = result;
            $scope.showTab2 = true;
            $scope.active=1;
            $scope.report = {
                dateFilter: {
                    dateRange: {
                        startDate: new Date(),
                        endDate: new Date()
                    }
                }
            };
            $scope.report.filters = [{}];
            $scope.report.orderDesc = '';
        })
    };


    /**
     * Add & remove condition
     */
    $scope.removeCondition = function (item) {
        var index = $scope.report.filters.indexOf(item);
        $scope.report.filters.splice(index,1);
    };
    $scope.addCondition = function () {
        $scope.report.filters.push({});
    };


    /**
     * Get query value for param with modal
     */
    $scope.openModal = function (index,selectedColumnData) {
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: '../assets/vendors/ui-bootstrap/tpl/modal-get-value.html',
            controller: function($scope, $uibModalInstance, data) {
                $scope.columnData = data;
                $scope.okModal = function () {
                    $uibModalInstance.close($scope.columnData);
                };
                $scope.cancelModal = function () {
                    $uibModalInstance.dismiss('cancel');
                };
            },
            resolve: {
                data: function () {
                    return selectedColumnData;
                }
            }
        });
        modalInstance.result.then(function (columnData) {
            $scope.report.filters[index].selectedColumnData = columnData;
        });
    };
    


    /**
     * Get All fields of specific module
     */
    $scope.fetchFields = function (module) {
        Restangular.all('/admin/reportbuilders/getfields/'+module).getList().then(function (data) {
            $scope.result = data;
            $scope.fields = [];
            angular.forEach(data, function (value, key) {
                if(value.parent !=undefined){ // if table has a parent you should append name of table to start of field
                    angular.forEach(value.field, function (val, k) {
                        val.field = value.name.toLowerCase() + '.' + val.field; // append table name to start of fields
                        $scope.fields.push(val);
                    })
                } else {
                    angular.forEach(value.field, function (val, k) {
                        $scope.fields.push(val);
                    })
                }

            })
        })
    };


    /**
     * Convert to query string
     */
    $scope.convertQuery = function (report,page,typeQuery) {
        $scope.report = report;
        if(report.name==='' || report.name===undefined || report.module==='' || report.module===undefined){
            swal({
                title: 'Error',
                text:  "Report name & module name is required!",
                type: 'error'
            });
        } else {
            $scope.final = '';
            $scope.queryString = null;
            $scope.queryString = {};
            $scope.queryString.fields = [];
            $scope.queryString.include = {};
            $scope.queryString.module = report.module;

            // advance filter
            // $scope.additionalQueryString = {};
            // $scope.additionalQueryString.where = {};
            // angular.forEach($scope.report.filters,function (value, key) {
            //     if(value.column){
            //         $scope.additionalQueryString.where[value.column]= {};
            //         $scope.additionalQueryString.where[value.column][value.condition]= value.selectedColumnData;
            //     }
            // });
            // $scope.final += decodeURIComponent($httpParamSerializerJQLike($scope.additionalQueryString)) + '&';


            // date filter
            $scope.queryString.where = {};
            if (report.dateFilter.dateRange.startDate && report.dateFilter.dateRange.endDate && report.dateFilter.field) {
                $scope.queryString.where[report.dateFilter.field] = {between: []};

                var startDate = moment(report.dateFilter.dateRange.startDate).utc().format();
                $scope.queryString.where[report.dateFilter.field].between
                    .push(startDate);

                var endDate = moment(report.dateFilter.dateRange.endDate).utc().format();
                $scope.queryString.where[report.dateFilter.field].between
                    .push(endDate);
            }

            // advance filter
            angular.forEach(report.filters, function (value, key) {
                if (value.column) {
                    if (value.reconcil === 'or' || value.reconcil === 'and') {
                        // check if where OR created
                        if ($scope.queryString.where[value.reconcil] === undefined) {
                            $scope.queryString.where[value.reconcil] = {};
                        }

                        // check if where or->column exist
                        if ($scope.queryString.where[value.reconcil][value.column] === undefined) {
                            $scope.queryString.where[value.reconcil][value.column] = {};
                        }

                        // fill or->column->condition
                        $scope.queryString.where[value.reconcil][value.column][value.condition] = value.selectedColumnData;

                    } else {
                        // check column with same name exist
                        if ($scope.queryString.where[value.column] === undefined) {
                            $scope.queryString.where[value.column] = {};
                        }

                        // fill column->condition
                        $scope.queryString.where[value.column][value.condition] = value.selectedColumnData;
                    }
                }
            });

            // convert fields param
            angular.forEach(report.myFields, function (value, key) {
                if (value.field.indexOf('.') === -1) { // it hasn't dot (.)
                    $scope.queryString.fields.push(value.field);
                } else {
                    var splitFieldName = value.field.split('.');
                    // because of queryString.include should be create once, we make a condition
                    if ($scope.queryString.include[splitFieldName[0]] === undefined) { //check include secondary table
                        $scope.queryString.include[splitFieldName[0]] = {};
                        $scope.queryString.include[splitFieldName[0]].fields = [];
                    }
                    $scope.queryString.include[splitFieldName[0]].fields.push(splitFieldName[1]);
                }
            });


            // convert order by
            if (report.order) {
                if (report.order.indexOf('.') === -1) { // it hasn't dot (.)
                    $scope.queryString.order = report.order + ' ' + report.orderDesc; // like 'name DESC'
                } else {
                    var splitOrderName = report.order.split('.');
                    // because of queryString.include should be create once, we make a condition
                    if ($scope.queryString.include[splitOrderName[0]] === undefined) { // check include secondary table object created
                        $scope.queryString.include[splitOrderName[0]] = {};
                    }

                    // check if empty orderDesc
                    if (report.orderDesc === '') {
                        $scope.queryString.include[splitOrderName[0]].order = splitOrderName[1];
                    } else {
                        $scope.queryString.include[splitOrderName[0]].order = splitOrderName[1] + ' ' + report.orderDesc;
                    }
                }
            }

            // convert group by
            if(report.groupby){
                // check if my string contains a dot (.) in JavaScript
                if(report.groupby.indexOf('.') === -1 ){ // it hasn't dot (.)
                    $scope.queryString.groupby = report.groupby;
                } else{
                    var splitGroupName = report.groupby.split('.');

                    // because of queryString.include should be create once, we make a condition
                    if ($scope.queryString.include[splitGroupName[0]] === undefined) { // check include secondary table object created
                        $scope.queryString.include[splitGroupName[0]] = {};
                    }

                    // group by run
                    $scope.queryString.include[splitGroupName[0]].groupby = splitGroupName[1];
                }
            }


            // sum
            $scope.queryString.max = 'task_category_id';
            // OR
            //$scope.queryString.include['category'].sum = 'name';



            //pagination
            $scope.queryString.page = page;

            // Submit custom report param to server
            $scope.final += decodeURIComponent($httpParamSerializerJQLike($scope.queryString));
            console.log($scope.final);

            /**
             * export to xls */
            if(typeQuery === 'export') {
                var token = $('#_token').val();
                Restangular.all('/admin/reportbuilders/exportxls?' + $scope.final).withHttpConfig({responseType: 'blob'})
                    .customPOST({}, '', $scope.final, {"X-CSRF-TOKEN": token})
                    .then(function (response) {
                        var url = (window.URL || window.webkitURL).createObjectURL(response);
                        var anchor = document.createElement("a");
                        document.body.appendChild(anchor);//required in FF, optional for Chrome
                        anchor.download = "exportfile.xls";
                        anchor.href = url;
                        anchor.click();
                    })
            }
            /**
             * print all report without pagination */
            else if(typeQuery === 'print'){
                Restangular.all('/admin/reportbuilders/build?' + $scope.final + '&print=1').getList().then(function (result) {
                    $scope.finalReportPrint = result;
                    // $scope.queryFinal = $scope.queryString;
                    $scope.finalFieldsPrint = report.myFields;
                    angular.forEach($scope.finalFieldsPrint, function (value, key) {
                        value.field = value.field.toLowerCase();
                    });

                    /** print popup */
                    // because of delay for populate yep-table we use $timeout
                    $timeout(function () {
                        var printContents = document.getElementById('popup').innerHTML;
                        var popupWin = window.open('', '_blank', 'width=1024,height=768');
                        popupWin.document.open();
                        popupWin.document.write('<html><head><title>Print Report</title><link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css"></head><body onload="window.print()">' + printContents + '</body></html>');
                        popupWin.document.close();
                    },500)

                });
            }
            /**
             * run query and view on web page */
            else {
                Restangular.all('/admin/reportbuilders/build?' + $scope.final).getList().then(function (result) {
                    $scope.active = 2;
                    $scope.showTab3 = true;
                    $scope.finalReport = result;
                    // $scope.queryFinal = $scope.queryString;
                    $scope.finalFields = report.myFields;
                    angular.forEach($scope.finalFields, function (value, key) {
                        value.field = value.field.toLowerCase();
                    });
                });
            }
        }
    };



    /**
     * Store Report
     */
    $scope.save = function (report) {
        var token = $('#_token').val();
        swal({
            title: 'Do you want to save report?',
            text:  "Report Name: "+report.name,
            type: 'info',
            customClass: 'swal-wide',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    swal.enableLoading();
                    Restangular.all('/admin/reportbuilders')
                        .customPOST({},"", {'text':JSON.stringify(report)}, {"X-CSRF-TOKEN":token})
                        .then(function(result){
                            $scope.getAll();
                            resolve();
                    },function(response){
                        swal({
                            title: 'Failed',
                            text: 'Your report doesn\'t saved.',
                            type:"error",
                            confirmButtonText: 'Ok'
                        })
                    })
                });
            }
        }).then(function(result) {
            if(result) {
                swal({
                    type: 'success',
                    title: 'Saved!',
                    text: 'Your custom report saved!'
                });
                $scope.getAll();
            }
        });
    };


    /**
     * Update Report
     */
    $scope.update = function (report) {
        var token = $('#_token').val();
        swal({
            title: 'Do you want to update report?',
            text:  report.name,
            type: 'info',
            customClass: 'swal-wide',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    swal.enableLoading();
                    Restangular.all('/admin/reportbuilders/'+report.id)
                        .customPUT({},"", {'text':JSON.stringify(report)}, {"X-CSRF-TOKEN":token})
                        .then(function(result){
                            resolve();
                        },function(response){
                            swal({
                                title: 'Failed',
                                text: 'Your report doesn\'t updated.',
                                type:"error",
                                confirmButtonText: 'Ok'
                            })
                        })
                });
            }
        }).then(function(result) {
            if(result) {
                swal({
                    type: 'success',
                    title: 'Saved!',
                    text: 'Your custom report updated!'
                });
                $scope.getAll();
            }
        });
    };


    /**
     * Get List
     */
    $scope.getAll = function () {
        Restangular.all('/admin/reportbuilders/getallreports').getList().then(function (result) {
            var tmpArr = [];
            angular.forEach(result,function (val, key) {
                var tmp = JSON.parse(val.reporttext);
                tmpArr.push(JSON.parse(tmp.text));
                tmpArr[key].id = val.id;
            });
            $scope.reportList = tmpArr;
        });
    };
    $scope.getAll();

    

    /**
     * Delete Report
     */
    $scope.deleteReport = function (id) {
        var token = $('#_token').val();
        swal({
            title: 'Are you sure to remove?',
            type: 'warning',
            customClass: 'swal-wide',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    swal.enableLoading();
                    NProgress.start();
                    Restangular.one('/admin/reportbuilders/'+id)
                        .remove({}, {"X-CSRF-TOKEN":token}).then(function(result){
                        resolve();
                        NProgress.done();
                    },function(response){
                        NProgress.done();
                        swal({
                            title: 'Failed',
                            text: 'Report doesn\'t delete.',
                            type:"error",
                            confirmButtonText: 'Ok'
                        })
                    })
                });
            }
        }).then(function(result) {
            NProgress.done();
            $scope.getAll();
            if(result) {
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Report Removed!'
                });
            }
        })
    };

    
    /**
     * Edit Report 
     */
    $scope.editReport = function (report) {
        NProgress.start();
        $scope.fetchFields(report.module);
        Restangular.all('/admin/reportbuilders/modules').getList().then(function (data) {
            $scope.moduleList = data;
            $scope.report = report;
            $scope.showTab2 = true;
            $scope.active = 1;
            NProgress.done();

        })
    };
    
    // $scope.editReport = function (id) {
    //     var token = $('#_token').val();
    //     NProgress.start();
    //     Restangular.one('/admin/reportbuilders/'+id+'/edit').get()
    //         .then(function(result){
    //             Restangular.all('/admin/reportbuilders/modules').getList().then(function (data) {
    //                 $scope.moduleList = data;
    //                 //console.log(result);
    //                 $scope.report = JSON.parse(result.text);
    //                 $scope.fetchFields($scope.report.module);
    //                 console.log($scope.report);
    //                 //$scope.id = result.report.id;
    //                 $scope.showTab2 = true;
    //                 $scope.active = 1;
    //                 NProgress.done();
    //             })
    //         });
    // }



});

/*************************************************
 * App Directives
 *************************************************/
app.directive('yepCheckbox', function() {
    var uniqueId = 1;
    return {
        restrict: 'EA',
        require: 'ngModel',
        scope: {
            bar: '=ngModel'
        },
        template: '<div class="m-switch" ><input type="checkbox" id="{{::uniqueId}}" class="switch-input" ng-model="bar"/>' +
        '<label for="{{::uniqueId}}" class="switch-label"></label></div>',
        link: function(scope, elem, attrs,ngModel) {
            scope.uniqueId = 'item' + uniqueId++;
        }
    }
});

app.directive('yepTable', function ($compile) {
    return {
        restrict: 'E',
        link: function (scope, element, attrs) {

            /** default variable */
            var fields  = scope[attrs.fields];
            var rows    = scope[attrs.rows];
            var paging    = attrs.paging;
            var currentElement = element; // if it remove element.replaceWith run just one time
            scope.pagination = {};


            /** watch data change */
            scope.$watch(attrs.rows,function(newData) {
                rows = newData;
                fields  = scope[attrs.fields];
                if(rows){
                    scope.pagination = newData.metadata;
                }
                scope.render(rows,fields);
            },true);

            /** Render HTML function */
            scope.render = function(rows,fields) {
                /** begin of table */
                var html = '<div class="res-table"><table class="table table-striped table-hover table-fixed ellipsis-table" ><thead><tr>';

                /** Create table header */
                angular.forEach(fields, function (item, index) {
                    html += '<th>' + item.field + '</th>';
                });
                html +='</tr></thead><tbody>';


                /** Create column and cell */
                angular.forEach(rows, function (row, index) {
                    html +='<tr>';

                    angular.forEach(fields, function (item, index) {
                        // if hasn't dot (.)
                        if(item.field.indexOf('.') === -1 ) {
                            html += '<td>' + row[item.field] + '</td>';
                        } else {
                            // split field by dot (.)
                            var splitFieldName = item.field.split('.');
                            // check if is array
                            if(Object.prototype.toString.call(row[splitFieldName[0]]) === '[object Array]'){
                                // iteration for field is array
                                var tmp = [];
                                angular.forEach(row[splitFieldName[0]],function (value, key) {
                                    tmp.push(value[splitFieldName[1]]) ;
                                });
                                html += '<td>' + tmp + '</td>';

                                // if it's null
                            }else if(row[splitFieldName[0]]===null) {
                                html += '<td>-</td>';
                            }else{
                                html += '<td>' + row[splitFieldName[0]][splitFieldName[1]] + '</td>';
                            }
                        }
                    });
                    html +='</tr>'
                });
                html +='</tbody></table>';

                /** pagination */
                if(paging === 'true'){
                    html +='<div class="text-center"><uib-pagination total-items="pagination.total" ng-show="pagination.total" ng-model="pagination.current_page" max-size="5" class="pagination report" boundary-links="true" rotate="false" ng-change="convertQuery(report,pagination.current_page)" items-per-page="pagination.per_page"></uib-pagination></div></div>';
                } else{
                    html +='</div>';
                }
                


                /** Replace in html */
                var replacementElement = angular.element($compile(html)(scope));
                currentElement.replaceWith(replacementElement);
                currentElement = replacementElement;
            };

        }
    }
});


/************************************************
 * App filters
 ************************************************/
app.filter('propertyFilter', function($log) {
    return function(items, props) {
        var out = [];
        if (angular.isArray(items)) {
            items.forEach(function(item) {
                var itemMatches = false;
                var keys = Object.keys(props);
                var optionValue = '';
                for (var i = 0; i < keys.length; i++) {
                    optionValue = item[keys[i]] ? optionValue + item[keys[i]].toString().toLowerCase().replace(/ /g, '') : '';
                }
                for (var j = 0; j < keys.length; j++) {
                    var text = props[keys[j]].toLowerCase().replace(/ /g, '');
                    if (optionValue.indexOf(text) !== -1) {
                        itemMatches = true;
                        break;
                    }
                }
                if (itemMatches) {
                    out.push(item);
                }
            });
        } else {
            // Let the output be the input untouched
            out = items;
        }

        return out;
    };
});
