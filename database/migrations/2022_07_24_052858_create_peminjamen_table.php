<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no');
            $table->date('tanggal');
            $table->string('lama');
            $table->string('keterangan');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('peminjamen', function (Blueprint $table) {
            $table->unsignedBigInteger('fasility_id');

            $table->foreign('fasility_id')->references('id')->on('fasilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}
