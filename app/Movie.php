<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=["title","rating","release_date","awards"];

    public function getTitleAndRating (){
      return $this->title." - ".$this->rating;
    }

    public function genre()
    {
      return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
