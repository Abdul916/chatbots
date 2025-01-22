<?php
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\QuestionsController;

Route::group(['prefix'  =>  'admin'], function () {

	Route::get('login', [AdminLoginController::class, 'index'])->name('login');
	Route::post('verify_login', [AdminLoginController::class, 'verify_login'])->name('verify_login');
	Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
	Route::get('forgot_password', [AdminLoginController::class, 'forgotPage'])->name('forgot_password');
	Route::post('reset_password', [AdminLoginController::class, 'reset_password'])->name('admin.reset_password');

	Route::group(['middleware' => ['auth:admin']], function () {
		// Route::get('/', [QuestionsController::class, 'index'])->name('admin.question');
		// Route::get('/admin', [QuestionsController::class, 'index'])->name('admin.question');
		// Route::get('/dashboard', [QuestionsController::class, 'index'])->name('admin.question');

		Route::get('change_password', [AdminController::class, 'change_password'])->name('change_password');
		Route::post('update_password', [AdminController::class, 'update_password'])->name('update_password');

		Route::group(['prefix' => 'questions'], function () {
			Route::get('/', [QuestionsController::class, 'index'])->name('admin.questions');
			Route::get('create', [QuestionsController::class, 'create'])->name('admin.questions.create');
			Route::post('store', [QuestionsController::class, 'store'])->name('admin.questions.store');
			Route::get('edit/{id}', [QuestionsController::class, 'edit'])->name('admin.questions.edit');
			Route::post('update', [QuestionsController::class, 'update'])->name('admin.questions.update');
			Route::post('delete', [QuestionsController::class, 'destroy'])->name('admin.questions.destroy');
		});

	});
});
