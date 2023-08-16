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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('city', 100);
            $table->string('apartment', 100);
            $table->string('locality', 100);
            $table->tinyInteger('house_no', 100);   
            $table->string('your_apartment', 100);
            $table->string('no_of_bathrooms', 100);
            $table->string('no_of_bedrooms', 100);
            $table->tinyInteger('balconies', 100);
            $table->string('other_rooms', 100);
            $table->string('furnishing', 100);
            $table->string('reserve_parking', 100);
            $table->string('floor_details', 100);
            $table->string('availability_status', 100);
            $table->tinyInteger('age_of_property', 100); 
            $table->string('price_details', 100);
            $table->string('ownership', 100);
            $table->string('property_description', 100);
            $table->string('amenities', 100);
            $table->string('propert_features', 100);
            $table->string('society_building_features', 100);
            $table->string('additional_features', 100);
            $table->string('water_source', 100);
            $table->string('overlooking', 100);
            $table->string('other_features', 100);
            $table->string('power_back_up', 100);
            $table->string('property_facing', 100);
            $table->string('type_of_flooring', 100);
            $table->string('width', 100);
            $table->string('location', 100);
            $table->string('property_feature', 100);
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
        Schema::dropIfExists('properties');
    }
};
