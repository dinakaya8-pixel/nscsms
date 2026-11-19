<?php

use App\Http\Controllers\AdminTestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Admin Test Dashboard Routes
Route::get('/admin-test', [AdminTestController::class, 'index'])->name('admin.test');

Route::post('/admin-test/programs', [AdminTestController::class, 'storeProgram'])->name('admin.programs.store');
Route::delete('/admin-test/programs/{program}', [AdminTestController::class, 'destroyProgram'])->name('admin.programs.destroy');

Route::post('/admin-test/news', [AdminTestController::class, 'storeNews'])->name('admin.news.store');
Route::delete('/admin-test/news/{newsItem}', [AdminTestController::class, 'destroyNews'])->name('admin.news.destroy');
