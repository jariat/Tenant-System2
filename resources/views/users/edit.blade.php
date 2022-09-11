@extends('houses.layout')
   
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
</x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('user.index')}}"> Back</a>
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
  
    <form action="{{ route('user.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="form-group row">
            <div class="col-md-4">
                    <label for="" class="control-label">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="name">
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="username">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
				<label for="" class="control-label">Password</label>
				<input type="text" class="form-control" name="password"  value="{{ $user->password }}">
                
                <!-- @if (isset($user->id)) 
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		 @endif -->
       
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email"  value="{{ $user->email }}" placeholder="email">
			</div>
            
		</div>
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				<input type="text" class="form-control" name="telephone"  value="{{ $user->telephone }}" placeholder="telephone">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">User type</label>
                <select name="usertype" id="usertype" class="custom-select">
				<option value="staff" <?php echo isset($user->usertype) && $user->usertype == 'staff' ? 'selected': '' ?>>Staff</option>
				<option value="admin" <?php echo isset($user->usertype) && $user->usertype == 'admin' ? 'selected': '' ?>>Admin</option>
			</select></div>
		</div>
       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </x-app-layout>
