<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('brandname');
            $table->string('type')->nullable();
            $table->string('retype')->nullable();
            $table->string('source_url')->nullable();
            $table->string('web_anxjm')->nullable();
            $table->string('web_51xxsp')->nullable();
            $table->integer('important')->nullable();
            $table->integer('anx_news')->nullable();
            $table->integer('51xx_news')->nullable();
            $table->integer('anx_news_num')->nullable();
            $table->integer('51xx_news_num')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
