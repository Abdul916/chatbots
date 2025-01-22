<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Artisan;
Route::get('/', function () {
    return redirect('admin/question');
});
Route::get('/home', function () {
    return redirect('admin/question');
});
require 'admin.php';