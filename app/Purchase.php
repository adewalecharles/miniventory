<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //

    protected $fillable = [
        'checkout_id', 'product_id', 'initial_quantity', 'final_quantity', 'amount_at_sale'
    ];

    public function checkout () {
        return $this->belongsTo(Checkout::class);
    }

    public function product ()
    {
        return $this->belongsTo(Product::class);
    }
}
