<?php
	
	use Illuminate\Http\Request;
	
	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	
	Route::resource('user',"UserController");
	Route::resource('order',"OrderController");
	Route::resource('menu',"MenuController");
	Auth::routes();
	
	Route::prefix('order')->group(function (){
		Route::get("{user}/index","OrderController@index");
	});
	//
	//Route::middleware('auth:api')->get('/user', function (Request $request) {
	//    return $request->user();
	//});

