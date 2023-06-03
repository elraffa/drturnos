<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_availability', function (Blueprint $table) {
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('availability_id');
            $table->timestamps();

            $table->foreign('day_id')->references('id')->on('days_of_week')->onDelete('cascade');
            $table->foreign('availability_id')->references('id')->on('availabilities')->onDelete('cascade');

            $table->primary(['day_id', 'availability_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_availability');
    }
};
