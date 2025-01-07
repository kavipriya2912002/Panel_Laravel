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
        Schema::create('alltransactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type'); // Type of transaction ('recharge', 'bbps', etc.)
            $table->unsignedBigInteger('transaction_id'); // Foreign key for recharge or bbps tables
            $table->dateTime('datetime'); // Date and time of the transaction
            $table->unsignedBigInteger('user_id'); // Foreign key for users table
            $table->string('status')->default('pending');
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Note: `transaction_id` will link dynamically to recharge or bbps tables in code logic.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alltransactions');
    }
};
