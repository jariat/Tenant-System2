@extends('houses.layout')
  
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Payment') }}
        </h2>
</x-slot>
<div class="row">
    <div class="col-lg-12 margin-tb">
       
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('payment.index')}}"> Back</a>
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
   
<form action="{{ route('payment.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Tenant</label>
                <select name="tenant_id"  class="form-control">
                  
                
                    @foreach($tenants as $tenant)
                         
                    <option value="{{ $tenant->id }}">  {{ $tenant->firstname }} {{ $tenant->lastname }} {{ $tenant->middlename }}</option>
                        

                       
                        
                    @endforeach       
    </select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Invoice</label>
				<input type="text" class="form-control" name="invoice"  value="<?php echo isset($invoice) ? $invoice :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">Payment date</label>
				<input type="date" class="form-control" name="payment_date"  value="<?php echo isset($payment_date) ? $payment_date :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Mode of payment</label>
				<select name="mode_of_payment" class="form-control">
                <option value="none" selected></option>
                <option value="online_payment">Online payment</option>
                <option value="drop-off-location">Drop-off-location</option>
                <option value="property_management_company">Property management company</option>
                <option value="collection_in_person">Collection in person</option>
            </select>
			
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Amount paid</label>
				<input type="number" class="form-control" name="paid_amount"  value="<?php echo isset($paid_amount) ? $paid_amount :'' ?>" required>
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Received by</label>
				<input type="text" class="form-control" name="received_by"  value="<?php echo isset($received_by) ? $received_by :'' ?>" required>
			</div>
			
		</div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>
