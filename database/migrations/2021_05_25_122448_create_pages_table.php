<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->integer('banner_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('schema')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->text('tagline')->nullable();
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
        Schema::drop('pages');
    }
}
