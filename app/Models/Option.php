<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
	use SoftDeletes;
	
    protected $table = 'attribute_options';

    protected $fillable = ['title', 'slug', 'attribute_id'];

    public function options_of(){
    	return $this->belongsTo('App\Models\Attribute');
    }
}
