<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->string('mc')->default('x.y,x.y,x.y,x.y,x.y,x.y,x.y,x.y,x.y');
            $table->string('tc')->default('xy.z,xy.z');
            $table->string('hw')->default('x.y,x.y,x.y,x.y,x.y,x.y,x.y,x.y,x.y,x.y');
            $table->string('pb')->default('x,x,x,x,x,x,x,x,x');
            $table->string('ks')->default('x,x,x,x,x,x,x,x,x,x,x,x');
            $table->string('ac')->default('x,x,x,x,x,x,x,x');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('scores');
    }
}
