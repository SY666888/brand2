<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnxjmBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anxjm_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->string('brand_username')->default('');
            $table->string('brand_userid')->default('');
            $table->string('state')->default('-1')->comment('未处理=>-1,废弃=>0,完成=>1');
            $table->string('untype')->nullable()->comment('cf=>重复,bcz=>不存在,wzl=>无资料,jzc=>禁止词');
            $table->string('important')->default('0')->nullable();
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
        Schema::dropIfExists('anxjm_brands');
    }
}
