<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
	use SoftDeletes;

    protected $fillable = ['title', 'slug'];

    public function options(){
    	return $this->hasMany('App\Models\Option');
    }
}