<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorSpecialistCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialist_cats', function (Blueprint $table) {
            $table->id();
            $table->string('specialist');
            $table->timestamps();
        });

        Schema::create('specialist_sub_cats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('specialist_cat_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('degree');
            $table->string('info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialist_cats');
        Schema::dropIfExists('specialist_sub_cats');
    }
}
