<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmasTable extends Migration
{
    public function up()
    {
        Schema::create('firmendaten', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('firmenname');
            $table->text('inhaber');
            $table->text('straße');
            $table->text('ort');
            $table->text('plz');
            $table->text('telefon');
            $table->text('mobil');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('firmas');
    }
}