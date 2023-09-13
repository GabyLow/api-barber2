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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_branch');
            $table->unsignedBigInteger('id_barber');
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('id_drink');
            $table->unsignedBigInteger('id_music');
            $table->date('id_date');
            $table->time('id_time');
            $table->decimal('id_price', 8, 2);
            $table->timestamps();
    
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_branch')->references('id')->on('branches');
            $table->foreign('id_barber')->references('id')->on('barbers');
            $table->foreign('id_service')->references('id')->on('services');
            $table->foreign('id_drink')->references('id')->on('drinks');
            $table->foreign('id_music')->references('id')->on('music');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
