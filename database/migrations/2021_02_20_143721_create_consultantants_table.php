<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultantants', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('phone');
            $table->string('experince');
            $table->string('lat');
            $table->string('lng');
            $table->string('rate')->default(0)->nullable();
            $table->enum('badge',['selected','recent','our_stars']);
            $table->string('cost');
            $table->string('comession')->default(0)->nullable();
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
        Schema::dropIfExists('consultantants');
    }
}
