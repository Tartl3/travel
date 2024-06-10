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
        Schema::create('reserve', function (Blueprint $table) {
            $table->id('reserve_id');
            $table->bigInteger('travel_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->integer('reserve_seat');
            $table->timestamps();
        });
        Schema::table('reserve', function($table) {
            $table->foreign('travel_id')->references('travel_id')->on('travelokos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve');
    }
    
};
