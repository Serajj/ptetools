<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakings', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('question_id')->nullable();
            $table->string('correct')->nullable();
            $table->string('incorrect')->nullable();
            $table->string('result')->nullable();
            $table->string('note')->nullable();
            $table->string('data')->nullable();
            $table->string('checkedby')->nullable();
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
        Schema::dropIfExists('speakings');
    }
}
