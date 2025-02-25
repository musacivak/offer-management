<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_code')->unique();
            $table->string('customer_name', 100);
            $table->string('customer_address', 250);
            $table->string('customer_phone', 11);
            $table->string('customer_email', 100); 
            $table->decimal('bid_value', 10, 2)->nullable(); 
            $table->string('bid_text', 100)->nullable();
            $table->date('valid_until');
            $table->string('tax_id', 11);
            $table->string('trade_registry_number', 16);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
