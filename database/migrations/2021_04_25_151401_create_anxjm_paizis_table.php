<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnxjmPaizisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anxjm_paizis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand')->default('');
            $table->string('type')->nullable();
            $table->string('url')->nullable();
            $table->string('retype')->nullable();
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
        Schema::dropIfExists('anxjm_paizis');
    }
}
