@extends('houses.layout')
 
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
</x-slot>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('payment.create')}}">New Payment</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th class="">Date of payment</th>
			<th class="">Tenant</th>
            <th class="">Invoice</th>
            <th class="">Mode of payment</th>
			<th class="">Outstanding balance</th>
            <th class="">Amount paid</th>
            <th class="">Recieved by</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($payments as $payment)
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $payment->payment_date}}</td>
            <td>{{ $payment->firstname}}</td>
            <td>{{ $payment->invoice}}</td>
            <td>{{ $payment->mode_of_payment}}</td>
            <td></td>
            <td>{{ $payment->paid_amount}}</td>
            <td>{{ $payment->received_by}}</td>
            
            <td>
                <form action="{{ route('payment.destroy',$payment->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('payment.show',$payment->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('payment.edit',$payment->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
{!! $paymentsx->links() !!}
      

</x-app-layout>
</div>
