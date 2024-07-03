<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishInRecommendationTable extends Migration
{
    public function up()
    {
        Schema::create('dish_in_recommendation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recommendation_id');
            $table->unsignedBigInteger('dish_id');
            $table->timestamps();

            $table->foreign('recommendation_id')->references('id')->on('recommendations')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dish_in_recommendation');
    }
}
