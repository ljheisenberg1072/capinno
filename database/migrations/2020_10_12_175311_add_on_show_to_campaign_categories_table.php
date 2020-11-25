<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnShowToCampaignCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_categories', function (Blueprint $table) {
            $table->boolean('on_show')->after('category_name')->default(true)->comment('是否展示');
            $table->unsignedInteger('display_order')->after('on_show')->default(1000)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_categories', function (Blueprint $table) {
            $table->dropColumn('on_show');
            $table->dropColumn('display_order');
        });
    }
}
