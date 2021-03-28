<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\LabStudies;
use App\Models\Patient;
use App\Models\PatientLab;

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

Route::post('/post', function (Request $request) {
    $patientLabs = PatientLab::firstOrCreate([
        'date_of_test' => $request ->input ('date_of_test'),
        'id_number' => $request ->input ('id_number'),
        'patient_name' => $request ->input ('patient_name'),
        'gender' => $request ->input ('gender'),
        'date_of_birth' => $request ->input ('date_of_birth'),
        'lab_number' => $request ->input ('lab_number'),
        'clinic_code' => $request ->input ('clinic_code')
    ]);

    $labStudies = $patientLabs->LabStudies()->firstOrCreate([
        'code' => $request ->input ('code'),
        'name' => $request ->input ('name'),
        'value' => $request ->input ('value'),
        'unit' => $request ->input ('unit'),
        'ref_range' => $request ->input ('ref_range'),
        'finding' => $request ->input ('finding'),
        'result_state' => $request ->input ('result_state')
    ]);

    return response()->json([
        "message" => "succes",
        "data" => $labStudies
    ]);
});

Route::get('/', function(){
    return view('welcome');
});

Route::post('/create', 'App\Http\Controllers\Controller@create');
Route::post('/create2', 'App\Http\Controllers\Controller@create2');

Route::get('/show', 'App\Http\Controllers\Controller@show');        
