<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'company_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
