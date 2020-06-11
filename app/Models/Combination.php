<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Combination extends Model
{
	use SoftDeletes;

    protected $table = 'options_combinations';

    protected $fillable = ['variation_id', 'combinations'];

    public function combination_of(){
    	return $this->hasOne('App\Models\Variation', 'combination_id');
    }
}
