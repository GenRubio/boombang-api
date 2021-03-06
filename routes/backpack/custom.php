<?php

use Illuminate\Support\Facades\Route;
// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
     /*
    * AJAX
    */
    /* Toggle Active */
    Route::post('toggleField', function (Illuminate\Http\Request $request) {
        return toggleField($request);
    })->name('toggleField');
    /********************************************************************** */

    Route::crud('user', 'UserCrudController');
    Route::crud('parametric-table', 'ParametricTableCrudController');
    Route::crud('parametric-table-value', 'ParametricTableValueCrudController');
    Route::crud('data-user', 'DataUserCrudController');
    Route::crud('scenery', 'SceneryCrudController');
    Route::crud('public-scenery', 'PublicSceneryCrudController');
    Route::crud('game-scenery', 'GameSceneryCrudController');
    Route::crud('island-scenery', 'IslandSceneryCrudController');
    Route::crud('home-scenery', 'HomeSceneryCrudController');
    Route::crud('mini-game-scenery', 'MiniGameSceneryCrudController');
    Route::crud('game-object', 'GameObjectCrudController');
}); // this should be the absolute last line of this file