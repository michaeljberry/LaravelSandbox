<?php

use MichaelBerry\MBImage\Models\MBImage;

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
    $data['images'] = MBImage::orderBy('id', 'desc')->first();
    return view('welcome', $data);
});
