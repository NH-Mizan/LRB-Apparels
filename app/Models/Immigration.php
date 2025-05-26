<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Immigration extends Model
{
    protected $guarded = [];

     public function category()
    {
        return $this->hasOne(ImmigrationCategory::class, 'id', 'category_id');
    }
}
