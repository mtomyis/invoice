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
    return view('welcome');
});
Route::get('/create-invoice', function () {
    return view('create_invoice');
});

Route::get('/detail-invoice/{id}', 'C_detail_invoice@index');
Route::post('/add-detail','C_detail_invoice@input')->name('add-detail');
Route::post('/fetch-detail','C_detail_invoice@fetch')->name('fetch-detail');
Route::post('/update-detail','C_detail_invoice@update')->name('update-detail');
Route::post('/delete-detail','C_detail_invoice@delete')->name('delete-detail');

Route::post('/add-invoice','C_invoice@input')->name('add-invoice');



Route::get('pdf', 'PDFController@generatePDF');

Route::get('/uji/{id}','C_detail_invoice@index');
