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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('rfc', 13)->unique();
            $table->string('curp', 18)->unique()->nullable();
            $table->string('street', 64);
            $table->string('int_num', 7);
            $table->string('ext_num', 7);
            $table->string('colony', 64);
            $table->string('cp', 5);
            $table->string('city', 64);
            $table->foreignId('state_id')->constrained('states')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->string('phone', 10)->unique();
            $table->string('email')->unique();
            $table->string('rse')->unique()->nullable();
            $table->integer('person_type');
            $table->integer('use_type');
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles_fiscales');
    }
};
