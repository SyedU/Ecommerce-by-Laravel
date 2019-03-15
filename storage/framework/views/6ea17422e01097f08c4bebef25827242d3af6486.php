<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link href="<?php echo e(asset('dashboard_assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('dashboard_assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('dashboard_assets/css/datepicker3.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('dashboard_assets/css/styles.css')); ?>" rel="stylesheet">
	<!--Custom Font-->
	<link href="<?php echo e(asset('dashboard_assets/css/font.css')); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php echo $__env->yieldContent('Dashboard-Page'); ?>"><a href="<?php echo e(url('/home')); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			
			
			
			
			

			<?php if(Auth::user()->user_type == 1): ?>

				<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Home <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li><a class="<?php echo $__env->yieldContent('Add Banner-Page'); ?>" href="<?php echo e(url('add/banner')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Banner
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Product-Page'); ?>" href="<?php echo e(url('add/product')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Products
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Category-Page'); ?>" href="<?php echo e(url('add/category')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Category
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Testimonial-Page'); ?>" href="<?php echo e(url('add/testimonial')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Testimonial
						</a></li>
					</ul>
				</li>

				<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
					<em class="fa fa-navicon">&nbsp;</em> About <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-2">
						<li><a class="<?php echo $__env->yieldContent('Add Banner-Page'); ?>" href="<?php echo e(url('add/banner')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Banner
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Product-Page'); ?>" href="<?php echo e(url('add/product')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Products
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Category-Page'); ?>" href="<?php echo e(url('add/category')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Category
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Testimonial-Page'); ?>" href="<?php echo e(url('add/testimonial')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Testimonial
						</a></li>
					</ul>
				</li>

				<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
					<em class="fa fa-navicon">&nbsp;</em> Shop <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-3">
						<li><a class="<?php echo $__env->yieldContent('Add Banner-Page'); ?>" href="<?php echo e(url('add/banner')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Banner
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Product-Page'); ?>" href="<?php echo e(url('add/product')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Products
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Category-Page'); ?>" href="<?php echo e(url('add/category')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Category
						</a></li>
						<li><a class="<?php echo $__env->yieldContent('Add Testimonial-Page'); ?>" href="<?php echo e(url('add/testimonial')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Testimonial
						</a></li>
					</ul>
				</li>

				<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
					<em class="fa fa-navicon">&nbsp;</em> Pages <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-4">
						<li><a class="<?php echo $__env->yieldContent('Add Coupon-Page'); ?>" href="<?php echo e(url('add/coupon')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Coupon
						</a></li>
						<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
						</a></li>
						<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
						</a></li>
					</ul>
				</li>

				<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
					<em class="fa fa-navicon">&nbsp;</em> Contact <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-5">
						<li><a class="<?php echo $__env->yieldContent('Add Coupon-Page'); ?>" href="<?php echo e(url('add/coupon')); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Add Coupon
						</a></li>
						<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
						</a></li>
						<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
						</a></li>
					</ul>
				</li>

			<?php else: ?>
				<li class=""><a href="<?php echo e(url('purchase/order')); ?>"><em class="fa fa-plus">&nbsp;</em>Your Purchase Order</a></li>
			<?php endif; ?>



			<li><a href="<?php echo e(url('/')); ?>" target="_blank"><em class="fa fa-globe">&nbsp;</em> Visit Website</a></li>
			<li><a href="<?php echo e(route('logout')); ?>"
				 onclick="event.preventDefault();
				 document.getElementById('logout-form').submit();"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
				 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
				 <?php echo csrf_field(); ?>
				</form>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php echo $__env->yieldContent('content'); ?>


	</div>	<!--/.main-->

	<script src="<?php echo e(asset('dashboard_assets/js/jquery-1.11.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/chart-data.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/easypiechart.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/easypiechart-data.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/bootstrap-datepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard_assets/js/custom.js')); ?>"></script>
	<script>
	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
		});
	};
	</script>

</body>
</html>
