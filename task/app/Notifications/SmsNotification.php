<?php 
namespace App\Notifications;
use App\Notifications\NotificationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SmsNotification implements NotificationInterface, ShouldQueue
{
    use Queueable;
   public function send(string $message): void
    {
        echo "SMS sent: $message\n";
    }
}