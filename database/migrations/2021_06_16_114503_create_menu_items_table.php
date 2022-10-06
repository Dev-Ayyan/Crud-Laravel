<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('title',100)->nullable();
            $table->string('url',191)->nullable();
            $table->string('slug',200)->nullable();
            $table->string('route',191)->nullable();
            $table->string('target',100)->nullable();
            $table->string('icon_class',100)->nullable();
            $table->string('color',100)->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('menu_items');
    }
}
