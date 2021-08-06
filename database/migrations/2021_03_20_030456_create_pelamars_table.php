<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('posisi');
            $table->string('nama');
            $table->string('tmptlahir');
            $table->string('tlahir');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('gender');
            $table->string('pterakhir');
            $table->string('jurusan');
            $table->string('upcv');
            $table->string('upportofolio');
            $table->string('upktp');
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
        Schema::dropIfExists('pelamars');
    }
}
