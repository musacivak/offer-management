<?php

namespace Database\Seeders;

use App\Helpers\PriceHelper;
use App\Models\Offer;
use App\Models\OfferProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 50) as $index) {
            $offer = new Offer();
            $offer->offer_code = $faker->unique()->bothify('O###???');
            $offer->customer_name = $faker->company;
            $offer->customer_email = $faker->email;
            $offer->customer_phone = $faker->numerify('5##########');
            $offer->customer_address = $faker->address;
            $offer->tax_id = $faker->numerify('###########');
            $offer->trade_registry_number =$faker->numerify('################');
            $offer->valid_until = $faker->dateTimeBetween('now', '+1 year');
            $offer->save();

            $totalAmount = 0;

            foreach (range(1,5) as $index) {

                $quantity = $faker->numberBetween(1, 100);
                $unitPrice = $faker->randomFloat(2, 10, 500);

                $productTotalAmount = $quantity * $unitPrice;

                $offerProduct = new OfferProduct();
                $offerProduct->offer_id = $offer->id;
                $offerProduct->product_name = $faker->word;
                $offerProduct->product_description = $faker->sentence;
                $offerProduct->quantity = $quantity;
                $offerProduct->unit_price = $unitPrice;
                $offerProduct->total_amount = $productTotalAmount;
                $offerProduct->save();
    
                $totalAmount += $productTotalAmount;
            }

            $totalAmountToText = PriceHelper::PriceToText( $totalAmount);

            $offer->bid_value = $totalAmount;
            $offer->bid_text = $totalAmountToText;
            $offer->save();
        }
    }
}
