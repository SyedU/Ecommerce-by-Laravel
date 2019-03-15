

<h1>Invoice ID : <?php echo e($sale_id); ?> </h1>

<?php
  $orders = App\Order::where('sale_id' , $sale_id)->get();
?>
<table style="border: 1px solid blue" class="table table-bordered">
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
