<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index');
Route::view('/movie', 'pages.show');
