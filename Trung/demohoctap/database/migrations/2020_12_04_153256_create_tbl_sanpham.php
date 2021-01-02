<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->Increments('sanpham_chinh_id');
            $table->integer('sanpham_id');
            $table->integer('thuonghieu_id');
            $table->string('sanpham_chinh_name');
            $table->text('sanpham_chinh_desc');
            $table->text('sanpham_chinh_content');
            $table->string('sanpham_chinh_price');
            $table->string('sanpham_chinh_image');
            $table->integer('sanpham_chinh_status');
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
        Schema::dropIfExists('tbl_sanpham');
    }
}
