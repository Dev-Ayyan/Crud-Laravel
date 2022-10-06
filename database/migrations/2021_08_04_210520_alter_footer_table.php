<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('cta_form_bg')->after('cta_form_subheading')->nullable();
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
            $table->dropColumn(array('cta_form_bg'));
        });
    }
}
