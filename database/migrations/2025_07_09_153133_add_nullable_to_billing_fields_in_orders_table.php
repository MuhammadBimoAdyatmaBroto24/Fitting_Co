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
            $table->string('billing_first_name')->nullable()->change();
            $table->string('billing_last_name')->nullable()->change();
            $table->string('billing_country')->nullable()->change();
            $table->string('billing_address')->nullable()->change();
            $table->string('billing_city')->nullable()->change();
            $table->string('billing_state')->nullable()->change();
            $table->string('billing_zip')->nullable()->change();
            $table->string('billing_phone')->nullable()->change();
            $table->string('billing_email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Revert changes if needed, assuming original was not nullable
            // Note: This might fail if there are existing NULL values and you try to make them non-nullable
            $table->string('billing_first_name')->nullable(false)->change();
            $table->string('billing_last_name')->nullable(false)->change();
            $table->string('billing_country')->nullable(false)->change();
            $table->string('billing_address')->nullable(false)->change();
            $table->string('billing_city')->nullable(false)->change();
            $table->string('billing_state')->nullable(false)->change();
            $table->string('billing_zip')->nullable(false)->change();
            $table->string('billing_phone')->nullable(false)->change();
            $table->string('billing_email')->nullable(false)->change();
        });
    }
};