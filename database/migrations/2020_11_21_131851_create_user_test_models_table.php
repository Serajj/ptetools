<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTestModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_test_models', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nullable();
            $table->string('qid')->nullable();
            $table->string('responce')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('gain_marks')->nullable();
            
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
        Schema::dropIfExists('user_test_models');
    }
}
