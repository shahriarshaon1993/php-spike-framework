<?php

use Spike\core\Route;

use Spike\controllers\AuthController;
use Spike\controllers\HomeController;
use Spike\controllers\SiteController;
use Spike\controllers\admin\DashboardController;

// Route::get('/', [SiteController::class, 'home']);
// Route::get('/about', [SiteController::class, 'about']);
// Route::get('/contact', [SiteController::class, 'contact']);
// Route::post('/contact', [SiteController::class, 'contact']);

// Register
// Route::get('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/logout', [AuthController::class, 'logout']);
// Route::get('/profile', [AuthController::class, 'profile']);

// Start work for blog
Route::get('/', [HomeController::class, 'index']);

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index']);