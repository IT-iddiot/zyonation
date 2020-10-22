<?php

use Illuminate\Support\Facades\Route;

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

// * This is subdomain routing, must stay at the top of all routes 
Route::domain('{subdomain}.darrenter.com')->group(function() {
    Route::redirect('/', '/landingpage');
});

Route::get('/', function () {
    return view('welcome');
});

//* get the current environment 
Route::get('/env/{message}', function($message) {
    return App::environment() . " message : " . $message;
})->name('env');

Route::redirect('/from', '/landingpage');

Route::get('/test/{anything}/hello/{any_thing?}', function($a, $b = "helloworld") {
    return $a . " " . $b;
});

Route::view('/automation', 'automationBuilder');

//* CSS tutorials 
Route::prefix('css')->group(function() {

    Route::view('/pseuodo', 'css/pseudoBeforeAfter');

    Route::view('/position', 'css/position');

});

Route::prefix('js')->group(function() {

    Route::view('/arrow', 'javascript/arrow');
    Route::view('/promise', 'javascript/promise');
    Route::view('/async', 'javascript/asyncAwait');

});

//* Landing page testing
Route::prefix('landingpage')->group(function() {

    Route::get('/', 'LandingPageController@allPageViews');

    Route::get('/create', 'LandingPageController@newLandingPage');
    
    Route::post('/pageviewIncrement', 'LandingPageController@addPageview');
    
    Route::get('/getPageview/{id}', 'LandingPageController@getPageView');
    
    Route::get('/{path}', 'LandingPageController@index');

});

Route::get('/testFetch', function() {
    return "I am response of fetch";
});

Route::view('/form', 'welcome', ['name' => 'Darren']);

Route::post('/form/save', 'FormController@submit');

//* For image uploading 

Route::prefix('/image')->group(function() {

    Route::get('/', 'ImageController@index');
    Route::post('/store', 'ImageController@store');
    Route::get('/download/{src}', 'ImageController@download');
    Route::delete('/delete', 'ImageController@delete');

});


//* Always be the last route in route.php
Route::fallback(function() {
    return view('errors/404');
});



