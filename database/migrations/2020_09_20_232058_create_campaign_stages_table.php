<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stage_name')->comment('赛事阶段名称');
            $table->unsignedTinyInteger('need_submission')->comment('是否需要提交作品');
            $table->unsignedTinyInteger('online_offline')->comment('线上还是线下')->nullable();
            $table->dateTime('submission_start_time')->comment('提交作品开始时间')->nullable();
            $table->dateTime('submission_end_time')->comment('提交作品结束时间')->nullable();
            $table->unsignedTinyInteger('need_judgement')->comment('是否需要评审');
            $table->date('judgement_start_date')->comment('评审开始日期')->nullable();
            $table->date('judgement_end_date')->comment('评审结束日期')->nullable();
            $table->unsignedTinyInteger('result_undetermined')->comment('结果公布是否待定');
            $table->date('result_start_date')->comment('结果公布开始日期')->nullable();
            $table->date('result_end_date')->comment('结果公布结束日期')->nullable();
            $table->text('attention')->comment('注意事项')->nullable();
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
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
        Schema::dropIfExists('campaign_stages');
    }
}
