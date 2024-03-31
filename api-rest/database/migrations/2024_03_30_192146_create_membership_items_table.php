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
        Schema::create('membership_items', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->foreignId('membership_id')->constrained('memberships')
                ->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('partner_id')->constrained('partners')
                ->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('order_id')->constrained('orders')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_items');
    }
};
