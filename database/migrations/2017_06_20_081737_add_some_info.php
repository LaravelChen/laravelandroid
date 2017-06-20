<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("avatar")->default("https://photo.laravelchen.cn/avataravatar.jpeg");
            $table->string("introduction")->default("请填写");
            $table->string("sex")->default("请选择");
            $table->string("birthday")->default("请选择");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("avatar");
            $table->dropColumn("introduction");
            $table->dropColumn("sex");
            $table->dropColumn("birthday");
        });
    }
}
