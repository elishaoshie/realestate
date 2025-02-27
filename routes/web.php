<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Admin\Register;

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


route::get('/',[TemplateController::class,'index']);
route::get('about',[TemplateController::class, 'about'])->name('about');
route::get('property',[TemplateController::class, 'property'])->name('property');
route::get('property_single',[TemplateController::class, 'property_single'])->name('property_single');
route::get('contact',[TemplateController::class, 'contact'])->name('contact');

/*Admin route */

Route::prefix('admin')->name('admin.')->group(function() {
    // Admin Login route
    Route::get('login', Login::class)->name('login');

    // Admin Registration route
    Route::get('register', Register::class)->name('register');

    // Protected dashboard route
    Route::middleware('auth')->group(function() {
        Route::get('dashboard', function() {
            return view('admin.dashboard'); // This should point to your admin dashboard view
        })->name('dashboard');

        // Admin logout route
        Route::post('logout', function() {
            Auth::logout();
            return redirect()->route('admin.login'); // Redirect to the admin login page after logout
        })->name('logout');
    });
});