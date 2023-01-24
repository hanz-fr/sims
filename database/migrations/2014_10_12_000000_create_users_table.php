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
            $table->string('nip');
            $table->string('nama');
            $table->string('email')->unique();
            // $table->string('no_telp')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token');
            $table->string('password');
            $table->tinyInteger('role');
            /* Users: Tata Usaha, Kesiswaan, Kurikulum, Wali Kelas */
            $table->boolean('is_admin')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
