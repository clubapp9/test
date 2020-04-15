<?php

$router->group([
    'prefix'     => 'menus',
    'namespace'  => 'Menus',
    'middleware' => 'access.routeNeedsPermission:view-page-management',
], function () use ($router) {
    /**
     * Menu Management
     */
    /** Msurguy JQuery Menu routes */

        // Route::resource('seo', 'SeoController');

        // Routes for the menu admin
            // Showing the admin for the menu builder and updating the order of menu items
            Route::get('/', 'MenuController@getIndex')->name('admin.menu');
            Route::post('/', 'MenuController@postIndex');

            Route::post('new', 'MenuController@postNew');
            Route::post('delete', 'MenuController@postDelete');

            Route::get('edit/{id}', 'MenuController@getEdit');
            Route::post('edit/{id}', 'MenuController@postEdit');
});
