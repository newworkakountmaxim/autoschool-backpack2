<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('qty_tickets');
            $table->integer('qty_qst');            
            $table->integer('time');
            $table->integer('ball');            
            $table->string('description');   
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('rules', function (Blueprint $table) {
          $table->dropForeign(['user_id']);                 
        });

        Schema::dropIfExists('rules');
        Schema::enableForeignKeyConstraints();
    }
}
