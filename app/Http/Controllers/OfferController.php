<?php

namespace App\Http\Controllers;

use App\Helpers\PriceHelper;
use App\Models\Offer;
use App\Models\OfferProduct;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $query = Offer::with('products')->orderByDesc('id');
    
        if ($request->filled('offer_code')) {
            $query->where('offer_code', 'like', '%' . $request->offer_code . '%');
        }
    
        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }
    
        if ($request->filled('min_bid_value')) {
            $query->where('bid_value', '>=', $request->min_bid_value);
        }
    
        if ($request->filled('max_bid_value')) {
            $query->where('bid_value', '<=', $request->max_bid_value);
        }

        if ($request->filled('valid_until')) {
            $query->whereDate('valid_until', '=', $request->valid_until);
        }
    
        $offers = $query->paginate(10);
    
        return view('offers.index', compact('offers'));
    }    

    public function show($id)
    {
        $offer = Offer::with('products')->findOrFail($id);
        return view('offers.show', compact('offer'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'offer_code' => 'required|string|max:255',
            'customer_name' => 'required|string|max:100',
            'customer_address' => 'required|string|max:250',
            'customer_phone' => 'required|string|max:11',
            'customer_email' => 'required|email',
            'valid_until' => 'required|date|after_or_equal:' . now()->toDateString(),
            'tax_id' => 'required|string|max:11',
            'trade_registry_number' => 'required|string|max:16',
            'products' => 'array|min:1',
            'products.*.product_name' => 'required|string|max:100',
            'products.*.product_description' => 'required|string',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
        ]);
    
        $offer = Offer::create([
            'offer_code' => $request->offer_code,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'tax_id' => $request->tax_id,
            'trade_registry_number' => $request->trade_registry_number,
            'valid_until' => $request->valid_until,
        ]);
    
        $totalAmount = 0;
        $offerProducts = [];
    
        foreach ($request->product_name as $index => $productName) {
            $productTotalAmount = $request->product_quantity[$index] * $request->product_price[$index];
    
            $offerProducts[] = [
                'offer_id' => $offer->id,
                'product_name' => $productName,
                'product_description' => $request->product_description[$index],
                'quantity' => $request->product_quantity[$index],
                'unit_price' => $request->product_price[$index],
                'total_amount' => $productTotalAmount
            ];
    
            $totalAmount += $productTotalAmount;
        }
    
        OfferProduct::insert($offerProducts);

        $offer->bid_value = $totalAmount;
        $offer->bid_text = PriceHelper::PriceToText($totalAmount);
        $offer->save();

    
        return redirect()->route('offers.index')->with('success', 'Teklif başarıyla oluşturuldu!');
    }   

}
