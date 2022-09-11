@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit House') }}
        </h2>
</x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('house.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('house.update',$house->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="form-group row">
            <div class="col-md-4">
                    <label for="" class="control-label">Name</label>
                    <input type="text" name="name" value="{{ $house->name }}" class="form-control" placeholder="name">
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Description</label>
                    <input type="text" name="features" value="{{ $house->features }}" class="form-control" placeholder="features">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
				<label for="" class="control-label">Location</label>
				<input type="text" class="form-control" name="location"  value="{{ $house->location }}" placeholder="location">
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Status</label>
                <select name="occupied" id="occupied" class="custom-select">
				<option value="0" <?php echo isset($house->occupied) && $house->occupied == '0' ? 'selected': '' ?>>No</option>
				<option value="1" <?php echo isset($house->occupied) && $house->occupied == '1' ? 'selected': '' ?>>Yes</option>
			</select></div>
		</div>
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Monthly amount</label>
				<input type="text" class="form-control" name="monthly_amount"  value="{{ $house->monthly_amount }}" placeholder="monthly_amount">
			</div>
			
		</div>
       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</x-app-layout>
