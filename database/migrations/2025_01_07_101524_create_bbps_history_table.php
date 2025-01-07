<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bbps_history', function (Blueprint $table) {
            $table->id();
            $table->string('biller'); // The biller's name
            $table->string('bill_type'); // Type of bill (e.g., 'electricity', 'water', etc.)
            $table->unsignedBigInteger('user_id'); // User ID (Foreign Key from users table)
            $table->dateTime('datetime'); // The date and time of the transaction
            $table->string('status')->default('pending'); // Status of the bill (default: pending)
            $table->timestamps();

            // Foreign key constraint to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bbps_history');
    }
};
