<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id')->nullable(false);
            $table->integer('student_id')->nullable(false);
            $table->integer('correct_answers')->nullable(false);
            $table->integer('incorrect_answers')->nullable(false);
            $table->integer('grade_id')->nullable(false);
            $table->json('actual_question_answers')->nullable(false);
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
        Schema::dropIfExists('results');
    }
}
