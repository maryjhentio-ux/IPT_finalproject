<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\EventController;

// Dashboard Route
Route::get('/', function () {
    return view('dashboard', [
        'studentCount' => \App\Models\Student::count(),
    ]);
})->name('dashboard');

// Resource Routes for everything in your navigation menu
Route::resource('organizations', OrganizationController::class);
Route::resource('students', StudentController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('officers', OfficerController::class);
Route::resource('events', EventController::class);