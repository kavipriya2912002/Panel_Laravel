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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('service_provider_id');
            $table->decimal('range_from', 10, 2);
            $table->decimal('range_to', 10, 2);
            $table->enum('company_type', ['flat', 'percentage']);
            $table->decimal('company_value', 10, 2);
            $table->enum('distributor_type', ['flat', 'percentage']);
            $table->decimal('distributor_value', 10, 2);
            $table->enum('retailer_type', ['flat', 'percentage']);
            $table->decimal('retailer_value', 10, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('service_provider_id')->references('id')->on('sp_operator_mapping')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
