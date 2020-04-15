<?php
/** Search Routes */
$router->group([
    'namespace'  => 'search',
    'middleware' => 'access.routeNeedsPermission:view-csv-management',
], function () use ($router) {

    # Portfolio
    $router->group([ 'prefix' => 'search' ], function () use ($router) {
        Route::post('', 'SearchController@index')->name('frontend.search');

        Route::post('data', 'SearchController@data')->name('frontend.search.data');

        Route::get('chart', 'SearchController@chart')->name('frontend.search.chart');

    });


});