<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    Use HasFactory;

    protected $fillable = [
        'offer_code', 
        'customer_name', 
        'customer_address', 
        'customer_phone', 
        'customer_email',
        'valid_until', 
        'tax_id', 
        'trade_registry_number'
    ];

    protected $casts = [
        'valid_until' => 'date'
    ];

    public function products()
    {
        return $this->hasMany(OfferProduct::class);
    }
}
