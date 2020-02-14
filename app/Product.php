<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'picture',
        'name',
        'qty',
        'purchased_date',
        'expiry_date',
        'amount',
        'category_id',
        'brand_id',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
