<?php

namespace App\Services\;

use Services_Twilio;

/**
 * Parent Class for Twilio Service
 */
class Twilio
{

    public function __construct()
    {

    }

    /**
     * Gets the value of accountSID.
     *
     * @return mixed
     */
    public static function getAccountSID()
    {
        return env('TWILIO_ACCOUNT_SID');
    }

    /**
     * Gets the value of authToken.
     *
     * @return mixed
     */
    public static function getAuthToken()
    {
        return env('TWILIO_AUTH_TOKEN');
    }

    /**
     * Gets the value of from.
     *
     * @return mixed
     */
    public static function getFrom()
    {
        return env('TWILIO_FROM');
    }

    /**
     *
     * @return Services_Twilio object
     */
    public static function getServiceClient()
    {

        return new Services_Twilio(self::getAccountSID(), self::getAuthToken());

    }

}
