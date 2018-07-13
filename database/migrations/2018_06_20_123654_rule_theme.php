<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RuleTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_theme', function (Blueprint $table) {          
              $table->increments('id');
              $table->integer('rule_id')->unsigned();
              $table->integer('theme_id')->unsigned();
              $table->foreign('rule_id')->references('id')->on('rules');
              $table->foreign('theme_id')->references('id')->on('themes');          
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('rule_theme', function (Blueprint $table) {
          $table->dropForeign(['rule_id']);
          $table->dropForeign(['theme_id']);         
        });

        Schema::dropIfExists('rule_theme');
        Schema::enableForeignKeyConstraints();
    }
}
