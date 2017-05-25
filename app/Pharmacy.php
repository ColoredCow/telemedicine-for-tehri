<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    
    protected $table = 'pharmacies';

    public static function getName($phone)
    {
    	$phone = self::where('phone', $phone)
    		->first(['name']);
    	return $phone['name'];
    }

}
