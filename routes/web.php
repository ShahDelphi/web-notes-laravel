<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

Route::get('/', [NotesController::class, 'index']);
Route::get('/notes/create', [NotesController::class, 'create']);
Route::post('/notes', [NotesController::class, 'store']);
Route::get('/notes/{id}/edit', [NotesController::class, 'edit']);
Route::put('/notes/{id}', [NotesController::class, 'update']);
Route::delete('/notes/{id}', [NotesController::class, 'destroy']);
