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
        Schema::create('billpayment', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->foreignId('operator_id')->constrained('mobile_operators')->onDelete('cascade');
            $table->string('parameter_name')->nullable(false); // Parameter name (required)
            $table->integer('min_length')->nullable(false); // Minimum length (required)
            $table->integer('max_length')->nullable(false); // Maximum length (required)
            $table->decimal('min_val', 10, 2)->nullable(false); // Minimum value (required)
            $table->decimal('max_val', 10, 2)->nullable(false); // Maximum value (required)
            $table->boolean('is_numeric')->default(false); // Is Numeric (required)
            $table->string('errormessage')->nullable(); // Error message
            $table->string('placeholdertext')->nullable(); // Placeholder text
            $table->boolean('is_mandatory')->default(false); // Is Mandatory (required)
            $table->string('value');
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billpayment');
    }
};
