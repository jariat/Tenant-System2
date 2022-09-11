@extends('houses.layout')
   
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Payment') }}
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
  
    <form action="{{ route('payment.update',$payment->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="form-group row">
            <div class="col-md-4">
                    <label for="" class="control-label">Tenant</label>
                    <input type="text" name="tenant_id" value="{{ $payment->tenant_id }}" class="form-control" placeholder="tenant_id">
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Invoice</label>
                    <input type="text" name="invoice" value="{{ $payment->invoice }}" class="form-control" placeholder="invoice">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
				<label for="" class="control-label">Payment date</label>
				<input type="date" class="form-control" name="payment_date"  value="{{ $payment->payment_date }}" placeholder="payment_date">
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Mode of payment</label>
			      <select class="text form-control " name="mode_of_payment" id="mode_of_payment">
                              <?php
                              $mode_of_payment = ['online_payment','drop-off-location','property_management_company','collection_in_person'];
                             foreach($mode_of_payment as $row)
                                     {
                                         
                                         echo"<option value='{$row}' ";
                                         if($row==$payment->mode_of_payment) echo'selected';
                                         echo">{$row}</option>";
                                         }
                               ?>
                 </select></div>
		</div>
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Amount paid</label>
				<input type="text" class="form-control" name="paid_amount"  value="{{ $payment->paid_amount }}" placeholder="paid_amount">
			</div>
			
		</div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Received by</label>
				<input type="text" class="form-control" name="received_by"  value="{{ $payment->received_by }}" placeholder="received_by">
			</div>
			
		</div>
       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </x-app-layout>
