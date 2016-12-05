<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'archived',
    ];

    /**
     * Get the products for the brand.
     */
    public function products()
    {
        return $this->hasMany('Larashop\Models\Product','brand_id','id');
    }
}
