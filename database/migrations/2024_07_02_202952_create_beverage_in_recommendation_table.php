<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeverageInRecommendationTable extends Migration
{
    public function up()
    {
        Schema::create('beverage_in_recommendation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recommendation_id');
            $table->unsignedBigInteger('beverage_id');
            $table->timestamps();

            $table->foreign('recommendation_id')->references('id')->on('recommendations')->onDelete('cascade');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('beverage_in_recommendation');
    }
}
