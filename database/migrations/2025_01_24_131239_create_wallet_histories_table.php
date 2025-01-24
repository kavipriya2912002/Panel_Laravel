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
        Schema::create('wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_id'); // Relation to wallet
            $table->unsignedBigInteger('admin_id'); // Admin who added the amount
            $table->decimal('amount', 10, 2); // Amount added to the wallet
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade'); // Assuming admins are in the 'users' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_histories');
    }
};
