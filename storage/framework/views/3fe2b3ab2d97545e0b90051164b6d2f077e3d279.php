<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Purchase</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Your Statistics</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">

    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
              Total Purchase
              </div>

              <div class="panel-body">


                <h1><?php echo e($total_sale); ?></h1>

              </div>
          </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
              Total Product Purchase
              </div>

              <div class="panel-body">
                <h1><?php echo e($total_products); ?></h1>
              </div>
          </div>
    </div>




  </div>

  <!--/.row-->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>