<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFooterAddPlaceholderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('cart_field_placeholder')->after('cta_form_bg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn(array('cart_field_placeholder'));
        });
    }
}
