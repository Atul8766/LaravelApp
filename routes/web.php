<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("testing", function () {
    return "<h1>this project is deployed by atul</h1>";
});
