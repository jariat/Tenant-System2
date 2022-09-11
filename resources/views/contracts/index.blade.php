@extends('tenants.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Contracts') }}
        </h2>
</x-slot>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('contract.create')}}">New Contract</a>
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
            <th class="">Name</th>
            <th class="">Length</th>
			<th class="">Mode of payment</th>
            <th class="">Monthly payment</th>
            <th class="">Penalities</th>
			<th class="">Status</th>
            <th class="">Signature</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contracts as $contract)
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $contract->name}}</td>
            <td>{{ $contract->length}}</td>
            <td>{{ $contract->mode_of_payment}}</td>
            <td>{{ $contract->monthly_payment}}</td>
            <td> {{ $contract->penalities}}</td>
            <td>@if ($contract->status == 0 ) Inactive @endif
            @if ($contract->status == 1 ) Active @endif</td>
            <td>{{ $contract->signature}}</td>
            
            <td>
                <form action="{{ route('contract.destroy',$contract->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('contract.show',$contract->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('contract.edit',$contract->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
{!! $contracts->links() !!}
      
</div>
</x-app-layout>
