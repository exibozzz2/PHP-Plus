<?php

use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;


Route::view('/upload', 'upload');

Route::controller(UploadImageController::class)->prefix("image")->name("image.")->group(function(){
    Route::post('/upload', 'upload')->name('upload');
});
