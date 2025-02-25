<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    Use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'offer_id', 
        'product_name',
        'product_description', 
        'unit_price', 
        'quantity', 
        'total_amount'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
