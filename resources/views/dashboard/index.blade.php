@extends('houses.layout')

<x-app-layout>

<x-slot name="header">
<h1 class="font-semibold text-xl text-gray-1000 leading-tight">
            {{ __('Dashboard') }}
        </h1>
</x-slot>

<?php //include 'db_connect.php' ?>
<style>
  
</style>

<div class="container-xxl">
        

	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card border-secondary">
                <div class="card-body">
                    <?php// echo "Welcome back ". $_SESSION['login_name']."!"  ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-primary">
                                <div class="card-body bg-primary">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-home "></i></span>
                                        <h4><b>
                                            
                                            <?php
                                            foreach($total_houses as $houses)
                                            { 
                                                echo $houses->no_houses;
                                             } ?>
                                        </b></h4>
                                        <p><b>Total Houses</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="{{route('house.index')}}" class="text-primary float-right">View Houses <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-warning">
                                <div class="card-body bg-warning">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-user-friends "></i></span>
                                        <h4><b>
                                            <?php 
                                            foreach($total_tenants as $tenants)
                                            { 
                                                echo $tenants->no_tenants;
                                             }
                                             ?>
                                        </b></h4>
                                        <p><b>Total Tenants</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="{{route('tenant.index')}}" class="text-primary float-right">View Tenants <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-success">
                                <div class="card-body bg-success">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-file-invoice "></i></span>
                                        <h4><b>
                                            <?php 
                                            /* $payment = $conn->query("SELECT sum(amount) as paid FROM payments where date(date_created) = '".date('Y-m-d')."' "); 
                                             echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'],2) : 0;*/
                                             foreach($total_payments as $payments)
                                            { 
                                                echo $payments->paid > 0 ? number_format($payments->paid,2) : 0;
                                             }
                                             ?>
                                        </b></h4>
                                        <p><b>Payments This Month</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="{{route('payment.index')}}" class="text-primary float-right">View Payments <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>      			
        </div>
    </div>
</div>
<script>
	
</script>
</x-app-layout>
</div>
