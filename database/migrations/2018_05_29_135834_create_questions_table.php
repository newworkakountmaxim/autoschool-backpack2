<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');           
            $table->string('img_id');
            $table->string('qty_answ');
            $table->string('cor_answ');
            $table->string('answers');
            $table->integer('user_id')->unsigned();
            $table->integer('theme_id')->unsigned();
            $table->string('pdd_links');
            $table->string('feature');
            $table->string('comments');            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('theme_id')->references('id')->on('themes');
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
        Schema::table('questions', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropForeign(['theme_id']);
        });
        Schema::dropIfExists('questions');
        Schema::enableForeignKeyConstraints();
    }
}
