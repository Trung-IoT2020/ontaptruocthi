<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDoanhmucSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_doanhmuc_sanpham', function (Blueprint $table) {
            $table->Increments('sanpham_id');
            $table->string('sanpham_name');
            $table->text('sanpham_desc');
            $table->integer('sanpham_loai');
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
        Schema::dropIfExists('tbl_doanhmuc_sanpham');
    }
}
