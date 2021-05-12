<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\WorkerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::get('/phpinfo', function () {
//     return phpinfo();
// });


/* Auto-generated admin routes */

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tags')->name('tags/')->group(static function () {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('users')->name('users/')->group(static function () {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('vacancies')->name('vacancies/')->group(static function () {
            Route::get('/',                                             'VacanciesController@index')->name('index');
            Route::get('/create',                                       'VacanciesController@create')->name('create');
            Route::post('/',                                            'VacanciesController@store')->name('store');
            Route::get('/{vacancy}/edit',                               'VacanciesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VacanciesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{vacancy}',                                   'VacanciesController@update')->name('update');
            Route::delete('/{vacancy}',                                 'VacanciesController@destroy')->name('destroy');
        });
    });
});



Route::post('/vacancies/comments', [VacancyController::class, 'addComment']);
Route::get('/vacancies/search', [VacancyController::class, 'search'])->name('vacancies-search');
Route::get('/workers/search', [WorkerController::class, 'search'])->name('workers-search');

Route::middleware(["auth", "verified"])->group(function () {
    Route::middleware(["can:create_vacancy"])->group(function () {
        Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('new-vacancy');
        Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name("vacancies-edit");
        Route::post('/vacancies/{vacancy}', [VacancyController::class, 'update'])->name("vacancies-update");
        Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies-store');
    });
    Route::middleware(["can:update,user"])->group(function () {
        Route::get('/workers/{user}/edit', [WorkerController::class, 'edit'])->name('workers-edit');
        Route::post('/workers/{user}', [WorkerController::class, 'update'])->name('workers-update');
    });
    Route::get('/tags/suggested', [TagController::class, "indexSuggested"]);
});

Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name("vacancies-show");
Route::get('/vacancies', [VacancyController::class, 'index'])->name("vacancies");
Route::get('/', [HomeController::class, 'home'])->name("home");

Route::get('/workers', [WorkerController::class, 'index'])->name("workers");
Route::get('/workers/{user}', [WorkerController::class, 'show'])->name('profile');


Route::get('paginate', [PaginationController::class, "index"]);
