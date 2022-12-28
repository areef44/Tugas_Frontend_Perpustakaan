<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('')
    ->controller(HomeController::class)
    ->name('')->group(
        function () {

            Route::get('/', 'index')->name('home');

            Route::get('/addbooks', 'create')->name('add');

            Route::post('/store', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::post('/update/{id}', 'update')->name('update');

            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        }
    );

Route::prefix('author')
    ->controller(AuthorController::class)
    ->name('author.')->group(
        function () {

            Route::get('/', 'index')->name('index');

            Route::get('/addauthors', 'create')->name('add');

            Route::post('/store', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');

            Route::post('/update/{id}', 'update')->name('update');

            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        }
    );


Route::prefix('category')
    ->controller(CategoryController::class)
    ->name('category.')->group(
        function () {

            Route::get('/', 'index')->name('index');

            Route::get('/addcategories', 'create')->name('add');

            Route::post('/store', 'store')->name('store');

            Route::get('/edit/{id}', 'edit')->name('edit');

            Route::post('/update/{id}', 'update')->name('update');

            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        }

    );
