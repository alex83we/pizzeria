<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeisekartesTable extends Migration
{
    public function up()
    {
        Schema::create('speisekartes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('speisekarte_name');
            $table->decimal('speisekarte_basispreis', 8, 2);
            $table->decimal('speisekarte_basispreisabholung', 8, 2);
            $table->decimal('speisekarte_basispreislieferung', 8, 2);
            $table->string('speisekarte_allergene');
            $table->string('speisekarte_zusatzstoffe');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('speisekartes');
    }
}