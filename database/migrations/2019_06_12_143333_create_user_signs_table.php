<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('campaign_id');
            $table->string('leader_name');
            $table->string('leader_phone');
            $table->unsignedTinyInteger('identity');
            $table->string('school_province');
            $table->string('school_city');
            $table->string('school');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('leader_email');
            $table->string('working_company');
            $table->string('team_name');
            $table->text('other_members');
            $table->text('guide_teachers')->nullable();
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
        Schema::dropIfExists('user_signs');
    }
}
