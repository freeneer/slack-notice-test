<?php
namespace App\Services;

use Illuminate\Notifications\Notifiable;
use App\Notifications\SlackNotification;

class SlackService
{
    use Notifiable;

    /**
     * 通知チャンネル情報
     *
     * @var array
     */
    protected $channel = null;

    /**
     * 通知チャンネルを指定
     * 
     * @param array|string $channnel
     * @return this
     */
    public function channel($channel)
    {
        if (!is_array($channel)) {
            $channel = config('slack.channels.' . $channel);
        }
        $this->channel = $channel;

        return $this;
    }

    /**
     * 通知処理
     *
     * @param string $message
     * @return void
     */
    public function send($message = null)
    {
        if (!isset($this->channel)) {
            $this->channel(config('slack.channels.' . config('slack.default')));
        }

        $this->notify(new SlackNotification($this->channel, $message));
    }

    /**
     * Slack通知用URLを指定する
     *
     * @return string
     */
    protected function routeNotificationForSlack()
    {
        return config('slack.url');
    }
}