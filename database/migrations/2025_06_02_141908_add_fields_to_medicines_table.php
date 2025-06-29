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
        Schema::table('medicines', function (Blueprint $table) {
            $table->string('brand')->after('name');
            $table->integer('quantity')->after('category');
            $table->decimal('price_per_unit', 10, 2)->after('quantity');
            $table->date('expiry_date')->after('price_per_unit');
              $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropColumn(['brand', 'quantity', 'price_per_unit', 'expiry_date']);
            $table->decimal('price', 10, 2)->nullable(); // Add back if rolled back
        });
    }
};
