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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');





//test routes
Route::get('/test', 'TestController@index')->name('test')->middleware('verified');
Route::get('/start', 'TestController@startTest')->name('test.start')->middleware('verified');
Route::post('/begintest', 'TestController@firstQuestion')->name('test.begin')->middleware('verified');

//speaking routes
Route::any('/speaking', 'HomeController@speaking')->name('speaking')->middleware('verified');
Route::any('/shortanswer', 'HomeController@shortanswer')->name('shortanswer')->middleware('verified');
Route::any('/desimage', 'HomeController@describeImage')->name('desimage')->middleware('verified');
Route::any('/srs', 'HomeController@sentenceRepeat')->name('srs')->middleware('verified');
Route::any('/srl', 'HomeController@retellLecture')->name('srl')->middleware('verified');



//listening route
Route::get('/lmcsa', 'HomeController@multipleChoiceSingleAnswer')->name('lmcsa')->middleware('verified');//multiple choice single answer
Route::any('/wfd', 'HomeController@writeFromDictation')->name('wfd')->middleware('verified');//write from dictation  
Route::any('/lsst', 'HomeController@summerizeSpokenText')->name('lsst')->middleware('verified');
Route::any('/lfitb', 'HomeController@fillInTheBlanks')->name('lfitb')->middleware('verified');
Route::any('/lhcs', 'HomeController@HighlightCorrectSummery')->name('lhcs')->middleware('verified');
Route::any('/lsmw', 'HomeController@SelectMissingWord')->name('lsmw')->middleware('verified');
Route::any('/lhiw', 'HomeController@HighlightIncorrectWord')->name('lhiw')->middleware('verified');


//writing routes
Route::any('/wswt', 'HomeController@SummerizeWrittenText')->name('wswt')->middleware('verified');
Route::any('/we', 'HomeController@WrittingEssay')->name('we')->middleware('verified');


//progress route
Route::get('/progress/{head}/{url}', 'HomeController@progress')->name('progress')->middleware('verified');





Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


Route::group(['prefix' => 'admin/','middleware' => ['auth','admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/userlist', 'AdminController@users')->name('admin.user');
    Route::get('/adduser', 'AdminController@adduserview')->name('admin.adduser');
    Route::post('/adduser', 'AdminController@adduserpost')->name('admin.adduserpost');
    Route::get('/premiumuser', 'AdminController@premiumusers')->name('admin.premiumuser');
    Route::get('/evolution', 'AdminController@Evolution')->name('admin.evolution');
    Route::get('/evoluation/{id}', 'AdminController@Evoluate')->name('admin.evoluate');

    //questions
    Route::get('/questions', 'AdminController@questions')->name('admin.questions');
    Route::get('/questions/add', 'AdminController@addquestionview')->name('admin.addquestion');
    Route::post('/questions/add', 'AdminController@addquestionpost')->name('admin.addquestionpost');
    Route::get('/questions/{id}', 'AdminController@questionDelete')->name('admin.questiondelete');
    Route::post('/questions/addtotest', 'AdminController@questionAddTotest')->name('admin.addtotest');


    //testss
    Route::any('/alltest', 'AdminController@showTest')->name('admin.atest')->middleware('verified');
    Route::get('/alltest/add', 'AdminController@addalltestview')->name('admin.addalltest');
    Route::post('/alltest/add', 'AdminController@addalltestpost')->name('admin.addalltest');
    Route::get('/alltest/{id}', 'AdminController@alltestDelete')->name('admin.testdelete');
});



//test routes

Route::group(['middleware' => ['auth']], function () {
    Route::post('/save', 'TestController@speakingDataAdd')->name('test.speaking');
    Route::post('/listening', 'TestController@listeningDataAdd')->name('test.listening');
});
