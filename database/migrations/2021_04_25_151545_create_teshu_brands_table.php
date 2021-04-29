<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeshuBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teshu_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brandname')->default('');
            $table->string('brand_username')->nullable();
            $table->string('brand_userid')->nullable();
            $table->string('state')->nullable()->comment('未处理=>-1,废弃=>0,完成=>1');
            $table->string('untype')->nullable()->comment('cf=>重复,bcz=>不存在,wzl=>无资料,jzc=>禁止词');
            $table->integer('is_get')->default('0')->comment('是否领取：0=>未领取,1=>已领取');
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
        Schema::dropIfExists('teshu_brands');
    }
}
