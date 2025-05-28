<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('event_date');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->nullable();
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
};
