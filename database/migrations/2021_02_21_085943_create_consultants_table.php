<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('phone');
            $table->string('experince');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('rate')->default(0)->nullable();
            $table->json('badges')->nullable();
            $table->string('cost');
            $table->string('discount')->default(0)->nullable();
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
        Schema::dropIfExists('consultants');
    }
}
