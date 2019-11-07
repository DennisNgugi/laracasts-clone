<?php

namespace Dennis;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    //
    protected $guarded = [];
    protected $with = ['lessons']; // this helps eager loading of relationships

    public function lessons(){
      return $this->hasMany(Lesson::class);
    }
    public function getRouteKeyName(){
      return 'slug';
    }
}
