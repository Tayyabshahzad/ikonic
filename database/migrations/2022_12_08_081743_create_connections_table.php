<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requested_from');
            $table->foreign('requested_from')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('requested_to');
            $table->foreign('requested_to')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['pending','approve']);
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
        Schema::dropIfExists('connections');
    }
};
