<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('questions_tickets', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ticket_id')->unsigned();
          $table->integer('question_id')->unsigned();
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
        Schema::dropIfExists('questions_tickets');
    }
}
