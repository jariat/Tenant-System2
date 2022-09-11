@extends('houses.layout')
 

<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
</x-slot>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('order.create')}}">New Order</a>
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
            <th class="">Tenant name</th>
			<th class="">Username</th>
            <th class="">Contract name</th>
            <th class="">House name</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($tenants as $tenant)
        
       
        
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $tenant->tenantname}}</td>
            
            <td>@foreach ($users as $user) {{ $user->username}} @endforeach</td>
            
            
            <td>@foreach ($contracts as $contract) {{ $contract->contractname}} @endforeach</td>
            
           
            <td>@foreach ($houses as $house) {{ $house->housename}}  @endforeach</td>
            
            <td>
                <form action="#" method="POST">
   
                    <a class="btn btn-info" href="#">Show</a>
    
                    <a class="btn btn-primary" href="#">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        
        
       
        @endforeach
    </table>
</div>
  
{!! $orders->links() !!}
      
</x-app-layout>
</div>
