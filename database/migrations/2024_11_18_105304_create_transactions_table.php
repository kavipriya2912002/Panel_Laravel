<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_id'); // One-to-Many relationship
            $table->enum('type', ['credit', 'debit']);
            $table->decimal('amount', 10, 2);
            $table->text('reason')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();

            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
