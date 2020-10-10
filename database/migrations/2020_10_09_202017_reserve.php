<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('id_service');
            $table->UnsignedBigInteger('id_branch');
            $table->string('client_name');
            $table->string('service_name');
            $table->date('date');
            $table->time('time');
            $table->UnsignedInteger('phone');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_branch')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reserves');
    }
}
