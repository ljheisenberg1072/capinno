<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name')->comment('提交文件名称');
            $table->unsignedBigInteger('file_type_id')->comment('文件类型Id');
            $table->unsignedBigInteger('file_size_id')->comment('文件最大值Id');
            $table->boolean('is_required')->comment('是否必填')->default(false);
            $table->unsignedBigInteger('form_setting_id');
            $table->foreign('form_setting_id')->references('id')->on('form_settings')->onDelete('cascade');
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
        Schema::dropIfExists('form_files');
    }
}
