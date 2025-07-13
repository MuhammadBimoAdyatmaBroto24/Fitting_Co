<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_country',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_phone',
        'shipping_email',
        'billing_first_name',
        'billing_last_name',
        'billing_country',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_phone',
        'billing_email',
        'total_amount',
        'status',
        'payment_method',
        'delivery_method',
        'shipping_cost',
        'order_notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
