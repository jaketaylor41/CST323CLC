<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// Route for navigating to the calculator form with an empty url
Route::get('/', function () {
    return view('calculator');
});

// Route for naviagting to the calculator form with a specific url
Route::get('/calculator', function () {
    return view('calculator');
});

// Route for calling the calculate method from the controller
Route::post('/processCalculate', 'CalculatorController@onCalculate');

// Route for navigating to the result page
Route::get('/result', function () {
    return view('result');
});

Route::get('/all', 'CalculatorController@onGetAll');