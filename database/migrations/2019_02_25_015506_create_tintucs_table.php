<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('id_tintuc');
            $table->string('tieude')->unique();
            $table->string('tomtat');
            $table->string('thumbnail')->unique();
            $table->mediumText('noidung');
            $table->integer('id_loai')->unsigned();
            $table->foreign('id_loai')->references('id_loai')->on('loaitin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
}
