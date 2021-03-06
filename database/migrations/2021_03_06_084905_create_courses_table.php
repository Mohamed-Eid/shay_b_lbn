<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('instructor_id')->nullable()->constrained()->onDelete('cascade');
            
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('image');

            $table->enum('type',['online','offline']);

            $table->boolean('active')->default(0)->nullable();


            $table->string('rate')->default(0)->nullable();

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
        Schema::dropIfExists('courses');
    }
}
