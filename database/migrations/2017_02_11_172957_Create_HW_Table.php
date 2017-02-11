<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHWTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            for ($i = 1; $i <= 9; $i++) {
                $table->float("0" . $i, 2, 1)->nullable();
            }
            $table->float("10", 2, 1)->nullable();
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
        Schema::dropIfExists('hws');
    }
}
