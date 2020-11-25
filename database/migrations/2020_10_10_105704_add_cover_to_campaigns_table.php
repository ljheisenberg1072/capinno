<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverToCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('cover')->after('campaign_name')->comment('大赛封面');
            $table->string('introduction')->after('cover')->comment('大赛简介');
            $table->boolean('is_top')->default(false)->after('on_hold')->comment('是否置顶');
            $table->unsignedInteger('display_order')->default(1000)->after('is_top')->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('introduction');
            $table->dropColumn('is_top');
            $table->dropColumn('display_order');
        });
    }
}
