<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function index(Api $service)
    {
        $updates = $service->getWebhookUpdate();

        file_put_contents('messages', json_encode($updates));
    }



    public function set(Api $service)
    {
        $service->setWebhook([
            'url' => 'https://telegram.oven-auto.ru/'.env('TELEGRAM_BOT_KEY').'webhook',
        ]);
    }
}
