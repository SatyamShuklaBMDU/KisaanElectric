<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refferals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id')->comment('refer from user');
            $table->unsignedBigInteger('to_user_id')->comment('refer to user');
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
        Schema::dropIfExists('refferals');
    }
}
