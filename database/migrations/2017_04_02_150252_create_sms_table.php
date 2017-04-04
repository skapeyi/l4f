<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('text')->nullable();
            $table->string('date')->nullable();
            $table->string('aft_id')->nullable();
            $table->string('link_id')->nullable();
            $table->string('message_id')->nullable();
            $table->string('type')->default('incoming');
            $table->string('status')->nullable();
            $table->string('cost')->nullable();
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
        Schema::dropIfExists('sms');
    }
}
