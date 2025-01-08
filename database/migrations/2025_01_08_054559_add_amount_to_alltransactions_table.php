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
        Schema::table('alltransactions', function (Blueprint $table) {
            $table->decimal('amount', 10, 2)->default(0)->after('status'); // Adding amount column with a default value of 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alltransactions', function (Blueprint $table) {
            $table->dropColumn('amount'); // Remove the amount column if rolled back
        });
    }
};
