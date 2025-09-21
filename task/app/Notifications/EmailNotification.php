<?php 
namespace App\Notifications;
use App\Notifications\NotificationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotification implements NotificationInterface, ShouldQueue
{
    use Queueable;
    public function send(string $message): void
    {
        echo "Email sent: $message\n";
    }
}