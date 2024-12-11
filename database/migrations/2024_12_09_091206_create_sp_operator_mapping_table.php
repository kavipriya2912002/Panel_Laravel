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
        Schema::create('sp_operator_mapping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained('mobile_operators')->onDelete('cascade');
            $table->foreignId('service_provider_id')->constrained('service_providers')->onDelete('cascade');
            $table->string('value'); // Operator code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_operator_mapping');
    }
};
