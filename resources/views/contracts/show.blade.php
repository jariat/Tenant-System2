@extends('tenants.layout')
<x-app-layout>
<x-slot name="header">

</x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Contract</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('contract.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row card">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Length:</strong>
                     {{ $contract->length }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mode of payment:</strong>
                {{ $contract->mode_of_payment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monthly payment:</strong>
                {{ $contract->monthly_payment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penalities:</strong>
                {{ $contract->penalities }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if ($contract->status == 0 ) Inactive @endif
            @if ($contract->status == 1 ) Active @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Signature:</strong>
                {{ $contract->signature }}
            </div>
        </div>
       
    </div>
</x-app-layout>

