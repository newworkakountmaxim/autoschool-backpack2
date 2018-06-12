<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('question_ticket', function (Blueprint $table) {
          
          $table->increments('id');
          $table->integer('question_id')->unsigned();
          $table->integer('ticket_id')->unsigned();
          $table->foreign('question_id')->references('id')->on('questions');
          $table->foreign('ticket_id')->references('id')->on('tickets');
          
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
        Schema::table('question_ticket', function (Blueprint $table) {
          $table->dropForeign(['question_id']);
          $table->dropForeign(['ticket_id']);         
        });

        Schema::dropIfExists('question_ticket');
        Schema::enableForeignKeyConstraints();

    }
}
