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
    <h1 class="page-header">Your Purchase Order</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <th>Sale ID</th>
          <th>Subtotal</th>
          <th>Shipping</th>
          <th>Discount</th>
          <th>Grand Total</th>
          <th>Details</th>
        </thead>
        <?php $__currentLoopData = $purchaseorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($purchaseorder->id); ?></td>
          <td><?php echo e($purchaseorder->cart_subtotal); ?></td>
          <td><?php echo e($purchaseorder->shipping); ?></td>
          <td><?php echo e($purchaseorder->discount); ?></td>
          <td><?php echo e($purchaseorder->grand_total); ?></td>
          <td>
            <a href="<?php echo e(url('purchase/order')); ?>/<?php echo e($purchaseorder->id); ?>">View More</a>
          </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>

    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>