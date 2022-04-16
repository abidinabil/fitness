<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('coach', 'CoachController@coach');
    Route::post('Nutrition', 'NutritionController@SaveNutrition');
    Route::get('getNutrition', 'NutritionController@getNutrition');
    Route::delete('deleteNutrition/{id}' , 'NutritionController@deleteNutrition');
    Route::get('updateNutrition/{id}' , 'NutritionController@updateNutrition');
    Route::put('editNutrition' , 'NutritionController@editNutrition');
    Route::get('Nutrition/{id}' , 'NutritionController@Nutrition');
    Route::post('upload', 'NutritionController@upload');
    Route::post('SaveNutritionniste', 'NutritionnisteController@SaveNutritionniste');
    Route::get('getNutritionniste', 'NutritionnisteController@getNutritionniste');
    Route::delete('deleteNutritionniste/{id}' , 'NutritionnisteController@deleteNutritionniste');
    Route::get('updateNutritionniste/{id}' , 'NutritionnisteController@updateNutritionniste');
    Route::put('editNutritionniste' , 'NutritionnisteController@editNutritionniste');
    Route::post('SaveExercice', 'ExerciceController@SaveExercice');
 

});

