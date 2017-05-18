<?php

Route::controller('auth','auth\AuthController');
/**
 * register & reset password & auth
 */
Route::auth();


Route::get('/','front_end\FrontEndController@index');
Route::get('/news','front_end\FrontEndController@newsIndex');
Route::get('/shop','front_end\FrontEndController@shopIndex');
Route::get('/contact','front_end\FrontEndController@contactIndex');

//Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'admin'], function () {

        /**
         * Activity Log
         */
        Route::resource('activitylogs','admin\ActivityLogController');
        Route::post('activitylogs/export/excel','admin\ActivityLogController@export_excel');
        Route::post('activitylogs/search','admin\ActivityLogController@search');
        
        /**
         * image route
         */

        Route::post('/uploadimage','admin\UploadController@uploadimage');
        Route::post('{id}/uploadimage','admin\UploadController@deleteimage');
        Route::post('{id}/deletemultiimage','admin\UploadController@deleteMultiUpload');


        /**
         *
         * language route
         */
        Route::get('language','admin\LangController@change');


        /**
        *  CRUD builder
        */
        Route::post('modules/new','admin\CrudBuilderController@generateModule');
        Route::post('modules/updatesecondlevel','admin\CrudBuilderController@updateSecondLevel');
        Route::post('modules/disable','admin\CrudBuilderController@disableModule');
        Route::post('modules/modulerollback','admin\CrudBuilderController@migrateRollback');

        Route::get('modulesbuilder','admin\CrudBuilderController@view');
        Route::resource('modules','admin\CrudBuilderController');
        /**
         * relation builder
         */
        Route::post('relation/modulerollback','admin\CrudBuilderController@migrateRollback');
        Route::get('relation/showcolumn/{tablename}','admin\RelationBuilderController@showColumn');
        Route::get('relation/getrelation','admin\RelationBuilderController@getRelation');
        Route::resource('relation','admin\RelationBuilderController');

        /**
       * import excel csv Route
       */
        Route::post('news/import_excel_csv','admin\ImportController@importCSVEXCEl');
        Route::post('news/import_excel_csv_database','admin\ImportController@importCSVEXCElDatabase');
        Route::post('news/{id}/delete_excel_csv','admin\ImportController@deleteCSVEXCEl');

    /**
     * upload_excel_csv
     * Upload Route
     */
    Route::post('users/uploadimage','admin\UploadController@uploadimage');
    Route::post('users/{id}/uploadimage','admin\UploadController@deleteUserUpload');
    /*
    |--------------------------------------------------------------------------
    | Routes File
    |--------------------------------------------------------------------------
    |
    | Here is where you will register all of the routes in an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */
    /**
     * Upload Route
     */
    Route::post('news/uploadimage','admin\UploadController@uploadimage');
    Route::post('news/{id}/uploadimage','admin\UploadController@deleteNewsUpload');
    Route::post('news/{id}/newsalbum','admin\UploadController@deleteNewsMultipleImageGallery');

    /**
    |--------------------------------------------------------------------------
    | Login  Routes
    |--------------------------------------------------------------------------
    |*/

    Route::get('dashboard','admin\DashboardController@index');

    /**
    |--------------------------------------------------------------------------
    | User  Routes
    |--------------------------------------------------------------------------
    |*/
    Route::resource('users','admin\UserController');
    Route::post('users/search','admin\UserController@search');
    Route::post('users/export/excel','admin\UserController@export_excel');

    /**
    |--------------------------------------------------------------------------
    | Role  Routes
    |--------------------------------------------------------------------------
    |*/
    Route::resource('roles','admin\RoleController');
    Route::post('roles/search','admin\RoleController@search');
    Route::post('roles/export/excel','admin\RoleController@export_excel');
    /**
    |--------------------------------------------------------------------------
    | Permission  Routes
    |--------------------------------------------------------------------------
    |*/
    Route::resource('permissions','admin\PermissionController');
    Route::post('permissions/search','admin\PermissionController@search');
    Route::post('permissions/export/excel','admin\PermissionController@export_excel');
});
 