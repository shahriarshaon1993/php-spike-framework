<?php

use Spike\core\Route;

Route::get('/', 'home');

Route::get('/about', function () {
    return 'About page';
});

Route::get('/contact', 'contact');
Route::post('/contact', function() {
    return 'Handleing Submited Data';
});