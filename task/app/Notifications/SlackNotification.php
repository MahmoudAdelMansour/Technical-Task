<?php 
namespace App\Notifications;
use App\Notifications\NotificationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SlackNotification implements NotificationInterface, ShouldQueue
{
    use Queueable;
    public function send(string $message): void
    {
        echo "Slack sent: $message\n";
    }
}