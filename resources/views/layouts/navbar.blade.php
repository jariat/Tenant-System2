
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo 'hi' ?>) !important*/
	}
</style>
<head>
	    <!-- Fonts -->
		<title>{{ config('app.name', 'Laravel') }}</title>
		<!--<link href="/css/app.css" rel="stylesheet">-->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}" defer></script>

		<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
</head>
<h1 class ='bg-red'> Tenant Management system </h1>
<nav id="sidebar" class='navbar-nav mr-auto mt-0 my-3 mt-lg-0 bg-dark' >
		
		<div class="sidebar-list">
				<a href="{{route('dashboards.index')}}" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-dashboard fa-fw"></i></span> Dashboard</a>
				<a href="{{route('contract.index')}}" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-th-list "></i></span> Contract</a>
				<a href="{{route('house.index')}}" class="nav-item nav-houses"><span class='icon-field'><i class="fa fa-home "></i></span> Houses</a>
				<a href="{{route('tenant.index')}}" class="nav-item nav-tenants"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Tenants</a>
				<a href="{{route('payment.index')}}" class="nav-item nav-invoices"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> Payments</a>
				<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Reports</a>
				<?php //if($_SESSION['login_type'] == 1): ?>
				<a href="{{route('user.index')}}" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Users</a>
			    <a href="{{route('order.index')}}" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> Orders</a> 
			<?php //endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
