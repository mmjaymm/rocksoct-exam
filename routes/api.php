<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskCommentsController;

Route::prefix('task-comments')->group(function () {
    Route::get('/insert', [TaskCommentsController::class, 'index'])->name('task-comments.index');
});
