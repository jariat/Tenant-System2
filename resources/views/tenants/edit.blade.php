@extends('tenants.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tenant') }}
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
  
    <form action="{{ route('tenant.update',$tenant->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="form-group row">
            <div class="col-md-4">
                    <label for="" class="control-label">Lastname</label>
                    <input type="text" name="lastname" value="{{ $tenant->lastname }}" class="form-control" placeholder="Lastname">
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Firstname</label>
                    <input type="text" name="firstname" value="{{ $tenant->firstname }}" class="form-control" placeholder="Firstname">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
				<label for="" class="control-label">Middle Name</label>
				<input type="text" class="form-control" name="middlename"  value="{{ $tenant->middlename }}" placeholder="Middlename">
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
				<input type="text" class="form-control" name="national_id"  value="{{ $tenant->national_id }}" placeholder="national_id">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				<input type="text" class="form-control" name="telephone"  value="{{ $tenant->telephone }}" placeholder="telephone">
			</div>
			
		</div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email"  value="{{ $tenant->email }}" placeholder="email">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Gender</label>
			      <select class="text form-control " name="gender" id="gender">
                              <?php
                              $gender = ['female','male'];
                             foreach($gender as $row)
                                     {
                                         
                                         echo"<option value='{$row}' ";
                                         if($row==$tenant->gender) echo'selected';
                                         echo">{$row}</option>";
                                         }
                               ?>
                 </select></div>
		</div>
        <div class="form-group row">
			
            <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Status</label>
				<select class="text form-control " name="status" id="status">
                              <?php
                              $status = ['single','married'];
                             foreach($status as $row)
                                     {
                                         
                                         echo"<option value='{$row}' ";
                                         if($row==$tenant->status) echo'selected';
                                         echo">{$row}</option>";
                                         }
                               ?>
                 </select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Number of households</label>
				<input type="number" class="form-control" name="number_of_household"  value="{{ $tenant->number_of_household }}" placeholder="number_of_household">
			</div>
			
		</div>
        <div class="form-group row">

        <div class="col-md-4">
				<label for="" class="control-label">Registration Date</label>
				<input type="date" class="form-control" name="registration_date"  value="{{ $tenant->registration_date }}" placeholder="registration_date">
			</div>
			
			<div class="col-md-4">
				<label for="" class="control-label">Exit Date</label>
				<input type="date" class="form-control" name="exit_date"  value="{{ $tenant->exit_date }}" placeholder="exit_date">
			</div>
		</div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>


</x-app-layout>
