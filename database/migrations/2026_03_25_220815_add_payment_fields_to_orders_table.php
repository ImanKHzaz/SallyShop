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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->default('cod')->after('shipping_address');
            $table->string('phone_number')->nullable()->after('payment_method');
            $table->string('country_code')->default('+966')->after('phone_number');
            $table->string('payment_status')->default('pending')->after('country_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'phone_number', 'country_code', 'payment_status']);
        });
    }
};
