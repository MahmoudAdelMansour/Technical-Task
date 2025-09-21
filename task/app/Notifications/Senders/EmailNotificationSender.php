<?php 
namespace App\Notifications\Senders;

use App\Notifications\EmailNotification;
use App\Notifications\NotificationInterface;

class EmailNotificationSender extends NotificationSender
{
    public function createNotification(): NotificationInterface
    {
        return new EmailNotification();
    }
}