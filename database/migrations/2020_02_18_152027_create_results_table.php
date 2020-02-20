<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->text('fasting')->nullable();
            $table->text('blood')->nullable();
            $table->text('urine')->nullable();
            $table->text('swab')->nullable();
            $table->text('faeces')->nullable();
            $table->text('sputum')->nullable();
            $table->text('tissue')->nullable();
            $table->text('fluids')->nullable();
            $table->text('cytology')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
