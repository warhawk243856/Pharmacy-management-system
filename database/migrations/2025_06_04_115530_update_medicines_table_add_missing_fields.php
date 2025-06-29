<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            // Add 'brand' column if it doesn't exist
            if (!Schema::hasColumn('medicines', 'brand')) {
                $table->string('brand')->nullable();
            }

            // Add 'quantity' column if it doesn't exist
            if (!Schema::hasColumn('medicines', 'quantity')) {
                $table->integer('quantity')->nullable();
            }

            // Add 'price_per_unit' column if it doesn't exist
            if (!Schema::hasColumn('medicines', 'price_per_unit')) {
                $table->decimal('price_per_unit', 10, 2)->nullable();
            }

            // Add 'expiry_date' column if it doesn't exist
            if (!Schema::hasColumn('medicines', 'expiry_date')) {
                $table->date('expiry_date')->nullable();
            }

            // Rename 'stock' to 'quantity' if 'stock' exists and 'quantity' doesn't
            if (Schema::hasColumn('medicines', 'stock') && !Schema::hasColumn('medicines', 'quantity')) {
                $table->renameColumn('stock', 'quantity');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {
            // Drop 'brand' column if it exists
            if (Schema::hasColumn('medicines', 'brand')) {
                $table->dropColumn('brand');
            }

            // Drop 'price_per_unit' column if it exists
            if (Schema::hasColumn('medicines', 'price_per_unit')) {
                $table->dropColumn('price_per_unit');
            }

            // Drop 'expiry_date' column if it exists
            if (Schema::hasColumn('medicines', 'expiry_date')) {
                $table->dropColumn('expiry_date');
            }

            // Rename 'quantity' back to 'stock' if 'quantity' exists and 'stock' doesn't
            if (Schema::hasColumn('medicines', 'quantity') && !Schema::hasColumn('medicines', 'stock')) {
                $table->renameColumn('quantity', 'stock');
            }
        });
    }
};
