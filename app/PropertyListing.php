<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyListing extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
//        'listing_id',
        'county',
        'country',
        'post_town',
        'description',
        'displayable_address',
        'num_bedrooms',
        'num_bathrooms',
        'image_url',
        'price',
        'property_type',
        'status',
    ];


    public static $rules = [

        'county' => 'required',
        'country' => 'required',
        'post_town' => 'required',
        'description' => 'required',
        'displayable_address' => 'required|max:255',
        'num_bedrooms' => 'required|numeric',
        'num_bathrooms' => 'required|numeric',

        'price' => 'required|integer',
        'property_type' => 'required',
        'status' => 'required',

    ];
}
