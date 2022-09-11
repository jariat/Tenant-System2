@extends('houses.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show House</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('house.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row card">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                     {{ $house->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $house->features }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $house->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if ($house->occupied == 0 ) Not occupied @endif
                @if ($house->occupied == 1 ) Occupied @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nonthly amount:</strong>
                {{ $house->monthly_amount }}
            </div>
        </div>
       
    </div>
@endsection
