<?php

/** Page Management */
$router->group([
    'namespace'  => 'Groups',
    'middleware' => 'access.routeNeedsPermission:view-groups-management',
], function () use ($router) {
    /**
     * Page CRUD
     */

    Route::resource('groups', 'WorkingGroupsController');
    # Pages
    $router->group([ 'prefix' => 'groups' ], function () use ($router) {
        get('data', 'WorkingGroupsController@data')->name('admin.workinggroups.data');
        get('show/{page}/', 'WorkingGroupsController@show')->name('admin.workinggroups.show');
        get('edit/{page}/', 'WorkingGroupsController@edit')->name('admin.workinggroups.edit');
        delete('delete/{page}/', 'WorkingGroupsController@destroy')->name('admin.workinggroups.destroy');
        get('create', 'WorkingGroupsController@create')->name('admin.workinggroups.create');
        post('store', 'WorkingGroupsController@store')->name('admin.workinggroups.store');
        patch('update/{page}/', 'WorkingGroupsController@update')->name('admin.workinggroups.update');
    });

});