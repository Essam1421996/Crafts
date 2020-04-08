<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminnotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminnotifs', function (Blueprint $table) {
            $table->increments('id');
             $table->string('owner');
            $table->integer('isuser');
            $table->integer('iscraft');
            $table->integer('ispost');
            $table->integer('iscomment');
            $table->integer('ismessage');
            $table->integer('isquestion');
            $table->string('content');
            $table->integer('asread');
            $table->date('date');
            $table->time('time');
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
        Schema::dropIfExists('adminnotifs');
    }
}
