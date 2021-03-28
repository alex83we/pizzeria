<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZutatensTable extends Migration
{
    public function up()
    {
        Schema::create('zutatens', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('zutat');
            $table->decimal('aufpreis',5, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zutatens');
    }
}