<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Resource route covers ALL CRUD actions (including memberships.store)
Route::resource('memberships', MembershipController::class);

// Individual Membership Routes
Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');
Route::get('/memberships/create', [MembershipController::class, 'create'])->name('memberships.create');
Route::post('/memberships', [MembershipController::class, 'store'])->name('memberships.store');