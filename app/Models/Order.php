<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'transaction_date',
        'customer_id',
        'total_amount',
        'status',
        'archived',
    ];
}
