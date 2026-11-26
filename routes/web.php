<?php

use App\Http\Controllers\AdminTestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardMemberController;
use App\Models\BoardMember;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccreditationController;


Route::get('/', [HomeController::class, 'index']);

// Admin Test Dashboard Routes
Route::get('/admin-test', [AdminTestController::class, 'index'])->name('admin.test');

Route::post('/admin-test/programs', [AdminTestController::class, 'storeProgram'])->name('admin.programs.store');
Route::delete('/admin-test/programs/{program}', [AdminTestController::class, 'destroyProgram'])->name('admin.programs.destroy');

Route::post('/admin-test/news', [AdminTestController::class, 'storeNews'])->name('admin.news.store');
Route::delete('/admin-test/news/{newsItem}', [AdminTestController::class, 'destroyNews'])->name('admin.news.destroy');


if (Schema::hasTable('board_members') && Schema::hasColumn('board_members', 'parent_id')) {
    $boardRoots = BoardMember::whereNull('parent_id')
        ->orderBy('sort_order')
        ->orderBy('id')
        ->with('children')
        ->get();
} else {
    $boardRoots = collect();
}

// CRUD routes for the org chart:
Route::post('/board-members', [BoardMemberController::class, 'store'])->name('board-members.store');
Route::put('/board-members/{boardMember}', [BoardMemberController::class, 'update'])->name('board-members.update');
Route::delete('/board-members/{boardMember}', [BoardMemberController::class, 'destroy'])->name('board-members.destroy');

// CRUD routes for the accreditation:
Route::post('/accreditations', [AccreditationController::class, 'store'])->name('accreditations.store');
Route::put('/accreditations/{accreditation}', [AccreditationController::class, 'update'])->name('accreditations.update');
Route::delete('/accreditations/{accreditation}', [AccreditationController::class, 'destroy'])->name('accreditations.destroy');
