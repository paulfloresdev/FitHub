<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', [AuthController::class, 'create']);
Route::post('auth/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {

    //  ROLES
    Route::resource('roles', RoleController::class);

    //  TAXES
    Route::resource('taxes', TaxController::class);

    //  BRACHES
    Route::resource('branches', BranchController::class);
});
