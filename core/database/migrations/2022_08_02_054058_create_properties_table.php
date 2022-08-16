<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address');
            $table->bigInteger('property_type_id')->unsigned()->nullable();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('status')->comment('0=ongoing,1=complete');
            $table->string('completion-date')->nullable();
            $table->string('picture')->nullable();
            $table->string('apartment_size')->nullable();
            $table->string('land_area')->nullable();
            $table->string('no_of_floors')->nullable();
            $table->string('apartment_floor')->nullable();
            $table->string('room')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('garages')->nullable();
            $table->string('launch_date')->nullable();
            $table->string('floor_plan_image')->nullable();
            $table->string('property_vedio')->nullable();
            $table->string('property_map_link')->nullable();
            $table->tinyInteger('is_featured')->comment('0=no,1=yes')->default(0);
            $table->tinyInteger('is_popular')->comment('0=no,1=yes')->default(0);
            $table->softDeletes();
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
}
