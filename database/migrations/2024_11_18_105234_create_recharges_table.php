<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // One-to-Many relationship
            $table->unsignedBigInteger('operator_id'); // One-to-Many relationship
            $table->decimal('amount', 10, 2);
            $table->string('phone_number');
            $table->enum('status', ['pending', 'success', 'failed']);
            $table->string('transaction_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recharges');
    }
};
