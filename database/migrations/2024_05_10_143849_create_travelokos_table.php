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
        Schema::create('travelokos', function (Blueprint $table) {
            $table->id('travel_id');
            $table->string('kode_perjalanan');
            $table->string('asal');
            $table->string('tujuan');
            $table->date('tgl');
            $table->timestamp('waktu');
            $table->string('kendaraan');
            $table->integer('harga');
            $table->integer('max_capacity');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelokos');
    }
};
