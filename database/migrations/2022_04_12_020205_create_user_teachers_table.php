<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->char('nip')->unique();
            $table->string('gelar');
            $table->string('pendidikan');
            $table->string('alamat');
            $table->char('no_telp');
            $table->foreignId('kelas_id');
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
        Schema::dropIfExists('user_teachers');
    }
}
