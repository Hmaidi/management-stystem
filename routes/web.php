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

Route::get('admin/dashboard', 'HomeController@index')->name('home');




Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
    return view('layouts.master');
});




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('permissions', 'PermissionsController');
    Route::delete('permissions_mass_destroy', 'PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'RolesController');
    Route::delete('roles_mass_destroy', 'RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'UsersController');
    Route::delete('users_mass_destroy', 'UsersController@massDestroy')->name('users.mass_destroy');




// Admin Group


    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('employee', 'EmployeeController');
    Route::resource('projet', 'ProjetController');

    Route::resource('customer', 'CustomerController');
    Route::resource('attendance', 'AttendanceController');
    Route::put('attendance/{attendance?}', 'AttendanceController@att_update')->name('attendance.att_update');
    Route::resource('supplier', 'SupplierController');
    Route::resource('advanced_salary', 'AdvancedSalaryController');
    Route::resource('salary', 'SalaryController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('expense', 'ExpenseController');
    Route::get('expense-today', 'ExpenseController@today_expense')->name('expense.today');
    Route::get('expense-month/{month?}', 'ExpenseController@month_expense')->name('expense.month');
    Route::get('expense-yearly/{year?}', 'ExpenseController@yearly_expense')->name('expense.yearly');

    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::put('setting/{id}', 'SettingController@update')->name('setting.update');

    Route::resource('pos', 'PosController');

    Route::get('order/create', 'OrderDetailController@create')->name('order.create');

    Route::post('order/store', 'OrderDetailController@store')->name('order.store');

    Route::get('order/show/{id}', 'OrderController@show')->name('order.show');
    Route::get('order/pending', 'OrderController@pending_order')->name('order.pending');
    Route::get('order/approved', 'OrderController@approved_order')->name('order.approved');
    Route::get('order/confirm/{id}', 'OrderController@order_confirm')->name('order.confirm');
    Route::delete('order/delete/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::get('order/download/{id}', 'OrderController@download')->name('order.download');

    Route::get('sales-today', 'OrderController@today_sales')->name('sales.today');
    Route::get('sales-monthly/{month?}', 'OrderController@monthly_sales')->name('sales.monthly');
    Route::get('sales-total','OrderController@total_sales')->name('sales.total');

    Route::resource('cart', 'CartController');

    Route::post('invoice', 'InvoiceController@create')->name('invoice.create');
    Route::get('print/{customer_id}', 'InvoiceController@print')->name('invoice.print');
    Route::get('order-print/{order_id}', 'InvoiceController@order_print')->name('invoice.order_print');
    Route::post('invoice-final', 'InvoiceController@final_invoice')->name('invoice.final_invoice');






});
