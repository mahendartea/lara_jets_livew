<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing');
//    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:pengguna', 'prefix' => 'pengguna', 'as' => 'pengguna.'], function () {
        // Route::resource('lessons', \App\Http\Controllers\Students\LessonController::class);
    });
    Route::group(['middleware' => 'role:petugas', 'prefix' => 'petugas', 'as' => 'petugas.'], function () {
        // Route::resource('courses', \App\Http\Controllers\Teachers\CourseController::class);
        // Route::resource('researches', \App\Http\Controllers\Teachers\ResearchController::class);
        // Route::resource('dedications', \App\Http\Controllers\Teachers\DedicationController::class);
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        //    Route::resource('ptns', \App\Http\Controllers\Admin\DataptnController::class);
        //    Route::resource('lms', \App\Http\Controllers\Admin\LmsController::class);
        //    Route::resource('configure', \App\Http\Controllers\Admin\ConfigController::class);
        //    Route::get('/lecturer', [LecturerController::class, 'index']);
        // Route::name('users.')->group(function () {
        //     Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer');
        // });
    });
});
