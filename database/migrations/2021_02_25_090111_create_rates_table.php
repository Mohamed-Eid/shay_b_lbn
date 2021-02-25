<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            
            $table->string('rate')->default(0)->nullable();
            $table->text('comment')->nullable();
            $table->text('answer')->nullable();

            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('setting_id')->constrained()->onDelete('cascade');

            $table->morphs('rateable');
            
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
        Schema::dropIfExists('rates');
    }
}
