
@extends('houses.layout')

<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
</x-slot>

<div class="container">
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('house.create')}}">New House</a>
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
			<th class="">Description</th>
            <th class="">Location</th>
            <th class="">Status</th>
			<th class="">Monthly Rate</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($houses as $house)
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $house->name}}</td>
            <td>{{ $house->features}}</td>
            <td>{{ $house->location}}</td>
            <td> @if ($house->occupied == 0 ) Not occupied @endif
            @if ($house->occupied == 1 ) Occupied @endif</td>
            <td>{{ $house->monthly_amount}}</td>
            
            <td>
                <form action="{{ route('house.destroy',$house->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('house.show',$house->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('house.edit',$house->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
  
{!! $houses->links() !!}
      
</div>
</x-app-layout>

