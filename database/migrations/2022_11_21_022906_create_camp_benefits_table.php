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
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();

            // Cara pertama
            // $table->bigInteger('camp_id')->unsigned();
            // $table->unsignedBigInteger('camp_id');
            // unsigned() -> karena id pada table camps, bigInteger dan atributnya unsigned.
            // digunakan untuk relasi

            // Cara kedua
            $table->foreignId('camp_id')->constrained();

            $table->string('name');
            $table->timestamps();

            // Cara pertama
            // relasi camp_benefit -> camps
            // $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_benefits');
    }
};
