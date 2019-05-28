<?php

//use App\Http\Controllers\FamilyController;
//use App\Http\Controllers\AddressController;
//use App\Http\Controllers\FamilyMemberController;
//use App\Http\Controllers\HousingController;
//use App\Http\Controllers\RelationshipTypeController;
//use App\Http\Controllers\ExternalInstitutionController;
//use App\Http\Controllers\HealthHistoryController;
//use App\Http\Controllers\ScholarityController;
//use App\Http\Controllers\ApplicantController;

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
Route::group(['prefix'=>'family'], function(){
    Route::resource('member', FamilyMemberController::class);
    Route::resource('relationship', RelationshipTypeController::class);
    Route::resource('housing', HousingController::class);
});
Route::resource('family', FamilyController::class);

Route::group(['prefix'=>'institution'], function(){
    Route::resource('address', AddressController::class);
    Route::resource('external', ExternalInstitutionController::class);
});

Route::group(['prefix'=>'applicant'], function(){
    Route::resource('health', HealthHistoryController::class);
    Route::resource('scholarity', ScholarityController::class);
});
Route::resource('applicant', ApplicantController::class);

