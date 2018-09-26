@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline-secondary">

                    <div class="card-header">
                        <h3 class="mb-0 text-center">Create a property</h3>
                    </div>

                    <div class="card-body">

                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger alert-list" role="alert">
                                <p>There were one or more issues with your submission. Please correct them as indicated below.</p>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        {!! Form::open(['route' => ['property-listing.store'], 'method' =>'POST' , 'enctype'=>'multipart/form-data' ]) !!}

                            <span class="span-header text-primary">Details</span>
                            <hr>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('county', 'County*') !!}
                                    {!! Form::text('county', null, ['class' => 'form-control' . ($errors->has('county') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('country', 'Country*') !!}
                                    {!! Form::text('country', null, ['class' => 'form-control' . ($errors->has('country') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('post_town', 'Town*') !!}
                                    {!! Form::text('post_town', null, ['class' => 'form-control' . ($errors->has('post_town') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                                <div class="col-md-6">
                                {{--{!! Form::label('postcode', 'Postcode*') !!}--}}
                                {{--{!! Form::text('postcode', null, ['class' => 'form-control' . ($errors->has('postcode') ? ' is-invalid' : ''), 'required']) !!}--}}

                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    Browse… <input type="file" id="image" name="image">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img name= 'img-upload' id='img-upload'/>
                                    </div>
                                </div>
                            </div>

                            <span class="span-header text-primary">Description</span>
                            <hr>

                            <div class="form-group">
                                {!! Form::textarea('description', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('description') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                            </div>

                            <span class="span-header text-primary">Others</span>
                            <hr>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('displayable_address', 'Displayable address*') !!}
                                    {!! Form::text('displayable_address', null, ['class' => 'form-control' . ($errors->has('displayable_address') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                                {{--<div class="col-md-6">--}}
                                {{--{!! Form::label('num_bedrooms', 'Image*') !!}--}}
                                {{--{!! Form::text('num_bedrooms', null, ['class' => 'form-control' . ($errors->has('num_bedrooms') ? ' is-invalid' : ''), 'required']) !!}--}}
                                {{--</div>--}}
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('num_bedrooms', 'No of bedrooms*') !!}
                                    {!! Form::number('num_bedrooms', null, ['class' => 'form-control' . ($errors->has('num_bedrooms') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('num_bathrooms', 'No of bathrooms*') !!}
                                    {!! Form::number('num_bathrooms', null, ['class' => 'form-control' . ($errors->has('num_bathrooms') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('price', 'Price*') !!}
                                    {!! Form::text('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'required']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('property_type', 'Property type*') !!}
                                    {!! Form::select('property_type', $propertyType, null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('status', 'Property status*') !!}
                                    {!! Form::select('status', $propertyStatus, null, ['class' => 'form-control', 'required' => 'required']) !!}

                                </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                {!! Form::submit('Create', ['class' => 'btn btn-success btn-lg btn-block']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection