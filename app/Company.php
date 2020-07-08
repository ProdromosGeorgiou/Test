<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected  $guarded = ['id'];

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
