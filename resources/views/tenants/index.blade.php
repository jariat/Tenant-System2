@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
</x-slot>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('tenant.create')}}"> New Tenant</a>
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
			<th class="">Number of household</th>
            <th class="">House Rented</th>
			<th class="">Monthly Rate</th>
            <th class="">Contact</th>
            <th class="">Registration date</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($tenants as $tenant)
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $tenant->lastname }} {{ $tenant->firstname }} {{ $tenant->middlename }}</td>
            <td>{{ $tenant->number_of_household}}</td>
            <td>{{ $tenant->name}}</td>
            <td>{{ $tenant->monthly_amount}}</td>
            <td>{{ $tenant->telephone}}</td>
            <td>{{ $tenant->registration_date}}</td>
            
            <td>
                <form action="{{ route('tenant.destroy',$tenant->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('tenant.show',$tenant->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('tenant.edit',$tenant->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
    {!! $tenantsx->links() !!}
      

</div>
</x-app-layout>
