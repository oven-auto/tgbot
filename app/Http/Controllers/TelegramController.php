<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    private $telegramUrl;
    private $token;

    public function __construct()
    {
        $this->telegramUrl = 'https://api.telegram.org/bot';
        $this->token = env('TELEGRAM_BOT_KEY');
    }

    public function index()
    {
        dd('TG');
    }



    public function set()
    {
        $webUrl = 'https://telegram.oven-auto.ru/get';

        $url = $this->telegramUrl.$this->token.'/setwebhook?url='.$webUrl;

        $response = Http::get($url);

        dump($response->body());
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



    public function info()
    {
        $url = $this->telegramUrl.$this->token.'/getWebhookInfo';

        $response = Http::get($url);

        dump($response->body());
    }
}