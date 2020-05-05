<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
class Book extends Model
{
    protected $fillable=['name','cover_img','publication','edition','price','author','isSold'];

    public function user(){
        return $this->belongsTo('App/User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
