<?php 
namespace App\Notifications\Senders;

use App\Notifications\NotificationInterface;

abstract class NotificationSender
{
    abstract public function createNotification(): NotificationInterface;

    public function notify(string $message): void
    {
        $notification = $this->createNotification();
        $notification->send($message);
    }
}