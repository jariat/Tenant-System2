@extends('tenants.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Tenant') }}
        </h2>
</x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('tenant.index')}}"> Back</a>
            </div>
        </div>
    </div>
  
    <div class="row card">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lastname:</strong>
                {{ $tenant->lastname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Firstname:</strong>
                {{ $tenant->firstname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Middlename:</strong>
                {{ $tenant->middlename }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>HouseID:</strong>
                @foreach($tenants as $tenantx)
                {{ $tenantx->name}}
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>National ID:</strong>
                {{ $tenant->national_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact:</strong>
                {{ $tenant->telephone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $tenant->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                {{ $tenant->gender }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $tenant->status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Registration date:</strong>
                {{ $tenant->registration_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Exit date:</strong>
                {{ $tenant->exit_date }}
            </div>
        </div>
       
    </div>

</x-app-layout>
