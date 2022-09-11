@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new House') }}
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
   
<form action="{{ route('house.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Name</label>
				<input type="text" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Description</label>
				<input type="text" class="form-control" name="features"  value="<?php echo isset($features) ? $features :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">Location</label>
				<input type="text" class="form-control" name="location"  value="<?php echo isset($location) ? $location :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Occupied</label>
				<select name="occupied">
                <option value="none" selected></option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
			
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Monthly amount</label>
				<input type="number" class="form-control" name="monthly_amount"  value="<?php echo isset($monthly_amount) ? $monthly_amount :'' ?>" required>
			</div>
			
		</div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>
