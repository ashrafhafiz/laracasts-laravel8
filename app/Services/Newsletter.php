<?php

namespace App\Services;

use Illuminate\Http\Request;
use \MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe($email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server'),
        ]);

        return $mailchimp->lists->addListMember('7ccad029ea', [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
