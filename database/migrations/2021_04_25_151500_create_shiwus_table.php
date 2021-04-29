<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiwusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shiwus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('事务名称');
            $table->string('type')->default('')->comment('事务类型');
            $table->text('beizhu')->nullable()->comment('备注');
            $table->integer('is_do')->comment('是否完成：0=>未完成,=>已完成');
            $table->string('is_who')->default('')->comment('执行人');
            $table->timestamp('starttime')->nullable()->comment('开始时间');
            $table->dateTime('endtime')->nullable()->comment('结束时间');
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
        Schema::dropIfExists('shiwus');
    }
}
