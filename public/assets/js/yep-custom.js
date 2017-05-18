/* All function that's load */
$(document).ready(function(){
    Initialize();

})
/*
 * Ajax Preloader
 */
$(document).ajaxStart(function () {
    NProgress.configure({trickleRate: 0.1, trickleSpeed: 800, showSpinner: false});
    NProgress.start();
    NProgress.set(0.3);
}).ajaxStop(function () {
    NProgress.done();
});
/*
 * Ajax Token append data
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('#_token').val(),
    },
    cache: true
});

/*
 * Initialize Plugins
 */
var base_url = $('meta[name="base_url"]').attr('content');
var yAsset = {
    dropzone:[base_url +'/assets/vendors/dropzone/css/dropzone.min.css',base_url +'/assets/vendors/dropzone/css/basic.min.css'],
    fueluxwizard:[base_url +'/assets/vendors/fuelux/css/fuelux.wizard.min.css',base_url +'/assets/vendors/fuelux/js/fuelux.min.js',base_url +'/assets/vendors/fuelux/js/wizard.min.js'],
    fueluxwizard:[base_url +'/assets/vendors/select2/css/select2.min.css',base_url +'/assets/vendors/select2/js/select2.min.js']
}







function Initialize()
{
    if($('.manyToManySelect2').length)
        $(".manyToManySelect2").select2();
    /*
     *  Fulex Wizard
     */
    if($('.fuelux-wizard').length) {
        $.require({files: yAsset.fueluxwizard,cache:false }).done(function() {
            $('.fuelux-wizard').wizard();
        })
    }


 /*
 datapicker
  */
    if($('.datepicker').length) {
        $(".datepicker").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            onClose: function (selectedDate) {
                $("#publish_date").datepicker("option", "maxDate", selectedDate);
            }

        });
    }


    if($('#ckeditor').length) {
        // CKEditor Script
        CKEDITOR.replace( 'ckeditor', {
            skinName  : 'office2013'
        });
    }


    /*
     cancel-btn
     */
    if( $('.cancel-btn').length) {
        $('.cancel-btn').click(function (e) {
            e.preventDefault();
            window.location=$("#url").val();
        });
    }

/***************************************************************************
 * Dropzone multiple image upload
 **************************************************************************/
    if($('.multi-uploader').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    // remove array element by value
    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };

    // Convert array to object in js
    function convertToObject(arr) {
        var rv = {};
        for (var i = 0; i < arr.length; ++i)
            if (arr[i] !== undefined) rv[i] = arr[i];
        return rv;
    }
/*
multi ajax uploader
 */
    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");
        if($('.multi-uploader').length) {
            var inputname;
            var reponsefilename;
            var arrayFiles = [];// Define array for save image
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneMultiple = new Dropzone(".multi-uploader", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 8,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage :
                        '<span class="bigger-150 bolder"><i class=" fa fa-caret-right red"></i> Drop files</span> to upload \
                        <span class="smaller-80 grey">(or click)</span> <br /> \
                        <i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            //console.log(file);
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/deletemultiimage",
                                data: {id: file.serverId},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            arrayFiles.remove(file.serverId);
                                            console.log(arrayFiles);
                                            $('input[name="'+inputname+'"]').val(window.JSON.stringify(convertToObject(arrayFiles)));
                                        }
                                        else
                                        {
                                            $(".multi-uploader .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            arrayFiles.remove(file.serverId);
                                            $('input[name="'+inputname+'"]').val(window.JSON.stringify(convertToObject(arrayFiles)));
                                        }
                                    }
                                }
                            });
                        });

                        this.on("success", function (file, response) {
                            inputname = $('.multi-uploader').attr('data-name');
                            reponsefilename = response.filename;
                            file.serverId = response.filename; // set itself file name as ID on the previewElement of each element
                            //console.log(file);
                            if($('input[name="'+inputname+'"]').length){
                                arrayFiles.push(reponsefilename);
                                $('input[name="'+inputname+'"]').val(JSON.stringify(convertToObject(arrayFiles)));
                            } else {
                                arrayFiles.push(reponsefilename);
                                $('.multi-uploader').after('<input name="' + inputname + '" type="hidden" value="' + JSON.stringify(convertToObject(arrayFiles)) + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.multi-uploader').attr('data-name');
                        var tmp = $('input[name="'+inputname+'"]').val();
                        if(tmp !=''){
                            arrayFiles = JSON.parse(tmp)
                            var index;
                            var existingFileCount = 1;
                            for (index = 0; index < arrayFiles.length; ++index) {
                                var mockFile = { name: arrayFiles[index],serverId:arrayFiles[index], size: 12345 };
                                this.emit("addedfile", mockFile);
                                this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+arrayFiles[index]);
                                this.emit("complete", mockFile);
                                this.files.push(mockFile);
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            };
                        }

                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }

        }
    });
/***************************************************************************
 * End Dropzone multiple image upload
 **************************************************************************/


/***************************************************************************
 * Dropzone single image1 upload
 **************************************************************************/
    if($('.dz-uploadimage1').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");

        if($('.dz-uploadimage1').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadimage1", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/uploadimage",
                                data: {id: reponsefilename,url:url[1]},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                        else
                                        {
                                            $(".dz-uploadimage1 .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            inputname = $('.dz-uploadimage1').attr('data-name');
                            reponsefilename = response.filename;
                            if($('input[name="'+inputname+'"]').length){
                                $('input[name="'+inputname+'"]').val(reponsefilename);
                            } else {
                                $('.dz-uploadimage1').after('<input name="' + inputname + '" type="hidden" value="' + reponsefilename + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.dz-uploadimage1').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });


    /***************************************************************************
     * Dropzone single image2 upload
     **************************************************************************/
    if($('.dz-uploadimage2').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");

        if($('.dz-uploadimage2').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadimage2", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/uploadimage",
                                data: {id: reponsefilename,url:url[1]},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                        else
                                        {
                                            $(".dz-uploadimage2 .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            inputname = $('.dz-uploadimage2').attr('data-name');
                            reponsefilename = response.filename;
                            if($('input[name="'+inputname+'"]').length){
                                $('input[name="'+inputname+'"]').val(reponsefilename);
                            } else {
                                $('.dz-uploadimage2').after('<input name="' + inputname + '" type="hidden" value="' + reponsefilename + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.dz-uploadimage2').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });


    /***************************************************************************
     * Dropzone single image3 upload
     **************************************************************************/
    if($('.dz-uploadimage3').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");

        if($('.dz-uploadimage3').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadimage3", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/uploadimage",
                                data: {id: reponsefilename,url:url[1]},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                        else
                                        {
                                            $(".dz-uploadimage3 .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            inputname = $('.dz-uploadimage3').attr('data-name');
                            reponsefilename = response.filename;
                            if($('input[name="'+inputname+'"]').length){
                                $('input[name="'+inputname+'"]').val(reponsefilename);
                            } else {
                                $('.dz-uploadimage3').after('<input name="' + inputname + '" type="hidden" value="' + reponsefilename + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.dz-uploadimage3').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });


    /***************************************************************************
     * Dropzone single image4 upload
     **************************************************************************/
    if($('.dz-uploadimage4').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");

        if($('.dz-uploadimage4').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadimage4", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/uploadimage",
                                data: {id: reponsefilename,url:url[1]},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                        else
                                        {
                                            $(".dz-uploadimage4 .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            inputname = $('.dz-uploadimage4').attr('data-name');
                            reponsefilename = response.filename;
                            if($('input[name="'+inputname+'"]').length){
                                $('input[name="'+inputname+'"]').val(reponsefilename);
                            } else {
                                $('.dz-uploadimage4').after('<input name="' + inputname + '" type="hidden" value="' + reponsefilename + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.dz-uploadimage4').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });


    /***************************************************************************
     * Dropzone single image5 upload
     **************************************************************************/
    if($('.dz-uploadimage5').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        var url      = window.location.href;
        url=url.split("/admin");

        if($('.dz-uploadimage5').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadimage5", {
                    url:url[0]+"/admin/uploadimage",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'image/jpeg,image/png,image/gif',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url:url[0]+"/admin/"+$("#id").val()+"/uploadimage",
                                data: {id: reponsefilename,url:url[1]},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                        else
                                        {
                                            $(".dz-uploadimage5 .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            inputname = $('.dz-uploadimage5').attr('data-name');
                            reponsefilename = response.filename;
                            if($('input[name="'+inputname+'"]').length){
                                $('input[name="'+inputname+'"]').val(reponsefilename);
                            } else {
                                $('.dz-uploadimage5').after('<input name="' + inputname + '" type="hidden" value="' + reponsefilename + '">')
                            }
                        });

                        // show files already stored on server
                        inputname = $('.dz-uploadimage5').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });


    /***************************************************************************
 * Dropzone single excel & csv upload
 **************************************************************************/
 
    if($('.dz-uploadfile').length) {
        $.require({files: yAsset.dropzone,cache:false }).done(function(){
        });
    }

    $(function(){
        if($('.dz-uploadcsvexcelfile').length) {
            var inputname;
            var reponsefilename;
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = false;
            try {
                var myDropzoneSingle = new Dropzone(".dz-uploadcsvexcelfile", {
                    url: $("#url").val() + "/import_excel_csv",
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: .5, // MB
                    acceptedFiles: 'application/vnd.ms-excel,application/csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    maxFiles: 1,
                    maxfilesexceeded: function (file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    },
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
                    dictResponseError: 'Error while uploading file!',
                    init:function() {
                        this.on("removedfile", function(file,response) {
                            if($('#delete-message-file').length) {
                                $("#delete-message-file").remove();
                            }
                            $.ajax({
                                method: 'post',
                                url: $("#url").val() +'/'+ $("#id").val() + "/import_excel_csv",
                                data: {id: reponsefilename},
                                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                                success: function(data){
                                    if(data == 1)
                                    {
                                        if($('#delete-message-file').length) {
                                            $("#delete-message-file").text('Deleted file');
                                            $('input[name="'+inputname+'"]').val('');

                                        }
                                        else
                                        {
                                            $(".dz-uploadcsvexcelfile .dz-message").children().append('<span id="delete-message-file" style="font-size: 12px;"></br>Deleted file</span>');
                                            $('input[name="'+inputname+'"]').val('');
                                        }
                                    }
                                }
                            });
                        });

                        // success event after image upload
                        this.on("success", function (file, response) {
                            $("#import_div_fields").html(response);
                       });

                        // show files already stored on server
                        inputname = $('.dz-uploadcsvexcelfile').attr('data-name');
                        reponsefilename = $('input[name="'+inputname+'"]').val();
                        if(reponsefilename !=''){
                            var mockFile = { name: reponsefilename, size: 12345 };
                            this.emit("addedfile", mockFile);
                            this.createThumbnailFromUrl(mockFile, base_url+"/uploads/"+reponsefilename);
                            this.emit("complete", mockFile);
                        }


                    },
                });
            } catch (e) {
                console.log(e);
                alert('Image uploader does not support older browsers.Please reload page!');
            }


        }
    });
    $(function () {
        $(document).on('click', '.conbtnGetAll', function(event) {

            if($('.conchkNumber:checked').length) {
                var chkId = '';
                $('.conchkNumber:checked').each(function() {
                    chkId += $(this).val() + ",";
                });
                chkId =  chkId.slice(0,-1);

            }
            else {
                alert('please at least one item to do action');
            }
        });
        $('.conchkSelectAll').click( function() {
            $('.conchkNumber').prop('checked', $(this).is(':checked'));
        });
        $('.conchkNumber').click( function() {
            if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
                $('.conchkSelectAll').prop('checked', true);
            }
            else {
                $('.conchkSelectAll').prop('checked', false);
            }
        });

    });

    /* easy pie chart render*/
    if($('.piechart').length) {
        $('.piechart').easyPieChart({
            size: 60
        });
    }
    if($('#pie1').length) {
        $("#pie1").sparkline('html', {
            type: 'pie',
            width: '45%',
            height: '78px'
        });
    }
    if($('#pie2').length) {
        $("#pie2").sparkline('html', {
            type: 'pie',
            width: '45%',
            height: '78px'
        });
    }

    /* Morris Area Chart Render*/
    if($('#areaChart').length) {
        var data = [
                {y: '2014', a: 4, b: 1},
                {y: '2015', a: 8, b: 0},
                {y: '2016', a: 5, b: 2},
                {y: '2017', a: 10, b: 0},
                {y: '2018', a: 4, b: 1},
                {y: '2019', a: 16, b: 3},
                {y: '2020', a: 5, b: 1},
                {y: '2021', a: 11, b: 5},
                {y: '2022', a: 6, b: 2},
                {y: '2023', a: 11, b: 3},
                {y: '2024', a: 30, b: 2},
                {y: '2025', a: 13, b: 0},
                {y: '2026', a: 4, b: 2},
                {y: '2027', a: 3, b: 8},
                {y: '2028', a: 3, b: 0},
                {y: '2029', a: 6, b: 0},
            ],
            config = {
                data: data,
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Total Income', 'Total Outcome'],
                fillOpacity: 0.6,
                behaveLikeLine: true,
                resize: true,
                pointStrokeColors: ['black'],
                lineColors: ['blue'],
                pointFillColors: ['#00ff00'],
                lineWidth: [1],
                pointSize: [.5],
                hideHover: 'always'
            };
        config.element = 'areaChart';
        Morris.Area(config);
    }

};

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}
/*
 * Ajax add
 */
$(document).on("click", ".submit-btn", function () {
    $(this).addClass('disabled');
    CKupdate();
    $.ajax({
        type: 'POST',
        url: $('#url').val(),
        data: $("form").serialize(),
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})


/*
 * Ajax add module
 */
$(document).on("click", "#add_module", function () {

    $(this).addClass('disabled');
    CKupdate();
    $.ajax({
        type: 'POST',
        url: $('#url').val(),
        data:{'data':$("#choicesDisplay").html()},
        success: function (result) {
            if (result['flag'] == 1) {
                var url=result['url']+'/create/module';
                $.ajax({
                    type: 'POST',
                    url: url,
                     success: function (result) {
                        $('#ajax_div').html(result);
                        Initialize();
                    }
                })
            }else if (result['flag'] == 0){
                alert('You have not add module permission');
            }else{
               $('#ajax_div').html(result);
                Initialize();
            }
        },
    })
})


/*
 * Ajax add module
 */
$(document).on("click", "#relation_module", function () {

    $(this).addClass('disabled');
    CKupdate();
    $.ajax({
        type: 'POST',
        url: $('#url').val(),
        data:{'first':'Product','second':'ProductCategory','merge_folder':'ProductCategory','second_field_name':'title'},
        success: function (result) {
              if (result['flag'] == 20) {
                 var url=$("#url").val()+'/moduleRollback';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data:{'page':'relation_module','first_module':result['first_module']},
                    success: function (result) {
                         $('#ajax_div').html(result);
                        Initialize();
                    }
                })
            }else if (result['flag'] == 0){
                alert('You have not add module permission');
            }else{
                $('#ajax_div').html(result);
                Initialize();
            }
        },
    })
})


/*
 * Ajax update
 */
$(document).on("click", ".edit-btn", function () {
    //alert( $("#url").val());
    CKupdate();
    $.ajax({
        type: 'put',
        url: $('#url').val()+'/update',
        data: $(".form").serialize(),
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})
/*
 * Ajax delete
 */
$(document).on("click", ".delete_content", function () {
    $('#mydelete').modal('toggle');
    CKupdate();
    $.ajax({
        type: 'delete',
        url: $('#url').val()+'/'+$("#delete_value").val(),
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})

/*
 * Ajax pagination
 */
$(document).on("click", ".pagination:not(.report) > li > a", function (e) {
    e.preventDefault();
    $(this).addClass('disabled');
    var str=$(this).attr('href');
    var page=str.split('?page=');
     $.ajax({
        type: 'post',
        url: $('#url').val()+'/search',
        data:{'paging':$("#paging").val(),'page':page[1],'serach_txt':$("#search_text").val()},
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})


/*
 * export EXCEL & CSV
 */
$(document).on("click", ".export", function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    http.responseType = 'blob';
    var header;
    var blob;
    var url = $('#url').val()+'/export/excel';
    var params = $('form').serialize()+'&export_type='+$(this).attr('id')+'&serach_txt='+$("#search_text").val();
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var filename = "";
            var disposition = http.getResponseHeader('Content-Disposition');
            if (disposition && disposition.indexOf('attachment') !== -1) {
                var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                var matches = filenameRegex.exec(disposition);
                if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
            }
            var type = http.getResponseHeader('Content-Type');
            blob = new Blob([http.response], { type: type ,endings:'native'});
            var URL = window.URL || window.webkitURL;
            var downloadUrl = URL.createObjectURL(blob);
            var a = document.createElement("a");
            a.href = downloadUrl;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
        }
    }
    http.send(params);
});

/*
 * Ajax edit
 */
$(document).on("click", ".edit-href", function (e) {
    // alert($("#url").val());
    e.preventDefault();
    $(this).addClass('disabled');
    $.ajax({
        type: 'get',
        url: $('#url').val()+'/'+$(this).attr('id')+'/edit',
        data: 'page='+$('#page').val(),
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})

/*
 * Ajax search
 */
$(document).on("click", ".search-btn", function (e) {
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: $('#url').val()+'/search',
        data:{'paging':$("#paging").val(),'page':1,'serach_txt':$("#search_text").val()},
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})

$(document).on("click", "#disable_module", function () {
   var value=0;
    if($(this).prop('checked'))
        value=1;
   $.ajax({
        type: 'post',
        url: $('#url').val()+'/disable',
        data:{'data':value,'name':$(this).data('module_name')},
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})

/*
 * Ajax delete module
 */
$(document).on("click", "#delete_module_content", function () {
   $('#delete_module').modal('toggle');
    CKupdate();
   // alert();
    $.ajax({
        type: 'delete',
        url: $('#url').val()+'/'+$("#delete_value").val(),
        success: function (result) {
            if (result['flag'] ==20) {
                var url=$('#url').val()+'/moduleRollback';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data:{'page':'delete_module','first_module':result['first_module']},
                    success: function (result) {

                         $('#ajax_div').html(result);
                        Initialize();
                    }
                })
            }else if (result['flag'] == 0){
                alert('You have not add module permission');
            }else{
                $('#ajax_div').html(result);
                Initialize();
            }
        },
    })
})

/*
 * Ajax inport excel & csv
 */
$(document).on("click", ".import_excel_csv_btn", function (e) {
    e.preventDefault();
    $.ajax({
        type: 'post',
        url: $('#url').val()+'/import_excel_csv_database',
        data: $("#import_excel_csv_form").serialize(),
        success: function (result) {
        if(result==1)
        $("#import_success").show();
            else
            $("#import_fail").show();
          //  Initialize();
        },
    })
})



/*
 * Ajax change paging
 */
$(document).on("change", ".paging", function ( ) {
    $.ajax({
        type: 'post',
        url: $('#url').val()+'/search',
        data:{'paging':$(this).val(),'page':1,'serach_txt':$("#search_text").val()},
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})

/*
 * Ajax change paging
 */
$(document).on("change", ".first_filter", function ( ) {
    $.ajax({
        type: 'post',
        url: $('#url').val()+'/search',
        data:{'paging':$("#paging").val(),'page':1,'serach_txt':$("#search_text").val(),'first_filter':$("#first_filter").val()},
        success: function (result) {
            $('#ajax_div').html(result);
            Initialize();
        },
    })
})


/*
 * select all in delete
 */
$(document).on("click", ".conchkSelectAll", function (e) {
    $('.conchkNumber').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber').map(function () {
        return $(this).attr('id');
    }).get();
    $("#delete_value").val(values);

});

$(document).on("click", ".conchkNumber", function (e) {
    var values = $('input:checkbox:checked.conchkNumber').map(function () {
        return $(this).attr('id');
    }).get();
    $("#delete_value").val(values);

});

$(document).on("click", ".del_module", function (e) {
    $("#delete_value").val($(this).attr('id'));
});

$(document).on("click", "#delete_modal", function (e) {
    e.preventDefault;
    if($("#delete_value").val()=='')
        $("#no_delete").modal('show')
    else
        $("#mydelete").modal('show')
});


/*
 back active tab in submit btn
 */

$(document).on("click", ".tab1", function () {
    $("#tab").val(1);
});

$(document).on("click", ".tab2", function () {
    $("#tab").val(2);
});
$(document).on("click", ".tab3", function () {
    $("#tab").val(3);
});
$(document).on("click", ".tab4", function () {
    $("#tab").val(4);
});
$(document).on("click", ".tab5", function () {
    $("#tab").val(5);
});