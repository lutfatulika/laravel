<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/categories/{id}/download-pdf', function ($id) {
    $categories = Category::findOrFail($id);
    $pdf = Pdf::loadView('categories.pdf', compact('categories'));
    return $pdf->download('categories-' . $categories->id . '.pdf');
})->name('categories.download-pdf');

