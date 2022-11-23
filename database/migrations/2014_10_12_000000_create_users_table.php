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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->string('google_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // nullable -> karena login menggunakan OAuth
            $table->string('avatar')->nullable();
            // nullable -> karena admin tidak menggunakan avatar
            $table->string('occupation')->nullable();
            // nullable -> karena admin tidak menggunakan occupation, OAuth google tidak menyediakan data occupation
            $table->boolean('is_admin')->default(false);
            // default(false) -> karena lebih mengutamakan user 
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
