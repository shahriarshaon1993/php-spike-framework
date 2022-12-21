<?php

use Spike\core\Route;

Route::get('/', function () {
    return 'hello world';
});

Route::get('/about', function () {
    return 'About page';
});