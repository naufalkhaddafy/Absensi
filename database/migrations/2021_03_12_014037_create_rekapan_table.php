<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rekapan', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->string('jam')->nullable();
            $table->string('nama');
            $table->string('keterangan');
            $table->string('ket_pekerjaan')->nullable();
            $table->string('foto')->nullable();
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapan');
    }
}
