<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('works_name')->comment('作品名称');
            $table->string('works_description')->comment('作品说明');
            $table->text('attention')->nullable(true)->comment('注意事项');
            $table->unsignedBigInteger('campaign_stage_id')->comment('比赛阶段Id');
            $table->foreign('campaign_stage_id')->references('id')->on('campaign_stages')->onDelete('cascade');
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
        Schema::dropIfExists('form_settings');
    }
}
