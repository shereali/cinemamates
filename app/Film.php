<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
   
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

   public function comments()
   {
       return $this->hasMany('App\Comment');
   }

}
