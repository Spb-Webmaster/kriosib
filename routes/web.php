<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\PageController;
use App\MoonShine\Controllers\MoonshineIndexController;
use App\MoonShine\Controllers\MoonshinePartnerController;
use App\MoonShine\Controllers\MoonshineSettingController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});


/**
 * контроллеры Moonshine
 */

Route::post('/moonshine/setting', MoonshineSettingController::class);
Route::post('/moonshine/index', MoonshineIndexController::class);
Route::post('/moonshine/partner', MoonshinePartnerController::class);


/**
 * /////контроллеры Moonshine
 */



/**
 * AjaxController
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');


});
/**
 * /// AjaxController
 */


Route::controller(ContactController::class)->group(function () {

    Route::get('/contacts', 'contacts')->name('contacts');

});


Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});

