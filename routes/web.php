<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuditDataController;

// User rotes
Route::get('/', [UserController::class, 'loginpage']);
Route::get('/signup', [UserController::class, 'signuppage']);
Route::post('/createuser', [UserController::class, 'createnewuser']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/loginuser', [UserController::class, 'loginexistinguser']);

// Item rotes
Route::get('/newitem', [ItemController::class, 'newitempage']);
Route::post('/createitem', [ItemController::class, 'createnewitem']);
Route::get('/table', [ItemController::class, 'showitemtable']);
Route::get('/delete/{id}', [ItemController::class, 'deleteitem']);
Route::get('/edit/{id}', [ItemController::class, 'edititem']);
Route::post('/edit/{id}', [ItemController::class, 'updateitem']);
Route::get('/view/{id}', [ItemController::class, 'viewitem']);

// Audit Data routes
// Examples for testing when all data items were added on 2024-05-27: 
// 127.0.0.1:8000/filterauditdata/2024-05-25/2024-05-26 => shows empty array
// 127.0.0.1:8000/filterauditdata/2024-05-25/2024-05-27 => shows all data items descending
// http://127.0.0.1:8000/filterauditdata/2024-05-25/2024-05-29 => shows all data items descending
// http://127.0.0.1:8000/filterauditdata/2024-05-28/2024-05-27 => shows empty array
// http://127.0.0.1:8000/filterauditdata/ => shows 10 latest data items by default
Route::get('/filterauditdata/{from?}/{to?}', [AuditDataController::class, 'filterauditdata']);
