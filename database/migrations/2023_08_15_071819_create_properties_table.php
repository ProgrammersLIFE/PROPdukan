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
            $table->string('property_type')->nullable();
            $table->string('property_cat')->nullable();
            $table->string('city')->nullable();
            $table->string('apartment')->nullable();
            $table->string('project')->nullable();
            $table->string('sub_locality')->nullable();
            $table->string('locality')->nullable();
            $table->tinyInteger('house_no')->nullable();   
            $table->string('address')->nullable()->nullable();
            $table->string('zone_type')->nullable();
            $table->string('your_apartment')->nullable();
            $table->tinyInteger('no_of_bathrooms')->nullable();
            $table->tinyInteger('no_of_bedrooms')->nullable();
            $table->tinyInteger('balconie')->nullable();
            $table->string('carpet_area')->nullable();
            $table->string('built_area')->nullable();
            $table->string('super_area')->nullable();
            $table->string('other_rooms')->nullable();
            $table->string('furnishing')->nullable();
            $table->string('reserve_parking')->nullable();
            $table->string('floor_details')->nullable();
            $table->string('floor_details_type')->nullable();
            $table->string('floors_allowed')->nullable();
            $table->string('boundary')->nullable();
            $table->string('open_sides')->nullable();
            $table->string('any_construction')->nullable();
            $table->string('availability_status')->nullable();
            $table->string('age_of_property')->nullable(); 
            $table->string('possession')->nullable(); 
            $table->string('available_date')->nullable(); 
            $table->string('Willing')->nullable();  
            $table->string('avaiable_type')->nullable(); 
            $table->string('suitable')->nullable(); 
            $table->string('property_image')->nullable();
            $table->string('ownership')->nullable();
            $table->integer('excepted_price')->nullable();
            $table->integer('persft_price')->nullable();
            $table->string('price_tax')->nullable();
            $table->integer('additoinal_price')->nullable();
            $table->string('additoinal_price_type')->nullable();
            $table->integer('booking')->nullable();
            $table->integer('width')->nullable();
            $table->string('lease_type')->nullable();
            $table->integer('rent_month')->nullable();
            $table->integer('lease_year')->nullable();
            $table->string('textarea')->nullable();
            $table->string('amenities')->nullable();
            $table->string('propert_features')->nullable();
            $table->string('society_building')->nullable();
            $table->string('additional_feature')->nullable();
            $table->string('water_source')->nullable();
            $table->string('overlooking')->nullable();
            $table->string('other_features')->nullable();
            $table->string('power_back_up')->nullable();
            $table->string('property_facing')->nullable();
            $table->string('type_of_flooring')->nullable();
            $table->string('Width_of_faching')->nullable();
            $table->string('location')->nullable();
            $table->string('property_suggest')->nullable();
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
