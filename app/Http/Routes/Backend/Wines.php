<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 1/28/20
 * Time: 9:22 PM
 */

/** Portfolio Management */
$router->group([
    'namespace'  => 'wine',
    'middleware' => 'access.routeNeedsPermission:view-csv-management',
], function () use ($router) {
    /**
     * Wine CRUD
     */

    # Wine
    $router->group([ 'prefix' => 'wine' ], function () use ($router) {
        get('', 'WineController@index')->name('admin.wine.index');
        delete('delete/{wine}/', 'WineController@destroy')->name('admin.wine.destroy');

        get('show/{wine}/', 'WineController@show')->name('admin.wine.show');
        get('{wine}/edit', 'WineController@edit')->name('admin.wine.edit');

        get('create', 'WineController@create')->name('admin.wine.create');
        post('store', 'WineController@store')->name('admin.wine.store');
        patch('update/{portfolio}/', 'WineController@update')->name('admin.wine.update');


        $router->group([ 'prefix' => 'inventory' ], function () use ($router) {
            get('', 'InventoryController@index')->name('admin.wine.inventory.index');
            delete('delete/{wine}/', 'InventoryController@destroy')->name('admin.wine.inventory.destroy');

            get('show/{wine}/', 'InventoryController@show')->name('admin.wine.inventory.show');
            get('{wine}/edit', 'InventoryController@edit')->name('admin.wine.inventory.edit');

            get('create', 'InventoryController@create')->name('admin.wine.inventory.create');
            post('store', 'InventoryController@store')->name('admin.wine.inventory.store');

            get('transfer', 'InventoryController@transfer')->name('admin.wine.inventory.transfer');
            post('transfer_inventory', 'InventoryController@transfer_inventory')->name('admin.wine.inventory.transfer_inventory');

            get('remove', 'InventoryController@remove')->name('admin.wine.inventory.remove');
            post('remove_inventory', 'InventoryController@remove_inventory')->name('admin.wine.inventory.remove_inventory');

            patch('update/{portfolio}/', 'InventoryController@update')->name('admin.wine.inventory.update');

            Route::resource('inventory', 'InventoryController');

        });


        $router->group([ 'prefix' => 'inventory_locations' ], function () use ($router) {
            get('', 'Inventory_LocationsController@index')->name('admin.wine.inventory_locations.index');
            delete('delete/{wine}/', 'Inventory_LocationsController@destroy')->name('admin.wine.inventory_locations.destroy');

            get('show/{wine}/', 'Inventory_LocationsController@show')->name('admin.wine.inventory_locations.show');
            get('{wine}/edit', 'Inventory_LocationsController@edit')->name('admin.wine.inventory_locations.edit');

            get('create', 'Inventory_LocationsController@create')->name('admin.wine.inventory_locations.create');
            post('store', 'Inventory_LocationsController@store')->name('admin.wine.inventory_locations.store');
            patch('update/{portfolio}/', 'Inventory_LocationsController@update')->name('admin.wine.inventory_locations.update');

        });


    });

    Route::resource('wine', 'WineController');
});