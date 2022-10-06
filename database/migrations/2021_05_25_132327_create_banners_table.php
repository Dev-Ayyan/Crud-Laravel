<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('source')->nullable();
            $table->string('btn1_label')->nullable();
            $table->string('btn1_link')->nullable();
            $table->string('btn1_target')->nullable();
            $table->string('btn1_type')->nullable();
            $table->string('btn2_label')->nullable();
            $table->string('btn2_link')->nullable();
            $table->string('btn2_target')->nullable();
            $table->string('btn2_type')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
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
        Schema::drop('banners');
    }
}
