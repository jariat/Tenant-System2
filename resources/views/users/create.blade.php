@extends('houses.layout')
 
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
</x-slot>
<div class="row">
    <div class="col-lg-12 margin-tb">
       
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
   
<form action="{{ route('user.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Name</label>
				<input type="text" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Username</label>
				<input type="text" class="form-control" name="username"  value="<?php echo isset($username) ? $username :'' ?>" required>
			</div>
			
		</div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">Password</label>
				<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" required>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email"  value="<?php echo isset($email) ? $email :'' ?>" required>
			</div>
        </div>
        <div class="form-group row">
        <div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				<input type="text" class="form-control" name="telephone"  value="<?php echo isset($telephone) ? $telephone :'' ?>" required>
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">User type</label>
				<select name="usertype" id="usertype" class="custom-select">
				<option value="staff" <?php echo isset($usertype) && $usertype == 'staff' ? 'selected': '' ?>>Staff</option>
				<option value="admin" <?php echo isset($usertype) && $usertype == 'admin' ? 'selected': '' ?>>Admin</option>
			</select>
			
        </div>
			
		</div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</x-app-layout>
