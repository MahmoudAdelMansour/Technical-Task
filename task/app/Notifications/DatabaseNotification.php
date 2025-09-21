<?php 
namespace App\Notifications;
use App\Notifications\NotificationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class DatabaseNotification implements NotificationInterface, ShouldQueue
{
    use Queueable;

    public function send(string $message):void
    {
        echo "Database stored: $message\n";
    }
}