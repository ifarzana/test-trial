@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline-secondary">

                    <div class="card-header">
                        <a href="{{ route('property-listing.createView') }}" data-toggle="tooltip" data-placement="bottom" title="Create" class="btn btn-primary btn-xs float-right">
                            <i class="fa fa-plus"></i>
                        </a>

                        <h3 class="mb-0 text-center">Properties</h3>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Listing ID</th>
                                    <th>Country</th>
                                    <th>Desc</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($property_listings as $property_listing)
                                    <tr>
                                        <td>{{ $property_listing->id }}</td>
                                        <td>{{ $property_listing->listing_id }}</td>
                                        <td>{{ $property_listing->country }}</td>
                                        <td>{{ substr($property_listing->description,0, 50). '...'  }}</td>
                                        <td>{{ $property_listing->property_type }}</td>
                                        <td>{{ $property_listing->status }}</td>
                                        <td class="text-right">

                                            <a href="{{ route('property-listing.editView', $property_listing) }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <a href="javascript:confirmation('{{ route('property-listing.delete', $property_listing) }}', 'Delete property listing ?')" data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
