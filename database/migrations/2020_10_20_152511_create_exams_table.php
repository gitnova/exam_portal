<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('description');
            $table->integer('no_of_questions')->nullable(false);
            $table->integer('passing_questions')->nullable(false);
            $table->enum('exam_type', ['MCQ'])->comment('MCQ is multiple choice questions');
            $table->date('expiry_date')->nullable(false);
            $table->integer('added_by')->nullable(false);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('grade_type')->nullable(false);
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
        Schema::dropIfExists('exams');
    }
}
