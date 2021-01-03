<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('works_name')->comment('作品名称')->nullable();
            $table->text('works_description')->comment('作品说明')->nullable();
            $table->unsignedBigInteger('works_category')->comment('作品主题')->nullable();
            $table->text('submission_files')->comment('提交文件');
            $table->unsignedBigInteger('campaign_stage_id')->comment('比赛阶段Id');
            $table->unsignedBigInteger('user_id')->comment('用户Id');
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
        Schema::dropIfExists('stage_submissions');
    }
}
