@extends('tenants.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Tenant') }}
        </h2>
</x-slot>

<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('tenant.index')}}"> Back</a>
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
   
<form action="{{ route('tenant.store') }}" method="POST">
    @csrf
  <div class ="container-lg">
     <div class="row">
     <div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Last Name</label>
				<input type="text" class="form-control" name="lastname"  value="<?php echo isset($lastname) ? $lastname :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">First Name</label>
				<input type="text" class="form-control" name="firstname"  value="<?php echo isset($firstname) ? $firstname :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">Middle Name</label>
				<input type="text" class="form-control" name="middlename"  value="<?php echo isset($middlename) ? $middlename :'' ?>">
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">House</label>
				<select name="house_id"  class="form-control">
                  
                    @foreach($houses as $house)
                         
                    <option value="{{ $house->id }}">  {{ $house->name }} </option>
                        
                    @endforeach       
                </select>
			</div>
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">National ID</label>
				<input type="text" class="form-control" name="national_id"  value="<?php echo isset($national_id) ? $national_id :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				<input type="text" class="form-control" name="telephone"  value="<?php echo isset($telephone) ? $telephone :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email"  value="<?php echo isset($email) ? $email :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Gender</label>
				<select name="gender">
                <option value="none" selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">other</option>
            </select>
			</div>
		</div>
        <div class="form-group row">
			
            <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Status</label>
				<select name="status">
                <option value="none" selected>Status</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
            </select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Number of households</label>
				<input type="number" class="form-control" name="number_of_household"  value="<?php echo isset($number_of_household) ? $number_of_household :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">

        <div class="col-md-4">
				<label for="" class="control-label">Registration Date</label>
				<input type="date" class="form-control" name="registration_date"  value="<?php echo isset($registration_date) ? date("Y-m-d",strtotime($registration_date)) :'' ?>" required>
			</div>
			
			<div class="col-md-4">
				<label for="" class="control-label">Exit Date</label>
				<input type="date" class="form-control" name="exit_date"  value="<?php echo isset($exit_date) ? date("Y-m-d",strtotime($exit_date)) :'' ?>">
			</div>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</form>

</x-app-layout>
