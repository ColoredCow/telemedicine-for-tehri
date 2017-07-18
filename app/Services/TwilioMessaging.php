<?php

namespace App\Services;

use Exception;
use Log;

/**
 * Messaging Service Class for Twilio
 */
class TwilioMessaging extends Twilio
{
    public function __construct()
    {

    }

    /**
     * Sends {$message} via SMS to {$phone}
     */
    public static function send($numbers, $message)
    {

        try {

            $client = parent::getServiceClient();

            $message = $client->messages->create($numbers['to'], [
                'from'  => $numbers['from'],
                'body' => $message
              ]);

            return $message->sid;

        } catch (Exception $e) {

            Log::error($e);

            return false;

        }

        return false;

    }

    /**
     * Dynamically renders the message by merging variables {$attr} with specified template {$view}
     */
    public function prepare($view, $attr)
    {

        return view($view)->with('content', $attr)->render();

    }

}
