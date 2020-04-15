<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 6/3/18
 * Time: 9:22 PM
 */

/** Portfolio Management */
$router->group([
    'namespace'  => 'settings',
    'middleware' => 'access.routeNeedsPermission:view-settings-management',
], function () use ($router) {
    /**
     * Portfolio CRUD
     */
    # Portfolio
    $router->group([ 'prefix' => 'settings' ], function () use ($router) {
        get('', 'SettingsController@index')->name('admin.settings.index');
        get('statuscodes', 'StatusCodesController@index')->name('admin.settings.statuscodes');
        Route::resource('statuscodes', 'StatusCodesController');
    });

});