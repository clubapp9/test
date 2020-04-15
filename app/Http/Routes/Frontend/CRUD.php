<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 6/21/18
 * Time: 12:40 AM
 */

/** Search Routes */
$router->group([
    'namespace'  => 'crud',
    'middleware' => 'access.routeNeedsPermission:view-crud-management',
], function () use ($router) {

    # CRUD functionality for many tables in the database ( Notes, Phones, Addresses, Employers, etc)
    $router->group([ 'prefix' => 'crud' ], function () use ($router) {
        post('add_note', 'NotesController@addNote')->name('frontend.note.addNote');
        //get('add_note', 'NotesController@addNote')->name('frontend.note.addNote');
        post('add_phone', 'NotesController@addPhone')->name('frontend.phone.addPhone');
        post('add_address', 'NotesController@addAddress')->name('frontend.address.addAddress');
        post('add_employer', 'NotesController@addEmployer')->name('frontend.employer.addEmployer');

    });


});