<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_statuses', function (Blueprint $table) {
            $table->id();
           
            $table->string('tid')->nullable();
            $table->string('cqid')->nullable();
            $table->string('test_time_left')->nullable();
            $table->string('note')->nullable();
            $table->string('test_status')->nullable();
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
        Schema::dropIfExists('test_statuses');
    }
}
