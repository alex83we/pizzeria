<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieferzeitensTable extends Migration
{
    public function up()
    {
        Schema::create('lieferzeitens', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('wochentag');
            $table->text('von');
            $table->text('bis');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lieferzeitens');
    }
}