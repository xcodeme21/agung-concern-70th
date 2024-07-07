<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesAttedancesAddNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attedances', function (Blueprint $table) {
            $table->boolean('confirmation')->after('attend')->default(0);
            $table->string('seat')->after('confirmation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attedances', function (Blueprint $table) {
            $table->dropColumn('confirmation');
            $table->dropColumn('seat');
        });
    }
}
