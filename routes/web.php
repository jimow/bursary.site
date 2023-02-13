<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // County
    Route::delete('counties/destroy', 'CountyController@massDestroy')->name('counties.massDestroy');
    Route::resource('counties', 'CountyController');

    // Sub County
    Route::delete('sub-counties/destroy', 'SubCountyController@massDestroy')->name('sub-counties.massDestroy');
    Route::resource('sub-counties', 'SubCountyController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Application
    Route::get('applications/awardcdf','ApplicationController@app_cdf')->name('applications.app_cdf');
    Route::post('applications/update_cdf','ApplicationController@awardcdf')->name('applications.update_cdf');
   
    Route::get('applications/awardcounty','ApplicationController@app_county')->name('applications.app_county');
    Route::post('applications/updatecounty','ApplicationController@awardcounty')->name('applications.updatecounty');
    Route::post('applications/updatebalance','ApplicationController@updatebalance')->name('applications.updatebalance');
    Route::post('applications/applycounty','ApplicationController@apply_county')->name('applications.applycounty');
    
    Route::post('applications/updatecdf','ApplicationController@updatecdf')->name('applications.updatecdf');
    Route::post('applications/updateCdfAward','ApplicationController@updateCdfAward')->name('applications.updateCdfAward');
    Route::delete('applications/destroy', 'ApplicationController@massDestroy')->name('applications.massDestroy');
    Route::post('applications/media', 'ApplicationController@storeMedia')->name('applications.storeMedia');
    Route::post('applications/ckmedia', 'ApplicationController@storeCKEditorImages')->name('applications.storeCKEditorImages');
    Route::post('applications/parse-csv-import', 'ApplicationController@parseCsvImport')->name('applications.parseCsvImport');
    Route::post('applications/process-csv-import', 'ApplicationController@processCsvImport')->name('applications.processCsvImport');
    Route::resource('applications', 'ApplicationController');

    // Ward
    Route::delete('wards/destroy', 'WardController@massDestroy')->name('wards.massDestroy');
    Route::post('wards/parse-csv-import', 'WardController@parseCsvImport')->name('wards.parseCsvImport');
    Route::post('wards/process-csv-import', 'WardController@processCsvImport')->name('wards.processCsvImport');
    Route::resource('wards', 'WardController');

    // Institution
    Route::delete('institutions/destroy', 'InstitutionController@massDestroy')->name('institutions.massDestroy');
    Route::resource('institutions', 'InstitutionController');

    // Financial Year
    Route::delete('financial-years/destroy', 'FinancialYearController@massDestroy')->name('financial-years.massDestroy');
    Route::resource('financial-years', 'FinancialYearController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // System Settings
    Route::delete('system-settings/destroy', 'SystemSettingsController@massDestroy')->name('system-settings.massDestroy');
    Route::resource('system-settings', 'SystemSettingsController');

    // Award Uploads
    Route::delete('award-uploads/destroy', 'AwardUploadsController@massDestroy')->name('award-uploads.massDestroy');
    Route::post('award-uploads/media', 'AwardUploadsController@storeMedia')->name('award-uploads.storeMedia');
    Route::post('award-uploads/ckmedia', 'AwardUploadsController@storeCKEditorImages')->name('award-uploads.storeCKEditorImages');
    Route::resource('award-uploads', 'AwardUploadsController');

    // Course
    Route::delete('courses/destroy', 'CourseController@massDestroy')->name('courses.massDestroy');
    Route::resource('courses', 'CourseController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
