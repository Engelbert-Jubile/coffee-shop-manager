<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return redirect('/items'); // Redirect ke halaman utama item
});

Route::resource('items', ItemController::class);
Route::get('items-trash','ItemController@trash')->name('items.trash');
Route::post('items/{id}/restore','ItemController@restore')->name('items.restore');
Route::delete('items/{id}/force','ItemController@forceDelete')->name('items.forceDelete');
