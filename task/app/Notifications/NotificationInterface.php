<?php 
namespace App\Notifications;

interface NotificationInterface
{
    public function send(string $message): void;
}