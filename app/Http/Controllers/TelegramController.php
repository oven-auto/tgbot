<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function index()
    {
        $telegram = new Api(env('TELEGRAM_BOT_KEY'));

        $updates = $service->getWebhookUpdate();

        file_put_contents('messages.txt', json_encode($updates));

        dump('get');
    }



    public function set()
    {
        $telegram = new Api(env('TELEGRAM_BOT_KEY'));

        $res = $telegram->setWebhook([
            'url' => 'https://telegram.oven-auto.ru/'.env('TELEGRAM_BOT_KEY').'webhook',
        ]);

        dump('set');
    }
}
