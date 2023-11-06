<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__ . '/auth.php';


Route::get('/', function () {
    $data['user'] = Auth::user();
    return view('user.home', $data);
})->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('services')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('admin.services');
        Route::get('/getallservices', [ServicesController::class, 'getallservices'])->name('services.getallservices');
        Route::post('/store', [ServicesController::class, 'store'])->name('services.store');
        Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
        Route::post('/update/{id}', [ServicesController::class, 'update'])->name('services.update');
        Route::get('/select/{id}', [ServicesController::class, 'select'])->name('services.select');
        Route::delete('/delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::get('/getallusers', [UserController::class, 'getallusers'])->name('users.getallusers');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/select/{id}', [UserController::class, 'select'])->name('users.select');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
        Route::post('/changepass', [ProfileController::class, 'changepass'])->name('profile.changepass');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/getuser', [ProfileController::class, 'getuser'])->name('profile.getuser');
        Route::get('/getmedhistory', [ProfileController::class, 'getmedhistory'])->name('profile.getmedhistory');
        Route::post('/savemedhistory', [ProfileController::class, 'savemedhistory'])->name('profile.savemedhistory');
    });

    Route::prefix('appointment')->group(function () {
        Route::get('/pending', [AppointmentController::class, 'pending'])->name('appointment.pending');
        Route::get('/approved', [AppointmentController::class, 'approved'])->name('appointment.approved');
        Route::get('/canceled', [AppointmentController::class, 'canceled'])->name('appointment.canceled');
        Route::get('/completed', [AppointmentController::class, 'completed'])->name('appointment.completed');



        Route::get('/getallpending', [AppointmentController::class, 'getallpending'])->name('appointment.getallpending');
        Route::get('/getallapproved', [AppointmentController::class, 'getallapproved'])->name('appointment.getallapproved');
        Route::get('/getallcanceled', [AppointmentController::class, 'getallcanceled'])->name('appointment.getallcanceled');
        Route::get('/getallcompleted', [AppointmentController::class, 'getallcompleted'])->name('appointment.getallcompleted');

        Route::post('/store', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::get('/select/{id}', [AppointmentController::class, 'select'])->name('appointment.select');
        Route::post('/approve/{id}', [AppointmentController::class, 'approve'])->name('appointment.approve');
        Route::post('/cancel/{id}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
        Route::post('/complete/{id}', [AppointmentController::class, 'complete'])->name('appointment.complete');
    });

});
