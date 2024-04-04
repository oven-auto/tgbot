<?php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('', [TelegramController::class, 'index'])
	->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('set', [TelegramController::class, 'set'])
	->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::match(['get','post'], 'get', [TelegramController::class, 'get'])
	->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
