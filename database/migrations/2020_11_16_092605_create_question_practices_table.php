<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionPracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_practices', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('subtype')->nullable();
            $table->string('question')->nullable();
            $table->string('audio')->nullable();
            $table->string('image')->nullable();
            $table->string('message')->nullable();
            $table->string('data')->nullable();
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('c')->nullable();
            $table->string('d')->nullable();
            $table->string('correct')->nullable();
            $table->string('status')->default('active');

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
        Schema::dropIfExists('question_practices');
    }
}
