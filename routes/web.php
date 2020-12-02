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
// Route::domain('{subdomain}.darrenter.com')->group(function() {
//     Route::get('/', function ($subdomain) {
//         dd("Welcome : " . $subdomain);
//     });
// });

Route::get('/', function () {
    return view('testCustomField');
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
    Route::view('/sass', 'css/sass');

});

Route::prefix('js')->group(function() {

    Route::view('/variable', 'javascript/variable');
    Route::view('/arrow', 'javascript/arrow');
    Route::view('/promise', 'javascript/promise');
    Route::view('/async', 'javascript/asyncAwait');
    Route::view('/module', 'javascript/modules');

});

//* Landing page testing
Route::prefix('landingpage')->group(function() {

    Route::get('/', 'LandingPageController@allPageViews');

    Route::get('/create', 'LandingPageController@newLandingPage');
    
    Route::post('/pageviewIncrement', 'LandingPageController@addPageview');
    
    Route::get('/getPageview/{id}', 'LandingPageController@getPageView');
    
    Route::get('/{path}', 'LandingPageController@index');

});

Route::prefix('laravel')->group(function() {
    Route::view('middleware', 'laravel.middlewareForm');
});

Route::post('check/age', function() {
    return "Hehe. You can view the content now";
})->middleware('check.age:true,"helloworld"');

Route::get('/testFetch', function() {
    return "I am response of fetch";
});

Route::view('/form', 'welcome', ['name' => 'Darren']);

Route::post('/form/save', 'FormController@submit');

//* For image uploading 

Route::prefix('/image')->group(function() {

    Route::get('/', 'ImageGalleryController@index');
    Route::post('/store', 'ImageGalleryController@upload');
    Route::post('/download/{id}', 'ImageGalleryController@download');
    Route::delete('/delete/{id}', 'ImageGalleryController@delete');

    Route::post('/upload', 'ImageGalleryController@purePhpConvert');

});


//* Always be the last route in route.php
Route::fallback(function() {
    return view('errors/404');
});



