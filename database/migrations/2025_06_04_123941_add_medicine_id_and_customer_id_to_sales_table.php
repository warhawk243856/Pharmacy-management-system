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
        Schema::table('sales', function (Blueprint $table) {
            // Add foreign key for medicine_id with cascade on delete
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade');

            // Add nullable foreign key for customer_id with set null on delete
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            // Drop foreign key and column for medicine_id
            $table->dropForeign(['medicine_id']);
            $table->dropColumn('medicine_id');

            // Drop foreign key and column for customer_id
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};