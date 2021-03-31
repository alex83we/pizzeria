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

            $table->bigInteger('categories_id')->unsigned();
            $table->string('speisekarte_name');
            $table->decimal('speisekarte_basispreis', 8, 2);
            $table->decimal('speisekarte_basispreisabholung', 8, 2);
            $table->decimal('speisekarte_basispreislieferung', 8, 2);
            $table->string('speisekarte_allergene')->nullable();
            $table->string('speisekarte_zusatzstoffe')->nullable();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('speisekartes');
    }
}