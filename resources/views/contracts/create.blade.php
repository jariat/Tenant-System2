@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Contract') }}
        </h2>
</x-slot>
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('contract.index')}}"> Back</a>
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
   
<form action="{{ route('contract.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">length</label>
				<input type="text" class="form-control" name="length"  value="<?php echo isset($length) ? $length :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Mode of payment</label>
				<select name="mode_of_payment">
                <option value="none" selected></option>
                <option value="online_payment">Online payment</option>
                <option value="drop-off-location">Drop-off-location</option>
                <option value="property_management_company">Property management company</option>
                <option value="collection_in_person">Collection in person</option>
            </select>
			
        </div>
			
		</div>
        <div class="form-group row">
       
			<div class="col-md-4">
				<label for="" class="control-label">Monthly amount</label>
				<input type="text" class="form-control" name="monthly_payment"  value="<?php echo isset($monthly_payment) ? $monthly_payment :'' ?>" required>
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Penalities</label>
				<input type="text" class="form-control" name="penalities"  value="<?php echo isset($penalities) ? $penalities :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Status</label>
                <select name="status" id="status" class="custom-select">
				<option value="0" <?php echo isset($status) && $status == '0' ? 'selected': '' ?>>Inactive</option>
				<option value="1" <?php echo isset($status) && $status == '1' ? 'selected': '' ?>>Active</option>
			</select>
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Signature</label>
				<input type="text" class="form-control" name="signature"  value="<?php echo isset($signature) ? $signature :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
			
            <div class="col-md-4">
				<label for="" class="control-label">Contract name</label>
				<input type="text" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
			</div>
			
		</div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>
