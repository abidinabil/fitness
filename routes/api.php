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
    Route::get('searchNutritionniste/{search}', 'NutritionnisteController@searchNutritionniste');
    Route::post('ModifierImageNutritionniste/{id}' , 'NutritionnisteController@ModifierImageNutritionniste');
    /*****************************************Gestion Gym ************************* */
    Route::post('SaveGym', 'SalleController@SaveGym');
    Route::get('getGym', 'SalleController@getGym');
    Route::delete('deleteGym/{id}' , 'SalleController@deleteGym');
    Route::get('updateGym/{id}' , 'SalleController@updateGym');
    Route::put('editGym' , 'SalleController@editGym');
    Route::get('searchGym/{search}', 'SalleController@searchGym');
    Route::post('ModifierImageGym/{id}' , 'SalleController@ModifierImageGym');
    /*****************************************Fin Gestion gym ******************* */
    Route::post('SaveExercice', 'ExerciceController@SaveExercice');
    Route::get('getExercice', 'ExerciceController@getExercice');
    Route::get('searchExercice/{search}', 'ExerciceController@searchExercice');
    Route::delete('deleteExercice/{id}' , 'ExerciceController@deleteExercice');
    Route::get('updateExercice/{id}' , 'ExerciceController@updateExercice');
    Route::put('editExercice' , 'ExerciceController@editExercice');
    Route::get('getExerciceDetails/{id}', 'ExerciceController@getExerciceDetails');
    Route::post('ModifierImage/{id}' , 'ExerciceController@ModifierImage');
    Route::post('ModifierImage2/{id}' , 'ExerciceController@ModifierImage2');
    Route::post('SaveCoach', 'CoachController@SaveCoach');
    Route::get('getCoach', 'CoachController@getCoach');
    Route::delete('deleteCoach/{id}' , 'CoachController@deleteCoach');
    Route::get('updateCoach/{id}' , 'CoachController@updateCoach');
    Route::put('editCoach' , 'CoachController@editCoach');
    Route::get('searchCoach/{search}', 'CoachController@searchCoach');
    Route::post('ModifierImageCoach/{id}' , 'CoachController@ModifierImageCoach');
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
    Route::put('editWorkoutName' , 'WorkoutController@editWorkoutName');
    Route::post('saveExerciceWorkout', 'ExerciceWorkoutController@saveExerciceWorkout');
    Route::get('getWorkoutDetails/{id}', 'WorkoutController@getWorkoutDetails');
    Route::get('getExerciceWorkout/{id}', 'ExerciceWorkoutController@getExerciceWorkout');
    Route::get('updateExerciceWorkout/{id}' , 'ExerciceWorkoutController@updateExerciceWorkout');
    Route::put('editExerciceWorkout' , 'ExerciceWorkoutController@editExerciceWorkout');
    Route::delete('deleteExerciceWorkout/{id}' , 'ExerciceWorkoutController@deleteExerciceWorkout');
    Route::get('getExerciceByCategorie/{categorie}', 'ExerciceController@getExerciceByCategorie');
    Route::post('saveProduit', 'ProduitController@saveProduit');
        Route::get('searchProduit/{search}', 'ProduitController@searchProduit');
    Route::get('updateProduit/{id}' , 'ProduitController@updateProduit');
    Route::post('ModifierImageProduit/{id}' , 'ProduitController@ModifierImage');
    Route::get('getProduitByCategorie/{categorie}', 'ProduitController@getProduitByCategorie');
    Route::get('getProduit', 'ProduitController@getProduit');
    Route::get('getProduitPaginate', 'ProduitController@getProduitPaginate');
    Route::delete('deleteProduit/{id}' , 'ProduitController@deleteProduit');
    Route::get('getProduitMens/{sous_categorie}', 'ProduitController@getProduitMens');
    Route::get('getProduitWomens/{sous_categorie}', 'ProduitController@getProduitWomens');
    Route::get('getProduitAccessoires/{sous_categorie}', 'ProduitController@getProduitAccessoires');
    Route::get('getProduitProteine/{sous_categorie}', 'ProduitController@getProduitProteine');
    Route::get('getProductDetails/{id}', 'ProduitController@getProductDetails');
    Route::post('addToCart/{user_id}/{produit_id}', 'BasketController@addToCart');
    Route::get('getProduitUser/{id}', 'BasketController@getProduitUser');
    Route::delete('deleteProduitPanier/{id}', 'BasketController@deleteProduitPanier');
    Route::post('SaveAliment', 'AlimentController@SaveAliment');
    Route::get('getAliment', 'AlimentController@getAliment');
    Route::get('updateAlimentUser/{name}', 'AlimentController@updateAlimentUser');
    Route::delete('deleteAliment/{id}' , 'AlimentController@deleteAliment');
    Route::get('getNutritionDetails/{id}', 'NutritionController@getNutritionDetails');
    Route::post('ModifierImageNutrition/{id}' , 'NutritionController@ModifierImageNutrition');
    Route::get('searchAliment/{search}', 'AlimentController@searchAliment');
    Route::get('getAlimentById/{id}', 'AlimentController@getAlimentById');
    Route::get('updateAliment/{id}' , 'AlimentController@updateAliment');
    Route::put('editAliment' , 'AlimentController@editAliment');
    Route::post('SaveRegime', 'RegimeController@SaveRegime');
    Route::delete('deleteRegime/{id}', 'RegimeController@deleteRegime');
    Route::get('updateRegime/{id}' , 'RegimeController@updateRegime');
    Route::post('editRegimeUser/{id}' , 'RegimeController@editRegimeUser');
    Route::get('getRegimeByPdejuner/{id}', 'RegimeController@getRegimeByPdejuner');
    Route::get('getRegimeByDejuner/{id}', 'RegimeController@getRegimeByDejuner');
    Route::get('getRegimeByDinner/{id}', 'RegimeController@getRegimeByDinner');
    Route::get('getRegimeBySnack/{id}', 'RegimeController@getRegimeBySnack');
    Route::get('getRegime/{id}', 'RegimeController@getRegime');
    Route::post('updateProfil/{id}' , 'UserController@updateProfil');
    Route::post('updatePasswordUser/{id}' , 'UserController@updatePasswordUser');
    Route::post('SaveAdmin' , 'UserController@SaveAdmin');
    Route::get('getUser/{id}' , 'UserController@getUser');
    Route::get('searchUser/{search}', 'UserController@searchUser');
    Route::get('getAllUser', 'UserController@getAllUser');
    Route::delete('deleteUser/{id}', 'UserController@deleteUser');
    Route::get('updateAdmin/{id}' , 'UserController@updateAdmin');
    Route::put('editAdmin' , 'UserController@editAdmin');
    Route::post('updateImage/{id}' , 'UserController@updateimage');
    Route::post('SavePost', 'PostController@SavePost');
    Route::get('getPost', 'PostController@getPost');
    Route::get('getAllPost', 'PostController@getAllPost');
    Route::post('AccepterPost/{id}','PostController@AccepterPost');
    Route::post('RefuserPost/{id}','PostController@RefuserPost');
    Route::get('getPostUser/{id}', 'PostController@getPostUser');
    Route::get('updatePost/{id}' , 'PostController@updatePost');
    Route::put('editPost' , 'PostController@editPost');
    Route::delete('deletePost/{id}' , 'PostController@deletePost');
    Route::post('updateImagePost/{id}' , 'PostController@updateImagePost');
    Route::post('SaveCommentaire', 'CommentaireController@SaveCommentaire');
    Route::get('getCommentaire/{id}', 'CommentaireController@getCommentaire');
    Route::delete('deleteCommentaire/{id}' , 'CommentaireController@deleteCommentaire');
    Route::post('updateCommentaire/{id}' , 'CommentaireController@updateCommentaire');
  
    Route::post('SaveEnregistrement/{id_user}/{id_posts}', 'EnregistrementController@SaveEnregistrement');
    Route::get('getEnregistrementUser/{id}', 'EnregistrementController@getEnregistrementUser');
    Route::delete('deleteEnregistrement/{id}' , 'EnregistrementController@deleteEnregistrement');
     Route::post('storeCart', 'OrderController@storeCart');

 
  

});

