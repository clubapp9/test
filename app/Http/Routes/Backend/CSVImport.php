<?php

/** CSV Import Management */
$router->group([
    'namespace'  => 'csvimport',
    'middleware' => 'access.routeNeedsPermission:view-csv-management',
], function () use ($router) {
    /**
CSVImport CRUD     */
    # CSVIMPORT
    //Route::resource('csvimport', 'CSVImportController');

    $router->group([ 'prefix' => 'csvimport' ], function () use ($router) {
        get('', 'CSVImportController@index')->name('admin.csvimport');
        delete('delete/{csvimport}/', 'CSVImportController@destroy')->name('admin.csvimport.destroy');

        post( 'import_parse', 'CSVImportController@parseImport')->name('admin.csvimport.import_parse');



        post('import_process', 'CSVImportController@processImport')->name('admin.csvimport.import_process');


        get('view_data_table', 'CSVImportController@viewdatatable')->name('admin.csvimport.view_data_table');

        get('imported', 'CSVImportController@imported')->name('admin.csvimport.imported');
        post('imported', 'CSVImportController@imported')->name('admin.csvimport.imported');
        get('{csvimport}/edit', 'CSVImportController@edit')->name('admin.csvimport.edit');
        post('createSheet', 'CSVImportController@createSheet')->name('admin.csvimport.createSheet');

        get('create', 'CSVImportController@create')->name('admin.csvimport.create');
        post('store', 'CSVImportController@store')->name('admin.csvimport.store');
        patch('update/{csvimport}/', 'CSVImportController@update')->name('admin.portfolio.update');
    });

});