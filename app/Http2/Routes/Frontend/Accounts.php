<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 6/3/18
 * Time: 9:22 PM
 */

/** Portfolio Management */
$router->group([
    'namespace'  => 'accounts',
    'middleware' => 'access.routeNeedsPermission:view-accounts-management',
], function () use ($router) {
    /**
     * Accounts
     */
    # Portfolio
    $router->group([ 'prefix' => 'account' ], function () use ($router) {
        //Route::get('', 'AccountsController@index')->name('frontend.accounts');
        //Route::get('/{account}', 'AccountsController@index')->name('frontend.account');

        //get('my_accounts', 'AccountsController@myaccounts')->name('frontend.account.my_accounts');
    });


});