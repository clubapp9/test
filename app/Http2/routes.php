<?php
use Illuminate\Support\Facades\Auth;
/**
 * Switch between the included languages
 */

    $router->group(['namespace' => 'Language'], function () use ($router) {
        require(__DIR__ . '/Routes/Language/Lang.php');
    });

    /**
     * Frontend Routes
     */
    $router->group(['namespace' => 'Frontend'], function () use ($router) {

        Route::get('iframe', 'FrontendController@iframe')->name('iframe');


        Route::resource('calendar_event', 'CalendarEventsController');

        /**  Groups */

        $router->group( ['namespace' => 'Groups' ], function() use ($router) {
            Route::resource('requestjoingroup', 'RequestJoinGroupController');

            get( 'working_groups', 'WorkingGroupsController@index' )->name('working-groups.index');
            get( 'working_group/{id}', 'WorkingGroupsController@group' )->name('working-groups.group');
            get( 'working_group/{id}/recent', 'WorkingGroupsController@recent' )->name('working-groups.recent');
            get( 'working_group/{id}/forum', 'WorkingGroupsController@forum' )->name('working-groups.forum');
            get( 'working_group/{id}/documents', 'WorkingGroupsController@documents' )->name('working-groups.documents');
            get( 'working_group/{id}/members', 'WorkingGroupsController@memberList' )->name('working-groups.members');
        });


        /** Requests Table (i.e. User requests to be added to Speakers Bureau */
            Route::resource('requests', 'RequestsController');

        get('resources', 'ResourcesController@index')->name('resources');
        get('resources/calendar', 'ResourcesController@calendar')->name('resources.calendar');
        get('resources/speakers-bureau', 'ResourcesController@speakersBureau')->name('resources.speakers-bureau');
        get('resources/member-list', 'ResourcesController@memberList')->name('resources.member-list');
        get('resources/useful-websites', 'ResourcesController@usefulWebsites')->name('resources.useful-websites');

        require(__DIR__ . '/Routes/Frontend/Frontend.php');
        require(__DIR__ . '/Routes/Frontend/Search.php');
        require(__DIR__ . '/Routes/Frontend/CRUD.php');
        require(__DIR__ . '/Routes/Frontend/Accounts.php');
        require(__DIR__ . '/Routes/Frontend/Access.php');
    });

    /**
     * Backend Routes
     * Namespaces indicate folder structure
     */
    $router->group(['namespace' => 'Backend'], function () use ($router) {
        $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {

            Route::post('assign_accounts', 'AJAXController@assign_accounts');
            Route::get('assign_accounts', 'AJAXController@assign_accounts');
            /**
             * These routes need view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
             *
             * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
             */
            $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router) {
                require(__DIR__ . '/Routes/Backend/Dashboard.php');
                require(__DIR__ . '/Routes/Backend/Access.php');
                require(__DIR__ . '/Routes/Backend/Menus.php');
                require(__DIR__ . '/Routes/Backend/Pages.php');
                require(__DIR__ . '/Routes/Backend/Settings.php');
                require(__DIR__ . '/Routes/Backend/CSVImport.php');
                require(__DIR__ . '/Routes/Backend/Portfolio.php');
                require(__DIR__ . '/Routes/Backend/Groups.php');
                require(__DIR__ . '/Routes/Backend/LogViewer.php');
            });
        });
    });
    //Route::resource('page_categories', 'page_categoriesController');

/*
Route::resource('workinggroups', 'WorkingGroupsController');
Route::resource('calendarevents', 'CalendarEventsController');*/