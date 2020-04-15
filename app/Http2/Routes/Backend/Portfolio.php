<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 6/3/18
 * Time: 9:22 PM
 */

/** Portfolio Management */
$router->group([
    'namespace'  => 'portfolio',
    'middleware' => 'access.routeNeedsPermission:view-csv-management',
], function () use ($router) {
    /**
     * Portfolio CRUD
     */
    Route::get('assign', 'PortfolioController@assign')->name('admin.portfolio.assign');
    # Portfolio
    $router->group([ 'prefix' => 'portfolio' ], function () use ($router) {
        Route::get('assign', 'PortfolioController@assign')->name('admin.portfolio.assign');

        delete('delete/{portfolio}/', 'PortfolioController@destroy')->name('admin.portfolio.destroy');

        get('show/{portfolio}/', 'PortfolioController@show')->name('portfolio.show');
        get('{portfolio}/edit', 'PortfolioController@edit')->name('admin.portfolio.edit');

        get('create', 'PortfolioController@create')->name('admin.portfolio.create');
        post('store', 'PortfolioController@store')->name('admin.portfolio.store');
        patch('update/{portfolio}/', 'PortfolioController@update')->name('admin.portfolio.update');

    });

    Route::resource('portfolio', 'PortfolioController');

});