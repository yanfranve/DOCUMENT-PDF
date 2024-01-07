<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmpleadoController;

Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');

Route::post('/documents', [DocumentController::class, 'store'])->name('document.store');
Route::get('/documents/{id}', [DocumentController::class, 'show'])->name('document.show');
Route::post('/documents/{id}/save', [DocumentController::class, 'save'])->name('document.save');
Route::delete('/documents/{id}/delete', [DocumentController::class, 'delete'])->name('document.delete');
Route::get('/documents/{id}/pdf', [DocumentController::class, 'show'])->name('documents.pdf');
Route::get('/documents/{id}/view', [DocumentController::class, 'viewPDF'])->name('documents.view');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados/store', [EmpleadoController::class, 'store']);
Route::get('/empleados/confirm', [EmpleadoController::class, 'confirm']);
Route::post('/empleados/documents/store', [EmpleadoController::class, 'storeDocuments']);
Route::get('/document/create/{empleadoId}', [DocumentController::class, 'create'])->name('document.create');
Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
// Route::post('/documents/{id}/save/{empleadoId}', [DocumentController::class, 'save'])->name('documents.save');



// Otras rutas...
Route::get('/', function () {
    return view('welcome');
});

