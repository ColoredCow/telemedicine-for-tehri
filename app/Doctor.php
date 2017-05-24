<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public static function getName($phone)
    {
    	$phone = self::where('phone', $phone)
    		->first(['name']);
    	return $phone['name'];
    }

    public static function setAppToken($phone)
    {
    	return self::where('phone', $phone)
          ->update(['app_token' => $token]);
    }
}
