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
    // return view('welcome');

    // Read File

    $jsonString = file_get_contents(base_path('resources/lang/en/db.json'));

    // $data=$jsonString;
    $data = json_decode($jsonString, true);
    return view('index', compact('data'));
});
