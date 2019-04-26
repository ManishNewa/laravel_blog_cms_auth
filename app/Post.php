<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [

        'title', 'content', 'category_id', 'featured', 'slug'

    ];
    
    protected $dates = ['deleted_at'];

    public function category(){

        return $this->belongsTo('App\Category');

    }

}
