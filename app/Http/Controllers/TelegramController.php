<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function index()
    {
        dd('TG');
    }



    public function set()
    {
        $telegram = new Api(env('TELEGRAM_BOT_KEY'));

        $res = $telegram->setWebhook([
            'url' => 'https://telegram.oven-auto.ru/get/'.env('TELEGRAM_BOT_KEY').'webhook',
        ]);

        dump('set');
    }



    public function get(Request $request)
    {
        $telegram = new Api(env('TELEGRAM_BOT_KEY'));

        $updates = $telegram->getWebhookUpdate();

        file_put_contents('messages.txt', json_encode($request->all()));

        dump('get');
    }
}