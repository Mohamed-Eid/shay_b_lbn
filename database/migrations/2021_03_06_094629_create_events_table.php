<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('instructor_id')->nullable()->constrained()->onDelete('cascade');
                        
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('image');

            $table->date('start_date');
            $table->time('start_time');

            $table->date('end_date');
            $table->time('end_time');

            $table->string('duration');

            $table->string('video');

            $table->enum('type',['online','offline']);

            $table->string('price')->default(0)->nullable();

            $table->string('discount')->default(0)->nullable();

            $table->string('discount_message')->nullable();

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
        Schema::dropIfExists('events');
    }
}
