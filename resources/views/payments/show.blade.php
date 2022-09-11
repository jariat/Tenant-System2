@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Payment') }}
        </h2>
</x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('payment.index')}}"> Back</a>
            </div>
        </div>
    </div>
    @foreach ($payments as $payment)
   
    <div class="row card">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment date:</strong>
                     {{ $payment->payment_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tenant:</strong>
                {{ $payment->firstname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invoice:</strong>
                {{ $payment->invoice }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mode of payment:</strong>
                {{ $payment->mode_of_payment }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount paid:</strong>
                {{ $payment->paid_amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Received by:</strong>
                {{ $payment->received_by }}
            </div>
        </div>
        @endforeach   
    </div>
    </x-app-layout>
