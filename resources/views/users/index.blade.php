@extends('houses.layout')
 
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
</x-slot>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('user.create')}}">New User</a>
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
			<th class="">Username</th>
            <th class="">Email</th>
            <th class="">Telephone</th>
			<th class="">User type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$k }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->username}}</td>
            <td>{{ $user->email}}</td>
            <td> {{ $user->telephone}}</td>
            <td>{{ $user->usertype}}</td>
            
            <td>
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{route('user.show',$user->id)}}">Show</a>
    
                    <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
{!! $users->links() !!}
      
</x-app-layout>
</div>
