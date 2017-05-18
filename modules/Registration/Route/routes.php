<?php
Route::group(['prefix' => 'admin'], function () {
####start
   /*
    |--------------------------------------------------------------------------
    | Registration  Routes
    |--------------------------------------------------------------------------
    |*/
    Route::resource('registrations','Registration\Controller\RegistrationController');
    Route::post('registrations/search','Registration\Controller\RegistrationController@search');
	Route::post('registrations/export/excel','Registration\Controller\RegistrationController@export_excel');
####end
#####relation#####
});
 