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
        Schema::create('sosmeds', function (Blueprint $table) {
            $table->id('sosmed_id');
            $table->string('nama_sosmed');
            $table->text('link_sosmed');
            $table->string('icon_sosmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosmeds');
    }
};
