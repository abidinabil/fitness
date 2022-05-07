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
    Route::get('getExercice', 'ExerciceController@getExercice');
    Route::post('SaveCoach', 'CoachController@SaveCoach');
    Route::get('getCoach', 'CoachController@getCoach');
    Route::delete('deleteCoach/{id}' , 'CoachController@deleteCoach');
    Route::get('updateCoach/{id}' , 'CoachController@updateCoach');
    Route::put('editCoach' , 'CoachController@editCoach');
    Route::post('SaveSalle', 'SalleController@SaveSalle');
    Route::get('getSalle', 'SalleController@getSalle');
    Route::delete('deleteSalle/{id}' , 'SalleController@deleteSalle');
    Route::get('updateSalle/{id}' , 'SalleController@updateSalle');
    Route::put('editSalle' , 'SalleController@editSalle');
    Route::post('store', 'ImagesController@store');
    Route::get('getImages', 'ImagesController@getImages');
    Route::post('SaveWorkout', 'WorkoutController@SaveWorkout');
    Route::delete('deleteWorkout/{id}' , 'WorkoutController@deleteWorkout');
    Route::get('getWorkout/{id}', 'WorkoutController@getWorkout');
    Route::post('saveExerciceWorkout', 'ExerciceWorkoutController@saveExerciceWorkout');
    Route::get('getWorkoutDetails/{id}', 'WorkoutController@getWorkoutDetails');
    Route::get('getExerciceWorkout/{id}', 'ExerciceWorkoutController@getExerciceWorkout');
    Route::delete('deleteExerciceWorkout/{id}' , 'ExerciceWorkoutController@deleteExerciceWorkout');
    Route::get('getExerciceByCategorie/{categorie}', 'ExerciceController@getExerciceByCategorie');
    Route::post('saveProduit', 'ProduitController@saveProduit');
    Route::get('getProduitByCategorie/{categorie}', 'ProduitController@getProduitByCategorie');
    Route::get('getProduit', 'ProduitController@getProduit');
    Route::get('getProduitMens/{sous_categorie}', 'ProduitController@getProduitMens');
    Route::get('getProduitWomens/{sous_categorie}', 'ProduitController@getProduitWomens');
    Route::get('getProduitAccessoires/{sous_categorie}', 'ProduitController@getProduitAccessoires');
    Route::get('getProduitProteine/{sous_categorie}', 'ProduitController@getProduitProteine');
    Route::get('getProductDetails/{id}', 'ProduitController@getProductDetails');
  

});

