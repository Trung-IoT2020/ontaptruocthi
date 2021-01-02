<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblThuonghieuSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_thuonghieu_sanpham', function (Blueprint $table) {
            $table->Increments('thuonghieu_id');
            $table->string('thuonghieu_name');
            $table->text('thuonghieu_desc');
            $table->integer('thuonghieu_status');
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
        Schema::dropIfExists('tbl_thuonghieu_sanpham');
    }
}
