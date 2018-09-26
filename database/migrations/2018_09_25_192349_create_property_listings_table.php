<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('listing_id')->nullable()->unique();
            $table->string('county');
            $table->string('country');
            $table->string('post_town');
            $table->text('description');
            $table->string('details_url')->nullable();
            $table->string('displayable_address');
            $table->string('image_url')->nullable();
            $table->string('thumbnail_url')->nullable();;
            $table->string('latitude')->nullable();;
            $table->string('longitude')->nullable();;
            $table->string('num_bedrooms');
            $table->string('num_bathrooms');
            $table->bigInteger('price');
            $table->string('property_type');
            $table->string('listing_status')->nullable();;
            $table->string('status');
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
        Schema::dropIfExists('property_listings');
    }
}
