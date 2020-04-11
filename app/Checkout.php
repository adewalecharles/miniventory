<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //

    protected $fillable = ['customer_name', 'customer_phone', 'customer_address', 'company_id',  'reference', 'total_amount'];


    public function purchases () {
        return $this->hasMany(Purchase::class);
    }

    public function company (){
        return $this->belongsTo(Company::class);
    }

}
