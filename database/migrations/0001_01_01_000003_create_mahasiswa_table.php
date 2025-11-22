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
        Schema::create('mahasiswas_table', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('prodi');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
