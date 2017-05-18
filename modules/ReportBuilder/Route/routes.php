<?php
Route::group(['prefix' => 'admin'], function () {
####start
   /*
    |--------------------------------------------------------------------------
    | ReportBuilder  Routes
    |--------------------------------------------------------------------------
    |*/
    Route::get('reportbuilders/modules','ReportBuilder\Controller\ReportBuilderController@allModule');
    Route::get('reportbuilders/getfields/{id}','ReportBuilder\Controller\ReportBuilderController@getFields'); // id , name, dataType, isForeignKey



    Route::get('reportbuilders/build','ReportBuilder\Controller\ReportBuilderController@queryBuilder');
    Route::get('reportbuilders/getallreports','ReportBuilder\Controller\ReportBuilderController@getAllReport');
    Route::post('reportbuilders/exportxls','ReportBuilder\Controller\ReportBuilderController@exportxls');
    Route::post('reportbuilders/search','ReportBuilder\Controller\ReportBuilderController@search');
    Route::resource('reportbuilders','ReportBuilder\Controller\ReportBuilderController');
####end
#####relation#####

});
 