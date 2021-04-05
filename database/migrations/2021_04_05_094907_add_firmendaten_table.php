<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirmendatenTable extends Migration
{
    public function up()
    {
        Schema::table('firmendaten', function (Blueprint $table) {
            $table->string('email')->nullable()->after('mobil');
        });
    }

    public function down()
    {
        Schema::table('firmendaten', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}