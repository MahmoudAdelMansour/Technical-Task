<?php 
namespace App\Notifications\Senders;

use App\Notifications\NotificationInterface;
use App\Notifications\SmsNotification;

class SmsNotificationSender extends NotificationSender
{
    public function createNotification(): NotificationInterface
    {
        return new SmsNotification();
    }
}