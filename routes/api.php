<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api\V1\Admin'],function (){
    Route::get('solicitation', 'SolicitationsController@index');
});

Route::group(['prefix' => 'v1/', 'middleware' => 'auth:api'], function () {
    /*Routes Admin*/
    Route::group(['prefix' => 'admin', 'namespace' => 'Api\V1\Admin'], function () {
        /*util*/
        Route::get('cnpj/{cnpj}', 'UtilController@getCnpj');
        Route::get('cep/{cep}', 'UtilController@getCep');
        Route::get('calls', 'UtilController@initCall');
        Route::get('feriados', 'UtilController@diasFeriados');
        Route::delete('file/delete/{image}/{folder}', 'UtilController@deleteFile');
        Route::post('sms/send', 'CalledController@send');

        /*Users*/
        Route::post('user', 'UserController@store');
        Route::post('user/upload', 'UserController@upload');
        Route::get('authenticated', 'UserController@authenticated');
        Route::get('user', 'UserController@index');
        Route::get('user/attendant', 'UserController@getAttendant');
        Route::get('user/{id}', 'UserController@edit');
        Route::get('permissions', 'PermissionController@index');
        Route::post('user/permission', 'UserController@permission');
        Route::put('user/{id}', 'UserController@update');
        Route::delete('user/{id}', 'UserController@delete');
        Route::patch('user/{id}', 'UserController@updateStatus');
        Route::patch('user/password/{id}', 'UserController@updatePassword');

        /*Company*/
        Route::post('company', 'CompaniesController@store');
        Route::post('company/upload/{folder}', 'CompaniesController@upload');
        Route::get('company', 'CompaniesController@index');
        Route::get('company/{id}', 'CompaniesController@edit');
        Route::put('company/{id}', 'CompaniesController@update');
        Route::patch('company/{id}', 'CompaniesController@updateStatus');

        /*receiver*/
        Route::post('receiver', 'ReceiversController@store');
        Route::post('receiver/people/{id}', 'ReceiversController@people');
        Route::post('receiver/upload/{folder}', 'ReceiversController@upload');
        Route::get('receiver', 'ReceiversController@index');
        Route::get('receiver/cpf/{cpf}', 'ReceiversController@getCpf');
        Route::get('receiver/{id}', 'ReceiversController@edit');
        Route::put('receiver/{id}', 'ReceiversController@update');
        Route::patch('receiver/{id}', 'ReceiversController@updateStatus');
        Route::delete('receiver/{id}', 'ReceiversController@delete');

        /*Receiver*/
        Route::post('product', 'ProductsController@store');
        Route::get('product', 'ProductsController@index');
        Route::get('product/filter', 'ProductsController@productFilter');
        Route::get('product/{id}', 'ProductsController@edit');
        Route::put('product/{id}', 'ProductsController@update');
        Route::patch('product/{id}', 'ProductsController@updateStatus');
        Route::delete('product/{id}', 'ProductsController@delete');

        /*Addresses*/
        Route::get('address/{id}', 'AddressController@edit');
        Route::put('address/{id}', 'AddressController@update');
        Route::post('address', 'AddressController@store');

        /*solicitation*/
        Route::post('solicitation', 'SolicitationsController@store');
        Route::post('solicitation/scheduling', 'SolicitationsController@scheduleSolicitation');
        Route::post('solicitation/{id}', 'SolicitationsController@updateAddress');
        Route::post('solicitation/upload/{folder}', 'SolicitationsController@upload');
        Route::get('solicitation', 'SolicitationsController@index');
        Route::get('solicitation/{id}', 'SolicitationsController@edit');
        Route::get('solicitation/user', 'SolicitationsController@getUserId');
        Route::put('solicitation/{id}', 'SolicitationsController@update');
        Route::put('solicitation/schedule/{id}', 'SolicitationsController@canceledSchedule');
        Route::post('attempt', 'SolicitationsController@schedulingAttempt');
        Route::patch('solicitation/{id}', 'SolicitationsController@updateStatus');
        Route::delete('solicitation/{id}', 'SolicitationsController@delete');
        Route::put('solicitation', 'SolicitationsController@updateAttendant');
        Route::patch('solicitation/init/{id}', 'SolicitationsController@initSolicitation');
        Route::get('count', 'SolicitationsController@counts');
        Route::get('count/now', 'SolicitationsController@countNow');
        Route::get('mounth', 'SolicitationsController@countMounth');

        /*Audits*/
        Route::get('audit', 'AuditsController@index');
        Route::get('audit/filter', 'AuditsController@audittFilter');
    });
});
