@extends('houses.layout')
<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contract') }}
        </h2>
</x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('contract.index')}}"> Back</a>
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
  
    <form action="{{ route('contract.update',$contract->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="form-group row">
            <div class="col-md-4">
                    <label for="" class="control-label">Length</label>
                    <input type="text" name="length" value="{{ $contract->length }}" class="form-control" placeholder="length">
                </div>
                <div class="col-md-4">
                    <label for="" class="control-label">Mode of payment</label>
                    <input type="text" name="mode_of_payment" value="{{ $contract->mode_of_payment }}" class="form-control" placeholder="mode_of_payment">
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
				<label for="" class="control-label">Monthly payment</label>
				<input type="text" class="form-control" name="monthly_payment"  value="{{ $contract->monthly_payment }}" placeholder="monthly_payment">
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Penalities</label>
				<input type="text" class="form-control" name="penalities"  value="{{ $contract->penalities }}" placeholder="penalities">
			</div>
		</div>
        </div>
        <div class="form-group row">
			<div class="col-md-4">
				<label for="" class="control-label">Status</label>
                <select name="status" id="status" class="custom-select">
				<option value="0" <?php echo isset($contract->status) && $contract->status == '0' ? 'selected': '' ?>>Inactive</option>
				<option value="1" <?php echo isset($contract->status) && $contract->status == '1' ? 'selected': '' ?>>Active</option>
			</select>
			</div>
            <div class="col-md-4">
				<label for="" class="control-label">Signature</label>
				<input type="text" class="form-control" name="signature"  value="{{ $contract->signature }}" placeholder="signature">
			</div>  			
		</div>
       
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</x-app-layout>
