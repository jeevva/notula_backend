<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notula_id');
            $table->string('name',50);
            $table->string('email',50);
            $table->string('phone',50);
            $table->string('position',255);
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
        Schema::dropIfExists('attendances');
    }
}
