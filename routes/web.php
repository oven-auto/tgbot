<?php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('', [TelegramController::class, 'index']);

Route::get('set', [TelegramController::class, 'set']);

Route::match(['get','post'], 'get', [TelegramController::class, 'get']);

Route::get('info', [TelegramController::class, 'info']);
