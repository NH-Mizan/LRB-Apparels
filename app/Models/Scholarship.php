<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $guarded = [];

     public function category()
    {
        return $this->hasOne(ScholarshipCategory::class, 'id', 'category_id');
    }
}
