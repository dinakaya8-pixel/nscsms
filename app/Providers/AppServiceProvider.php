<?php

namespace App\Providers;

use App\Models\BoardMember;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Schema::hasTable('board_members') && Schema::hasColumn('board_members', 'parent_id')) {
                $boardRoots = BoardMember::whereNull('parent_id')
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->with('children')
                    ->get();

                $allBoardMembers = BoardMember::orderBy('sort_order')
                    ->orderBy('name')
                    ->get();
            } else {
                $boardRoots = collect();
                $allBoardMembers = collect();
            }

            $view->with('boardRoots', $boardRoots)
                  ->with('allBoardMembers', $allBoardMembers);
        });
    }
}