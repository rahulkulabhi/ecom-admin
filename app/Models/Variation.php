<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use SoftDeletes;

    protected $fillable = ['combination_id', 'original_price', 'sku', 'quanntity', 'product_id'];

    protected $guarded = ['sale_price'];

    public function combination(){
    	return $this->belongsTo('App\Models\Combination', 'variation_id');
    }

    public function variation_of(){
    	return $this->belongsTo('App\Models\Product');
    }
}
