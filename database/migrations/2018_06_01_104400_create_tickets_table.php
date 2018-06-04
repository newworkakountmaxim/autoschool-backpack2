<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('rule')->default(0); 
            $table->integer('user_id')->unsigned();  
            $table->integer('qty_qst');                                  
            $table->integer('time');
            $table->integer('ball');
            // $table->integer('question_id')->unsigned();
            $table->integer('question_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');            
            //$table->foreign('question_id')->references('id')->on('questions');
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

        Schema::table('tickets', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
         //$table->dropForeign(['question_id']);
        });

        Schema::dropIfExists('tickets');
        Schema::enableForeignKeyConstraints();
    }
}
