<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
     public function country()
    {
        return $this->hasOne(Country::class, 'id', 'interested_country');
    }
}
