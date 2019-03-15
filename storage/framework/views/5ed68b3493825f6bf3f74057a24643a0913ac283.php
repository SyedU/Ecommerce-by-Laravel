<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Purchase Details</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Individual Purchase Order</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-12">
      <?php
        $orders = App\Order::where('sale_id' , $sale->id)->get();
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Product Name</th>
          <th>Product Quantity</th>

        </tr>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(App\Product::find($order->product_id)->product_name); ?></td>
            <td><?php echo e($order->product_quantity); ?></td>

          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>


    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>