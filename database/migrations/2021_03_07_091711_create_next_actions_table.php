<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNextActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notula_id');
            $table->string('pic',50);
            $table->string('detail',255);
            $table->date('due_date',255);
            $table->timestamps();
            $table->foreign('notula_id')->references('id')->on('notulas')->onDelete('cascade');
            $table->foreign('notula_id')->references('id')->on('notulas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_actions');
    }
}
