<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

// Rutas para las asistencias
Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
Route::get('/asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');
Route::get('/asistencias/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show');
Route::get('/asistencias/{asistencia}/edit', [AsistenciaController::class, 'edit'])->name('asistencias.edit');
Route::put('/asistencias/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencias.update');
Route::delete('/asistencias/{asistencia}', [AsistenciaController::class, 'destroy'])->name('asistencias.destroy');



