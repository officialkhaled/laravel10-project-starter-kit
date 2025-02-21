<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $breadcrumbs = [
        ['label' => 'Home'],
    ];

    return view('dashboard', compact('breadcrumbs'));
})->middleware(['auth', 'verified'])->name('dashboard');

// OAuth Login
Route::group(['prefix' => '/login', 'as' => 'login.'], function () {
    Route::get('google', [LoginController::class, 'redirectToGoogle'])->name('google');
    Route::get('google/callback', [LoginController::class, 'handleGoogleCallback']);

    Route::get('github', [LoginController::class, 'redirectToGithub'])->name('github');
    Route::get('github/callback', [LoginController::class, 'handleGithubCallback']);
});

// Permissions
Route::group(['middleware' => ['role:super-admin|admin']], function () {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
