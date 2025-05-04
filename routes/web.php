<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    ContactController,
    ProfileController
};


Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'contacts.index' : 'register');
});

Route::middleware('auth')->prefix('profile') ->controller(ProfileController::class)->group( function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    });

Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', ContactController::class);

});

require __DIR__.'/auth.php';
