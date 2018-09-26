<?php

namespace App\Http\Controllers;

use App\PropertyListing;
use GuzzleHttp\Client;
use Exception;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $query['api_key'] = 'raqjr53tyfbdytqt8bc7r3h8';
        $query['postcode'] = 'HP5 3AT';
//        $query['postcode'] = 'CB23 3NY';

        $client = new Client();

        try {

            $response = $client->get('http://api.zoopla.co.uk/api/v1/' . 'property_listings'  . '.json', ['query' => $query]);
            $listings = json_decode($response->getBody(), true);

            foreach($listings['listing'] as $listing){

//                $property = new PropertyListing;
//
//                $property->listing_id = $listing['listing_id'];
//                $property->county = $listing['county'];
//                $property->country = $listing['country'];
//                $property->post_town= $listing['post_town'];
//                $property->description= substr($listing['description'],0, 200);
//                $property->details_url= $listing['details_url'];
//                $property->displayable_address= $listing['displayable_address'];
//                $property->image_url= $listing['image_url'];
//                $property->thumbnail_url= $listing['thumbnail_url'];
//                $property->latitude= $listing['latitude'];
//                $property->longitude= $listing['longitude'];
//                $property->num_bedrooms= $listing['num_bedrooms'];
//                $property->num_bathrooms= $listing['num_bathrooms'];
//                $property->price= $listing['price'];
//                $property->property_type= $listing['property_type'];
//                $property->listing_status= $listing['listing_status'];
//                $property->status= $listing['status'];

//                $property->save();
            }

        } catch (\GuzzleHttp\Exception\TransferException $e) {

            $response = [
                'error' => [
                    'code' => $e->getResponse()->getStatusCode(),
                    'message' => $e->getMessage()
                ]
            ];
        }

//        dump($listings);
//        die();
//
//     die('dash');


        return view('dashboard', [
//            'recentRevisionHistory' => $this->getRecentRevisionHistory(),
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $data = $request->all();

        $query['api_key'] = 'raqjr53tyfbdytqt8bc7r3h8';
        $query['postcode'] = $data['search'];

//        dump($data);
//        die();
        $client = new Client();

        try {

            $response = $client->get('http://api.zoopla.co.uk/api/v1/' . 'property_listings'  . '.json', ['query' => $query]);
            $listings = json_decode($response->getBody(), true);

            $countProperty = count($listings['listing']);
            $countSavedProperty = 0;
            $countUpdatedProperty = 0;
            if ($countProperty > 0)
            {
                foreach($listings['listing'] as $listing){

                    try {
                        $property = new PropertyListing;

                        $property->listing_id = $listing['listing_id'];
                        $property->county = $listing['county'];
                        $property->country = $listing['country'];
                        $property->post_town = $listing['post_town'];
                        $property->description = substr($listing['description'], 0, 200);
                        $property->details_url = $listing['details_url'];
                        $property->displayable_address = $listing['displayable_address'];
                        $property->image_url = $listing['image_url'];
                        $property->thumbnail_url = $listing['thumbnail_url'];
                        $property->latitude = $listing['latitude'];
                        $property->longitude = $listing['longitude'];
                        $property->num_bedrooms = $listing['num_bedrooms'];
                        $property->num_bathrooms = $listing['num_bathrooms'];
                        $property->price = $listing['price'];
                        $property->property_type = $listing['property_type'];
                        $property->listing_status = $listing['listing_status'];
                        $property->status = $listing['status'];

                        $property->save();

                        $countSavedProperty = $countSavedProperty + 1;

                    }
                    catch(Exception $e){

                        $property = PropertyListing::where('listing_id',$listing['listing_id'])->first();

                        $property->county = $listing['county'];
                        $property->country = $listing['country'];
                        $property->post_town = $listing['post_town'];
                        $property->description = substr($listing['description'], 0, 200);
                        $property->details_url = $listing['details_url'];
                        $property->displayable_address = $listing['displayable_address'];
                        $property->image_url = $listing['image_url'];
                        $property->thumbnail_url = $listing['thumbnail_url'];
                        $property->latitude = $listing['latitude'];
                        $property->longitude = $listing['longitude'];
                        $property->num_bedrooms = $listing['num_bedrooms'];
                        $property->num_bathrooms = $listing['num_bathrooms'];
                        $property->price = $listing['price'];
                        $property->property_type = $listing['property_type'];
                        $property->listing_status = $listing['listing_status'];
                        $property->status = $listing['status'];

                        $property->save();

                        $countUpdatedProperty = $countUpdatedProperty + 1;
                    }


                }
            }

        } catch (\GuzzleHttp\Exception\TransferException $e) {

            $response = [
                'error' => [
                    'code' => $e->getResponse()->getStatusCode(),
                    'message' => $e->getMessage()
                ]
            ];
        }

        return view('dashboard', [
            'property_listings' => PropertyListing::orderBy('id', 'desc')->get(),
            'countProperty' => $countProperty,
            'countSavedProperty' => $countSavedProperty,
            'countUpdatedProperty' => $countUpdatedProperty,
            'search_by' => $data['search'] ? $data['search'] : ''
        ]);
    }

}
