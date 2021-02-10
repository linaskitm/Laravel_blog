<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category', 'image'];


    public function categoryBy()
    {
        return $this->belongsTo('App\Category', 'category');
    }
}
