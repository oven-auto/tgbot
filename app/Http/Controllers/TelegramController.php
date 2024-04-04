<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Http;

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

        $url = 'http://62.182.31.140:8280/api/telegram/get';

        $response = Http::get($url, [
            'message' => $request->all(),
        ]);
    }
}