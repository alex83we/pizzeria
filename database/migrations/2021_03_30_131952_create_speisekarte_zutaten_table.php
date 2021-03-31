<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeisekarteZutatenTable extends Migration
{
    public function up()
    {
        Schema::create('speisekarte_zutaten', function (Blueprint $table) {
            $table->foreignId('speisekarte_id')->constrained()->onDelete('cascade');
            $table->foreignId('zutaten_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('speisekarte_zutaten');
    }
}