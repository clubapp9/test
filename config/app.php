<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Application Name
	|--------------------------------------------------------------------------
	|
	| The application name for use within the UI of the application
	*/
	'name' => '',

    'db_fields' => ['first_name', 'last_name', 'dob', 'ssn', 'co_borrower_first_name',
        'co_borrower_last_name', 'co_borrower_ssn', 'address', 'city', 'state', 'zip_code', 'original_creditor',
        'original_account_numbers', 'portfolio_name', 'reference_name', 'account_open_date', 'first_delinquent_date',
        'charge_off_date', 'last_payment_date', 'last_payment_amount', 'original_balance', 'interest_percentage',
        'total_interest', 'current_balance_with_interest', 'place_of_employment', 'home_phone', 'work_phone',
        'reference_phone', 'last_contact_date', 'status'],

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => env('APP_DEBUG', true),

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => env('APP_URL'),

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'UTC',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => env('APP_LOCALE', 'en'),

	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	|
	| The fallback locale determines the locale to use when the current one
	| is not available. You may change the value to correspond to any of
	| the language folders that are provided through your application.
	|
	*/

	'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => env('APP_KEY', 'ZCeRwu0ug083vYkvSpu4XIvOhlw6wvpo'),

	'cipher' => MCRYPT_RIJNDAEL_128,

	/*
	|--------------------------------------------------------------------------
	| Logging Configuration
	|--------------------------------------------------------------------------
	|
	| Here you may configure the log settings for your application. Out of
	| the box, Laravel uses the Monolog PHP logging library. This gives
	| you a variety of powerful log handlers / formatters to utilize.
	|
	| Available Settings: "single", "daily", "syslog", "errorlog"
	|
	*/

	'log' => env('APP_LOG', 'daily'),

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => [

		/*
		 * Laravel Framework Service Providers...
		 */
		Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
		Illuminate\Auth\AuthServiceProvider::class,
		Illuminate\Bus\BusServiceProvider::class,
		Illuminate\Cache\CacheServiceProvider::class,
		Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
		Illuminate\Routing\ControllerServiceProvider::class,
		Illuminate\Cookie\CookieServiceProvider::class,
		Illuminate\Database\DatabaseServiceProvider::class,
		Illuminate\Encryption\EncryptionServiceProvider::class,
		Illuminate\Filesystem\FilesystemServiceProvider::class,
		Illuminate\Foundation\Providers\FoundationServiceProvider::class,
		Illuminate\Hashing\HashServiceProvider::class,
		Illuminate\Mail\MailServiceProvider::class,
		Illuminate\Pagination\PaginationServiceProvider::class,
		Illuminate\Pipeline\PipelineServiceProvider::class,
		Illuminate\Queue\QueueServiceProvider::class,
		Illuminate\Redis\RedisServiceProvider::class,
		Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
		Illuminate\Session\SessionServiceProvider::class,
		Illuminate\Translation\TranslationServiceProvider::class,
		Illuminate\Validation\ValidationServiceProvider::class,
		Illuminate\View\ViewServiceProvider::class,
        Appzcoder\CrudGenerator\CrudGeneratorServiceProvider::class,
		Collective\Html\HtmlServiceProvider::class,
        yajra\Datatables\DatatablesServiceProvider::class,
		/*
		 * Application Service Providers...
		 */
		App\Providers\AccessServiceProvider::class,
		App\Providers\AppServiceProvider::class,
		App\Providers\BillingServiceProvider::class,
		App\Providers\BusServiceProvider::class,
		App\Providers\ConfigServiceProvider::class,
		App\Providers\EventServiceProvider::class,
		App\Providers\RouteServiceProvider::class,
		App\Providers\MacroServiceProvider::class,

		/*
		 * Third party service providers
		 */
		Arcanedev\LogViewer\LogViewerServiceProvider::class,
		Barryvdh\Debugbar\ServiceProvider::class,
		Creativeorange\Gravatar\GravatarServiceProvider::class,
		DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
		HieuLe\Active\ActiveServiceProvider::class,
		Laracasts\Utilities\JavaScript\JavaScriptServiceProvider::class,
		Laravel\Socialite\SocialiteServiceProvider::class,
		Potsky\LaravelLocalizationHelpers\LaravelLocalizationHelpersServiceProviderLaravel5::class,
        Lavary\Menu\ServiceProvider::class,
        MaddHatter\LaravelFullcalendar\ServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        Kyslik\ColumnSortable\ColumnSortableServiceProvider::class,

	],

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => [
		'App'       => Illuminate\Support\Facades\App::class,
		'Artisan'   => Illuminate\Support\Facades\Artisan::class,
		'Auth'      => Illuminate\Support\Facades\Auth::class,
		'Blade'     => Illuminate\Support\Facades\Blade::class,
		'Bus'       => Illuminate\Support\Facades\Bus::class,
		'Cache'     => Illuminate\Support\Facades\Cache::class,
		'Config'    => Illuminate\Support\Facades\Config::class,
		'Cookie'    => Illuminate\Support\Facades\Cookie::class,
		'Crypt'     => Illuminate\Support\Facades\Crypt::class,
		'DB'        => Illuminate\Support\Facades\DB::class,
		'Eloquent'  => Illuminate\Database\Eloquent\Model::class,
		'Event'     => Illuminate\Support\Facades\Event::class,
		'File'      => Illuminate\Support\Facades\File::class,
		'Gate' 		=> Illuminate\Support\Facades\Gate::class,
		'Hash'      => Illuminate\Support\Facades\Hash::class,
		'Input'     => Illuminate\Support\Facades\Input::class,
		'Lang'      => Illuminate\Support\Facades\Lang::class,
		'Log'       => Illuminate\Support\Facades\Log::class,
		'Mail'      => Illuminate\Support\Facades\Mail::class,
		'Password'  => Illuminate\Support\Facades\Password::class,
		'Queue'     => Illuminate\Support\Facades\Queue::class,
		'Redirect'  => Illuminate\Support\Facades\Redirect::class,
		'Redis'     => Illuminate\Support\Facades\Redis::class,
		'Request'   => Illuminate\Support\Facades\Request::class,
		'Response'  => Illuminate\Support\Facades\Response::class,
		'Route'     => Illuminate\Support\Facades\Route::class,
		'Schema'    => Illuminate\Support\Facades\Schema::class,
		'Session'   => Illuminate\Support\Facades\Session::class,
		'Storage'   => Illuminate\Support\Facades\Storage::class,
		'URL'       => Illuminate\Support\Facades\URL::class,
		'Validator' => Illuminate\Support\Facades\Validator::class,
		'View'      => Illuminate\Support\Facades\View::class,
        'Datatables' => yajra\Datatables\Datatables::class,
		/*
		 * Third party aliases
		 */
		'Active'      => HieuLe\Active\Facades\Active::class,
		'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,
		'Debugbar'    => Barryvdh\Debugbar\Facade::class,
		'Form'		  => Collective\Html\FormFacade::class,
		'Gravatar'    => Creativeorange\Gravatar\Facades\Gravatar::class,
		'HTML'		  => Collective\Html\HtmlFacade::class,
		'Socialize'   => Laravel\Socialite\Facades\Socialite::class,
        'Menu'       => Lavary\Menu\Facade::class,
        'Calendar' => MaddHatter\LaravelFullcalendar\Facades\Calendar::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
	],
];