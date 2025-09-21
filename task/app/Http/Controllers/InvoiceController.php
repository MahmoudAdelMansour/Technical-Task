<?php 
namespace App\Http\Controllers;

use App\Notifications\Senders\EmailNotificationSender;
use App\Notifications\Senders\SmsNotificationSender;

class InvoiceController extends Controller {

    public function CreateInvoice()
    {
        $factory = new EmailNotificationSender();
        $factory->notify('invoice_created');

        $factory = new SmsNotificationSender();
        $factory->notify('low_stock_alert');

        return response()->json(['message' => 'Invoice processed and notifications sent.']);
    }

}