<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutfitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outfit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_baju', 100);
            $table->string('kondisi_baju', 100);
            $table->string('merk_baju', 100);
            $table->string('harga_sewa', 100);
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
        Schema::dropIfExists('outfit');
    }
}
