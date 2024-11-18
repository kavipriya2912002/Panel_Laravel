<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id'); // One-to-Many relationship
            $table->string('plan_name');
            $table->decimal('price', 10, 2);
            $table->string('validity')->nullable(); // e.g., '28 days'
            $table->string('data')->nullable(); // e.g., '2GB/day'
            $table->text('benefits')->nullable();
            $table->timestamps();

            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
