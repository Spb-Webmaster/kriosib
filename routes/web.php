<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});
/**
 * AjaxController
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');


});
/**
 * /// AjaxController
 */
Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});

