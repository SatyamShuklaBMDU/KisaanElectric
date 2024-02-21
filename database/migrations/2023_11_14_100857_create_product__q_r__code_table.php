<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQRCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__q_r__code', function (Blueprint $table) {
            $table->id('Sno');
            $table->timestamps();
            $table->string('QR_Code',20);
            $table->string('Category');
            $table->string('Product_Name');
            $table->integer('Points');
            $table->integer('status');
            $table->string('group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__q_r__code');
    }
}
