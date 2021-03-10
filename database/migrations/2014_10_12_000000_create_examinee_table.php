<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinee', function (Blueprint $table) {
            $table->increments('examinee_id');
            $table->integer('user_id');
            $table->integer('exam_id');
            $table->date('date_of_exam');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('duration');
            $table->date('validity_date');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinee');
    }
}
