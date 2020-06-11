<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'type'];

    public function variations(){
    	return $this->hasMany('App\Models\Variation');
    }

}
