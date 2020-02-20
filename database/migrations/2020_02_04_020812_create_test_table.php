<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->string('urgency');
            $table->string('sample');
            $table->boolean('fasting')->default(false);
            $table->boolean('blood')->default(false)->nullable();
            $table->boolean('urine')->default(false)->nullable();
            $table->boolean('swab')->default(false)->nullable();
            $table->boolean('faeces')->default(false)->nullable();
            $table->boolean('sputum')->default(false)->nullable();
            $table->boolean('tissue')->default(false)->nullable();
            $table->boolean('fluids')->default(false)->nullable();
            $table->boolean('cytology')->default(false)->nullable();
            $table->text('others')->nullable();
            $table->text('drug_therapy')->nullable();
            $table->text('last_dose')->nullable();
            $table->date('last_dose_date')->nullable();
            $table->text('clinical_info')->nullable();
            $table->unsignedBigInteger('requester');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('requester')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test');
    }
}
