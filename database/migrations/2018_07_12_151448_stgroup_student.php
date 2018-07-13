<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StgroupStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('stgroup_student', function (Blueprint $table) {
          
          $table->increments('id');
          $table->integer('stgroup_id')->unsigned();
          $table->integer('student_id')->unsigned();
          $table->foreign('stgroup_id')->references('id')->on('stgroups');
          $table->foreign('student_id')->references('id')->on('students');
          
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
        Schema::table('stgroup_student', function (Blueprint $table) {
          $table->dropForeign(['stgroup_id']);
          $table->dropForeign(['student_id']);         
        });

        Schema::dropIfExists('stgroup_student');
        Schema::enableForeignKeyConstraints();

    }
}
