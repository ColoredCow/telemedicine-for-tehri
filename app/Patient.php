<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'phone', 'father_name', 'sex',  'lat', 'long', 'area', 'address', 'age'];
}
