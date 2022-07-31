<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('phone_input')->default('no');
            $table->string('location_input')->default('no');
            $table->string('questions_input')->default('no');
            $table->string('timetocall_input')->default('no');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('visible');
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
        Schema::dropIfExists('forms');
    }
}
