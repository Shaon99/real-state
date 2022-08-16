<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ManageSectionController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\PropertiesController;


/* ADMIN_ROUTE_START*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetCodeEmail']);
    Route::post('password/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify.code');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');

    Route::middleware('admin')->group(function () {
        //LOCATION__ROUTE
        Route::resource('locations', LocationController::class);
        Route::get('location-popular/{id}', [LocationController::class, 'locationPopularUpdate'])->name('location.popular');
        Route::get('location-restore/{id}', [LocationController::class, 'locationRestore'])->name('location.restore');
        Route::delete('location-delete-forever/{id}', [LocationController::class, 'Delete'])->name('location.deleteforever');

        //PROPERTY__TYPE__ROUTE
        Route::get('property-type/{id}', [PropertyTypeController::class, 'propertytypeRestore'])->name('propertytype.restore');
        Route::delete('property-type-trash-forever/{id}', [PropertyTypeController::class, 'propertytypeDelete'])->name('propertytype.deleteforever');
        Route::resource('property-type', PropertyTypeController::class);

        //PROPERTIES_ROUTE
        Route::get('properties-status/{id}', [PropertiesController::class, 'propertyStatusUpdate'])->name('properties.status');
        Route::get('properties-featured/{id}', [PropertiesController::class, 'propertyFeaturedUpdate'])->name('properties.featured');
        Route::get('properties-popular/{id}', [PropertiesController::class, 'propertyPopularUpdate'])->name('properties.popular');
        Route::get('property-recover/{id}', [PropertiesController::class, 'propertyRestore'])->name('property.restore');
        Route::delete('property-type-delete-forever/{id}', [PropertiesController::class, 'propertyDelete'])->name('property.deleteforever');
        Route::resource('properties', PropertiesController::class);



        // GENERAL_ROUTE
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('home');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::post('change/password', [AdminController::class, 'changePassword'])->name('change.password');
        Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
        Route::post('general/setting', [GeneralSettingController::class, 'generalSettingUpdate']);
        Route::get('database', [GeneralSettingController::class, 'databaseBackup'])->name('general.database');
        Route::get('cacheclear', [GeneralSettingController::class, 'cacheClear'])->name('general.cacheclear');
        Route::get('email/config', [EmailTemplateController::class, 'emailConfig'])->name('email.config');
        Route::post('email/config', [EmailTemplateController::class, 'emailConfigUpdate']);
        Route::get('email/templates', [EmailTemplateController::class, 'emailTemplates'])->name('email.templates');
        Route::get('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesEdit'])->name('email.templates.edit');
        Route::post('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesUpdate']);
        Route::get('subscribers', [HomeController::class, 'subscribers'])->name('subscribers');
        Route::get('pages', [PagesController::class, 'index'])->name('frontend.pages');
        Route::get('pages/create', [PagesController::class, 'pageCreate'])->name('frontend.pages.create');
        Route::post('pages/create', [PagesController::class, 'pageInsert']);
        Route::get('pages/edit/{page}', [PagesController::class, 'pageEdit'])->name('frontend.pages.edit');
        Route::post('pages/edit/{page}', [PagesController::class, 'pageUpdate']);
        Route::get('pages/search', [PagesController::class, 'index'])->name('frontend.search');
        Route::post('pages/delete/{page}', [PagesController::class, 'pageDelete'])->name('frontend.pages.delete');
        Route::get('manage/section', [ManageSectionController::class, 'index'])->name('frontend.section');
        Route::get('manage/section/{name}', [ManageSectionController::class, 'section'])->name('frontend.section.manage');
        Route::post('manage/section/{name}', [ManageSectionController::class, 'sectionContentUpdate']);
        Route::get('manage/element/{name}', [ManageSectionController::class, 'sectionElement'])->name('frontend.element');
        Route::get('manage/element/{name}/search', [ManageSectionController::class, 'section'])->name('frontend.element.search');
        Route::post('manage/element/{name}', [ManageSectionController::class, 'sectionElementCreate']);
        Route::get('edit/{name}/element/{element}', [ManageSectionController::class, 'editElement'])->name('frontend.element.edit');
        Route::post('edit/{name}/element/{element}', [ManageSectionController::class, 'updateElement']);
        Route::post('delete/{name}/element/{element}', [ManageSectionController::class, 'deleteElement'])->name('frontend.element.delete');
        Route::get('send-email', [HomeController::class, 'sendEmail'])->name('sendEmail');
        Route::post('send-email', [HomeController::class, 'sendgroupEmail'])->name('sendgroupEmail');
        Route::get('contact-us-data', [HomeController::class, 'contactUs'])->name('contact-us');
        Route::get('request-price-query', [HomeController::class, 'requestQuery'])->name('requestquery');
        Route::post('contact-us-data-reply/{mail}', [HomeController::class, 'contactReplpy'])->name('contact.mail');
        Route::delete('contact-us-data-delete/{id}', [HomeController::class, 'contactDelete'])->name('contact.destroy');
        Route::delete('request-query-delete/{id}', [HomeController::class, 'queryDelete'])->name('requestquery.destroy');
    });
});

/* ADMIN_ROUTE_END*/


/* FRONTEND_HOME_BASIC_ROUTE_START*/

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::post('request', [SiteController::class, 'askForPrice'])->name('akforprice');
Route::get('photo-gallery', [SiteController::class, 'photoGalelry'])->name('photogallery');
Route::get('video-gallery', [SiteController::class, 'vedioGallery'])->name('vediogallery');
Route::post('contact', [SiteController::class, 'contactSend'])->name('contact');
Route::post('subscribe', [SiteController::class, 'subscribe'])->name('subscribe');
Route::get('all-property', [SiteController::class, 'allProperty'])->name('allproperty');
Route::post('main-search', [SiteController::class, 'mainsearch'])->name('mainsearch');
Route::post('search', [SiteController::class, 'search'])->name('search');
Route::get('{pages}', [SiteController::class, 'page'])->name('pages');
Route::get('blog/{id}/{slug}', [SiteController::class, 'blogDetails'])->name('blog.details');
Route::get('property/{slug}', [SiteController::class, 'propertyDetails'])->name('property.details');
Route::get('property-popular-place/{location}', [SiteController::class, 'LocationProperty'])->name('locationproperty');
Route::get('property-collection/{type}', [SiteController::class, 'CollectionProperty'])->name('collectionproperty');


/* FRONTEND_HOME-BASIC_ROUTE_END*/
