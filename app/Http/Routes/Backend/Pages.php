<?php

/** Page Management */
$router->group([
    'namespace'  => 'Pages',
    'middleware' => 'access.routeNeedsPermission:view-page-management',
], function () use ($router) {
    /**
     * Page CRUDa
     */

    Route::resource('pages', 'PagesController');
    # Pages


      $router->group([ 'prefix' => 'pages' ], function () use ($router) {
        get('data', 'PagesController@data')->name('admin.pages.data');
        get('show/{page}/', 'PagesController@show')->name('pages.show');
        get('edit/{page}/', 'PagesController@edit')->name('admin.pages.edit');
        delete('delete/{page}/', 'PagesController@destroy')->name('admin.pages.destroy');
        get('create', 'PagesController@create')->name('admin.pages.create');
        post('store', 'PagesController@store')->name('admin.pages.store');
        patch('update/{page}/', 'PagesController@update')->name('admin.pages.update');
    });


    /**
     * PageCategory CRUD
     */

    Route::resource('page-categories', 'PageCategoryController');
    # PageCategories
    $router->group([ 'prefix' => 'page-categories' ], function () use ($router) {
        get('show/{page-category}/', 'PageCategoryController@show')->name('page-categories.show');
        get('edit/{page-category}/', 'PageCategoryController@edit')->name('admin.page-categories.edit');
        delete('delete/{page-category}/', 'PageCategoryController@destroy')->name('admin.page-categories.destroy');
        get('create', 'PageCategoryController@create')->name('admin.page-categories.create');
        post('store', 'PageCategoryController@store')->name('admin.page-categories.store');
        patch('update/{page}/', 'PageCategoryController@update')->name('admin.page-categories.update');
    });

});