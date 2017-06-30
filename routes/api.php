<?php

use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function(Request $request) {
	$phone = $request->input('phone');
	$user = User::where('email', $request->input('phone'))->first();
	ini_set('always_populate_raw_post_data', '-1');
	if($user) {
		return json_encode($user);
	}
	
});