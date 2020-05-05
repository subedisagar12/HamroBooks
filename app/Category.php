<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
class Category extends Model
{
    public function Books(){
        return $this->hasMany('App\Book');
    }
}
