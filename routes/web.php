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

/** Publicly Available Routes **/
Route::view('/', 'home');
Route::view('/policies', 'policies')->name('maclab-policies');
Route::view('/contacts', 'contacts')->name('maclab-contacts');

Route::group(['middleware' => ['mail']], function() {
    Auth::routes();
});


Route::middleware(['mail'])->group(function () {

    Route::prefix('3d')->name('3d.')->namespace('Printing')->group(function () {

        Route::get('/', 'PublicController@index')->name('home');

        Route::group(['middleware' => ['auth']], function() {

            Route::get('/admin', 'AdminController@index')->name('admin');

            Route::resource('/admin/department', 'DepartmentController');

            Route::post('/admin/filament/sort', 'FilamentController@sort')->name('filament.sort');
            Route::post('/admin/filament/toggle-printer', 'FilamentController@togglePrinter')->name('filament.toggle-printer');
            Route::get('/admin/filament/{filamentid}/printer/{printerid}/colors', 'FilamentController@showColorManager')->name('filament.color-manager');
            Route::post('/admin/filament/{filamentid}/printer/{printerid}/colors', 'FilamentController@updateColorManager')->name('filament.color-manager');
            Route::get('/admin/filament/{filamentid}/printer/{printerid}/pricing', 'FilamentController@showPricingManager')->name('filament.pricing-manager');
            Route::post('/admin/filament/{filamentid}/printer/{printerid}/pricing', 'FilamentController@updatePricingManager')->name('filament.pricing-manager');
            Route::resource('/admin/filament', 'FilamentController');

            Route::get('/admin/patron', 'PatronAdminController@index')->name('admin.patron.index');
            Route::delete('/admin/patron/{id}', 'PatronAdminController@destroy')->name('admin.patron.destroy');

            Route::get('/admin/settings', 'SettingsController@index')->name('settings.index');
            Route::post('/admin/settings', 'SettingsController@update')->name('settings.update');

            Route::resource('/admin/user', 'UserController');
            Route::post('/admin/color/sort', 'ColorController@sort')->name('color.sort');
            Route::resource('/admin/color', 'ColorController');
            Route::post('/admin/notification/sort', 'NotificationController@sort')->name('notification.sort');
            Route::resource('/admin/notification', 'NotificationController');
            Route::post('/admin/printer/sort', 'PrinterController@sort')->name('printer.sort');
            Route::resource('/admin/printer', 'PrinterController');

            Route::post('/admin/status/sort', 'StatusController@sort')->name('status.sort');
            Route::resource('/admin/status', 'StatusController');
            Route::resource('/admin/payment', 'PaymentController');

            Route::get('/admin/charts', 'ChartsController@index')->name('charts');

            Route::get('/admin/email/{id}', 'AdminController@createEmail')->name('admin.create-email');
            Route::post('/admin/email/{id}', 'AdminController@sendEmail')->name('admin.send-email');


            Route::get('/admin/coupons', 'CouponController@index')->name('coupons.index');
            Route::post('/admin/coupons', 'CouponController@store')->name('coupons.store');
            Route::delete('/admin/coupons/{id}', 'CouponController@destroy')->name('coupons.destroy');

            Route::get('/admin/{id}', 'AdminController@edit')->name('admin.edit');


            Route::resource('uploadfile', 'UploadFileController');
            Route::post('/reprint/{id}', 'AdminController@reprint')->name('admin.reprint');

            Route::resource('/patron', 'PatronController');

            Route::post('/update-payment-status', 'PaymentController@updatePaymentStatus')->name('payment.update.status');

            Route::get('download/{filename}', 'PatronController@download')->where('filename', '(.*)')->name('download');

            Route::put('/admin/{id}','AdminController@update')->name('admin.update');



        });


        Route::group(['middleware' => ['cas.auth', 'patron.auth']], function() {

            Route::get('/printers', 'PublicController@printers')->name('printers');
            Route::get('/policy', 'PublicController@policy')->name('policy');
            Route::get('/contact', 'PublicController@contact')->name('contact');
            Route::post('/send-email', 'PublicController@sendEmail')->name('send-email');

            Route::get('/quote', 'CostController@quote')->name('quote');

            // Workflow for choosing best-priced printer
            Route::get('/options', 'PatronController@options')->name('options');
            Route::get('/choose-printer', 'PatronController@choosePrinter')->name('choose-printer');
            Route::get('/upload', 'PatronController@upload')->name('upload');
            Route::post('/submit', 'PatronController@submit')->name('submit');
            Route::get('/history', 'PatronController@history')->name('history');
            Route::get('/history/{id}', 'PatronController@show')->name('show');
            Route::delete('/history/{id}', 'PatronController@destroy')->name('job.delete');

            Route::get('/register', 'RegistrationController@edit')->name('register');
            Route::put('/register', 'RegistrationController@update')->name('update.patron.info');
        });


    });

    Route::prefix('equipment')->name('equipment.')->namespace('Equipment')->group(function () {

        Route::view('/', 'equipment.index')->name('home');

        Route::group(['middleware' => ['cas.auth', 'patron.auth']], function() {
            Route::get('/terms', 'PatronController@terms')->name('patron.terms');
            Route::post('/terms', 'PatronController@updateTerms')->name('patron.terms');
            Route::get('/profile', 'PatronController@profile')->name('patron.profile');
        });

        Route::group(['middleware' => ['auth']], function() {
            Route::get('/admin', 'AdminController@home')->name('admin');
            Route::post('/admin', 'AdminController@updateHome')->name('admin');
            Route::get('/admin/date', 'DateController@index')->name('admin.date.index');
            Route::get('/admin/date/edit/{date}', 'DateController@edit')->name('admin.date.edit');
            Route::post('/admin/date/edit/{date}', 'DateController@update')->name('admin.date.edit');
            Route::get('/admin/equipment-type', 'EquipmentTypeController@index')->name('admin.equipment-type.index');
            Route::post('/admin/equipment-type/create', 'EquipmentTypeController@store')->name('admin.equipment-type.create');
            Route::post('/admin/checkouts/{type}', 'CheckoutController@updateIndex')->name('admin.checkouts');
            Route::get('/admin/checkouts/{type}', 'CheckoutController@index')->name('admin.checkouts');
            Route::get('/admin/equipment/create', 'EquipmentController@create')->name('admin.equipment.create');
            Route::post('/admin/equipment/create', 'EquipmentController@store')->name('admin.equipment.create');

            Route::get('/admin/reports', 'CheckoutReportController@index')->name('admin.report.index');
            Route::post('/admin/reports/export', 'CheckoutReportController@export')->name('admin.report.export');


            Route::get('/admin/{patron}', 'AdminController@show')->name('admin.patron.show');
            Route::post('/admin/{patron}', 'AdminController@updateShow')->name('admin.patron.show');
            Route::get('/admin/{patron}/history', 'PatronController@show')->name('admin.patron.history');
            Route::get('/admin/{patron}/authorize', 'PatronController@authorizeForm')->name('admin.patron.authorize');
            Route::post('/admin/{patron}/authorize', 'PatronController@authorizeCameras')->name('admin.patron.authorize');
            Route::post('/admin/{patron}/checkin', 'CheckoutController@checkin')->name('admin.checkin');

            Route::group(['middleware' => ['checkout.auth']], function() {
                Route::post('/admin/{patron}/checkout/{equipment}', 'CheckoutController@store')->name('admin.checkout.create');
                Route::get('/admin/{patron}/checkout/{equipment}', 'CheckoutController@create')->name('admin.checkout.create');
            });

            Route::get('/admin/checkout/approval', 'CheckoutController@approvalForm')->name('admin.checkout.approval');
            Route::post('/admin/checkout/approval', 'CheckoutController@approval')->name('admin.checkout.approval');
            Route::get('/admin/checkout/{checkout}', 'CheckoutController@show')->name('admin.checkout.show');


        });
        // TODO: Add Camera Checkout system here

    });

});