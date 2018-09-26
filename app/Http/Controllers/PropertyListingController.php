<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\PropertyListing;
use App\Template;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Image;

class PropertyListingController extends Controller
{

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function listView()
    {
        return view('property_listing.list', [
            'property_listings' => PropertyListing::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function createView()
    {

        $propertyStatus = [
            'for_sale' => 'For sale',
            'sale_under_offer' => 'Sale under offer',
            'sold'  => 'Sold',
            'to_rent' => 'To rent',
            'rent_under_offer'  => 'Rent under offer',
            'rented' => 'Rented'

        ];


        $propertyType= [
            'Terraced' => 'Terraced',
            'End of terrace' => 'End of terrace',
            'Semi-detached' => 'Semi-detached',
            'Detached' => 'Detached',
            'Mews house' => 'Mews house',
            'Flat' => 'Flat',
            'Maisonette' => 'Maisonette',
            'Bungalow' => 'Bungalow',
            'Town house' => 'Town house',
            'Cottage' => 'Cottage',
            'Farm/Barn' => 'Farm/Barn',
            'Mobile/static' => 'Mobile/static',
            'Land' => 'Land',
            'Studio' => 'Studio',
            'Block of flats' => 'Block of flats',
            'Office' => 'Office'
        ];
        return view('property_listing.create', [

            'propertyType' => $propertyType,
            'propertyStatus' => $propertyStatus,
        ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAction(Request $request)
    {

        $rules = PropertyListing::$rules;
        $this->validate($request, $rules);

        $data = $request->all();

        if($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(150, 150);
            $image_resize->save(public_path('images/' .$filename));

            $data['image_url'] = '/images/' .$filename;

        }


        $PropertyListing = PropertyListing::create($data);

        return redirect()->route('property-listing.editView', $PropertyListing);
    }

    /**
     *
     * @param  \App\PropertyListing  $PropertyListing
     * @return \Illuminate\Http\Response
     */
    public function editView(PropertyListing $PropertyListing)
    {
        $propertyStatus = [
            'for_sale' => 'For sale',
            'sale_under_offer' => 'Sale under offer',
            'sold'  => 'Sold',
            'to_rent' => 'To rent',
            'rent_under_offer'  => 'Rent under offer',
            'rented' => 'Rented'

        ];


        $propertyType= [
            'Terraced' => 'Terraced',
            'End of terrace' => 'End of terrace',
            'Semi-detached' => 'Semi-detached',
            'Detached' => 'Detached',
            'Mews house' => 'Mews house',
            'Flat' => 'Flat',
            'Maisonette' => 'Maisonette',
            'Bungalow' => 'Bungalow',
            'Town house' => 'Town house',
            'Cottage' => 'Cottage',
            'Farm/Barn' => 'Farm/Barn',
            'Mobile/static' => 'Mobile/static',
            'Land' => 'Land',
            'Studio' => 'Studio',
            'Block of flats' => 'Block of flats',
            'Office' => 'Office'
        ];

        return view('property_listing.edit', [
            'propertyListing' => $PropertyListing,
            'propertyType' => $propertyType,
            'propertyStatus' => $propertyStatus,
        ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyListing  $PropertyListing
     * @return \Illuminate\Http\Response
     */
    public function updateAction(Request $request, PropertyListing $PropertyListing)
    {
        $rules = PropertyListing::$rules;

        $this->validate($request, $rules);

        $data = $request->all();

        $PropertyListing->update($data);
        return redirect()->route('property-listing.editView', $PropertyListing);
    }

    /**
     *
     * @param  \App\PropertyListing  $PropertyListing
     * @return \Illuminate\Http\Response
     */
    public function delete(PropertyListing $PropertyListing)
    {
        try{

            $PropertyListing->delete();

        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getCode(),
                'message' => $ex->getMessage()
            ]);
        }

        return redirect()->route('property-listing.listView');
    }

}
