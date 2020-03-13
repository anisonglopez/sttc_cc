<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/register', function () {return view('register/register');});
Route::get('/', function () {return view('welcome/index');});
Route::get('/phoom', function () {return view('welcome');});
Route::get('/home', function () {return view('welcome/index');});
Route::get('layout', function () {return view('layout.template');});
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('report', 'ReportController');
Route::get('reportSearch', 'ReportController@reportSearch');
Route::any('jobordercreate', 'JobOrderController@create');
Route::any('joborderheadcreate', 'JobOrderController@create');
Route::resource('joborder', 'JobOrderController');
Route::resource('m_stock', 'M_StockController');
Route::resource('dashboard', 'DashboardController' );
Route::any('joborder/{request}/search', 'JobOrderController@searchResult');
Route::post('joborder/{request}/delete', 'JobOrderController@deletedetail');
Route::any('jobordercreate', 'JobOrderController@create');
Route::any('joborderedit', 'JobOrderController@edit');

// Route::any('joborderupdate', 'JobOrderController@update');
Route::resource('retire', 'RetireController' );
Route::any('retirecreate', 'RetireController@create');
Route::any('retire/{request}/search', 'RetireController@searchResult');
Route::post('retire/{request}/delete', 'RetireController@deletedetail');
Route::resource('receive', 'ReceiveController' );
Route::any('receivecreate', 'ReceiveController@create');
Route::any('receive/{request}/search', 'ReceiveController@searchResult');
Route::post('receive/{request}/delete', 'ReceiveController@deletedetail');
Route::resource('priority', 'PriorityController' );
Route::resource('requester', 'RequesterController' );
Route::resource('employee', 'EmployeeController' );
Route::resource('asset', 'AssetController' );
Route::resource('assetmodel', 'AssetmodelController' );
Route::resource('assetgroup', 'AssetgroupController' );
Route::resource('checkinstatus', 'CheckinstatusController' );
Route::resource('jobstatus', 'JobstatusController' );
Route::resource('outtype', 'OuttypeController' );
Route::resource('jobtype', 'JobtypeController' );
Route::resource('intype', 'IntypeController' );
Route::resource('department', 'DepartmentController' );
Route::resource('branch', 'BranchController' );
Route::resource('businessunit', 'BusinessunitController' );
Route::resource('company', 'CompanyController' );
Route::resource('docnumber', 'DocnumberController' );
Route::resource('location', 'LocationController' );
Route::resource('material', 'MaterialController' );
Route::post('priority_getdata', 'PriorityController@getdata')->name('priority_getdata'); 
Route::post('requester_getdata', 'RequesterController@getdata')->name('requester_getdata'); 
Route::post('employee_getdata', 'EmployeeController@getdata')->name('employee_getdata'); 
Route::post('log_getdata', 'LogController@getdata')->name('log_getdata'); 
Route::post('material_getdata', 'MaterialController@getdata')->name('material_getdata'); 
Route::post('m_stock_getdata', 'M_StockController@getdata')->name('m_stock_getdata'); 

// Component Route
Route::get('/get_branch_from_com/{comid}', 'ComponentController@get_branch_from_com')->name('get_branch_from_com'); 
Route::get('/get_dep_from_branch/{branchid}', 'ComponentController@get_dep_from_branch')->name('get_dep_from_branch'); 
Route::get('/get_material', 'ComponentController@get_material')->name('get_material'); 

Route::get('/get_job_order/{branchid}', 'ComponentController@get_job_order')->name('get_job_order'); 
// End Component Route
Route::post('dashboard_getdataoutstock', 'DashboardController@getdataoutstock')->name('dashboard_getdataoutstock'); 
Route::post('receive_getdata', 'ReceiveController@getdata')->name('receive_getdata'); 
Route::post('retire_getdata', 'RetireController@getdata')->name('retire_getdata'); 
Route::post('assetgroup_getdata', 'AssetgroupController@getdata')->name('assetgroup_getdata'); 
Route::post('assetmodel_getdata', 'AssetmodelController@getdata')->name('assetmodel_getdata'); 
Route::post('asset_getdata', 'AssetController@getdata')->name('asset_getdata'); 
Route::post('businessunit_getdata', 'BusinessunitController@getdata')->name('businessunit_getdata'); 
Route::post('branch_getdata', 'BranchController@getdata')->name('branch_getdata'); 
Route::post('checkinstatus_getdata', 'CheckinstatusController@getdata')->name('checkinstatus_getdata');
Route::post('company_getdata', 'CompanyController@getdata')->name('company_getdata'); 
Route::post('department_getdata', 'DepartmentController@getdata')->name('department_getdata'); 
Route::post('docnumber_getdata', 'DocnumberController@getdata')->name('docnumber_getdata'); 
Route::post('intype_getdata', 'IntypeController@getdata')->name('intype_getdata'); 
Route::post('jobstatus_getdata', 'JobstatusController@getdata')->name('jobstatus_getdata'); 
Route::post('jobtype_getdata', 'JobtypeController@getdata')->name('jobtype_getdata'); 
Route::post('location_getdata', 'LocationController@getdata')->name('location_getdata'); 
Route::post('materialgroup_getdata', 'MaterialgroupController@getdata')->name('materialgroup_getdata');
Route::post('menu_getdata', 'MenuController@getdata')->name('menu_getdata');
Route::post('module_getdata', 'ModuleController@getdata')->name('module_getdata');
Route::post('outtype_getdata', 'OuttypeController@getdata')->name('outtype_getdata');
Route::post('unit_getdata', 'UnitController@getdata')->name('unit_getdata');
Route::post('joborder_getdata', 'JobOrderController@getdata')->name('joborder_getdata');
Route::resource('unit', 'UnitController' );
Route::resource('materialgroup', 'MaterialGroupController' );
Route::post('joborder_getlocation', 'JobOrderController@getlocation')->name('joborder_getlocation');
Route::post('joborder_getrequest_by', 'JobOrderController@getrequest_by')->name('joborder_getrequest_by');
Route::post('joborder_getassign_as', 'JobOrderController@getassign_as')->name('joborder_getassign_as');
Route::post('joborder_getassignee', 'JobOrderController@getassignee')->name('joborder_getassignee');
Route::post('joborder_getmaterial', 'JobOrderController@getmaterial')->name('joborder_getmaterial');
Route::post('joborder_getasset', 'JobOrderController@getasset')->name('joborder_getasset');
Route::post('receive_getmaterial', 'ReceiveController@getmaterial')->name('receive_getmaterial');
Route::post('receive_getasset', 'ReceiveController@getasset')->name('receive_getasset');
Route::post('retire_getmaterial', 'RetireController@getmaterial')->name('retire_getmaterial');
Route::post('retire_getasset', 'RetireController@getasset')->name('retire_getasset');







// Route::group(['prefix' => 'admin'], function(){
//     Route::group(['middleware' => ['admin']], function(){
// });

    // Route::group(['middleware' => ['superuser']], function(){
    //     Route::resource('user', 'UserController' );
    // });

    // Route::group(['middleware' => ['SuperUser']], function(){
    //     Route::resource('user', 'UserController' );
    // });
    // Route::resource('user', 'UserController' );
// });

Route::any('/checkemail/{email}', 'UserController@checkEmail');
// Route::get('empinsert', 'empController@create')->name('empinsert');
Route::resource('role', 'RoleController' );
// Route::any('/role/edit/{id}', 'roleController@edit')->name('role_edit');

Route::resource('module', 'ModuleController' );

Route::resource('menu', 'MenuController' );
Route::resource('log', 'LogController' );
Route::post('log_getdata', 'LogController@getdata')->name('log_getdata'); //DataTable


Route::group(['middleware' => ['auth']], function () {
});


Route::resource('user', 'UserController' );
Route::post('user_getdata', 'UserController@getdata')->name('user_getdata'); 














