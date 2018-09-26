<?php
$search_by = isset($search_by) ? $search_by : null;
?>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline-secondary">

                    <div class="card-header">
                        <h3 class="mb-0 text-center">Search Property</h3>
                    </div>

                    <div class="card-body">


                        @if(!empty($search_by))
                            <p> <?=$countProperty?> properties found and total <?=$countSavedProperty?> properties are saved in the database, and total <?=$countUpdatedProperty?> properties are updated in the database, </p>
                        @endif
                        {!! Form::open(array('action' => 'DashboardController@search', 'method' => 'post', 'id' => 'SearchForm', 'class' => 'form text-center search-form')) !!}

                        <div class="col-lg-4"></div>

                        <div class="input-group col-lg-4">

                            {!! Form::text('search', urldecode($search_by), array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Search')) !!}

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> </button>
                            </div>

                        </div>

                        <div class="col-lg-4"></div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
