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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->double('cash_amount');
            $table->double('credit_amount');
            $table->double('debit_amount');
            $table->double('total_amount');
            $table->integer('status');
            $table->foreignId('contact_id')->constrained('contacts')
                ->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('branch_id')->constrained('branches')
                ->onUpdate('cascade')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
