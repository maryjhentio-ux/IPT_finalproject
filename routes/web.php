<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;

Route::get('/', function () {
    return view('dashboard', [
        'studentCount' => \App\Models\Student::count(),
    ]);
});

Route::resource('memberships', MembershipController::class);

// Compatibility route for the missing students.create name
Route::get('/students/create', function () {
    return redirect()->route('memberships.create');
})->name('students.create');
