@extends('houses.layout')
  
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new order') }}
        </h2>
</x-slot>
<div class="row">
    <div class="col-lg-12 margin-tb">
       
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('order.index')}}"> Back</a>
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
   
<form action="{{ route('order.store') }}" method="POST">
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
				<label for="" class="control-label">User</label>
				<select name="user_id"  class="form-control">
                  
                    @foreach($users as $user)
                         
                    <option value="{{ $user->id }}">  {{ $user->email }}</option>
                      
                    @endforeach       
               </select>
			</div>
			
		</div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">contract</label>
				<select name="contract_id"  class="form-control">
                  
                    @foreach($contracts as $contract)
                         
                    <option value="{{ $contract->id }}">  {{ $contract->name }}</option>
                      
                    @endforeach       
               </select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">House</label>
				<select name="house_id"  class="form-control">
                  
                    @foreach($houses as $house)
                         
                    <option value="{{ $house->id }}">  {{ $house->name }}</option>
                      
                    @endforeach       
               </select>
			
            </div>
        
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>
