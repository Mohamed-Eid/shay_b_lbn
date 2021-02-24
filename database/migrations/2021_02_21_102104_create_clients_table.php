<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();

            $table->string('image')->nullable();

            $table->enum('gender',['male','female']);
            $table->enum('status',['married','single','engaged','detached']);
            $table->string('password');
            $table->integer('age');
            $table->string('api_token')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('locale')->default('en')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
