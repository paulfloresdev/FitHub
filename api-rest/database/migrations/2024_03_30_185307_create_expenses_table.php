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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('types_of_expenses')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('subtype_id')->constrained('subtypes_of_expenses')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('product_id')->constrained('products')
                ->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->integer('amount');
            $table->double('price');
            $table->string('observations');
            $table->foreignId('contacts_id')->constrained('contacts')
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
        Schema::dropIfExists('expenses');
    }
};
