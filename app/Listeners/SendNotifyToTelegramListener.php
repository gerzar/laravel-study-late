<?php

namespace App\Listeners;

use App\Models\Feedback;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Config;

class SendNotifyToTelegramListener
{
    private string $bot_token;
    private int $chat_id;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bot_token = Config::get('constants.options.telegram_bot_token');;
        $this->chat_id = User::with('telegramUserInfo')
            ->where('is_admin', '=', 1)
            ->get()[0]->telegramUserInfo->chat_id;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(object $event): void
    {
        if (isset($event->feedback) && $event->feedback instanceof Feedback) {

            $client = new Client();

            $client->post('https://api.telegram.org/bot' . $this->bot_token . '/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => $this->chat_id,
                    'text' => $this->messageText($event->feedback),
                    'parse_mode' => 'HTML'
                ],
            ]);

        }
    }

    /**
     * @param object $feedback
     * @return string
     */
    private function messageText(object $feedback): string
    {
        return "<b>Subject: </b> {$feedback->title}\n".
            "<b>Message: </b> {$feedback->message}\n".
            "<b>From: </b> {$feedback->username}\n".
            "<b>E-mail: </b> {$feedback->email}\n";
    }
}
