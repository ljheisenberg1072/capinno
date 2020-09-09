<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar')->comment('头像');
            $table->string('name')->comment('姓名');
            $table->string('company')->comment('就职单位');
            $table->string('title')->comment('头衔');
            $table->text('introduction')->comment('简介')->nullable();
            $table->boolean('on_show')->comment('前台展示')->default(true);
            $table->boolean('on_judgement')->comment('应届评委')->default(false);
            $table->unsignedInteger('display_order')->default(1000)->comment('排序');
            $table->unsignedInteger('review_count')->default(0)->comment('浏览量');
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
        Schema::dropIfExists('judges');
    }
}
