<?php $__env->startSection('Add Product-Page'); ?>
  active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo e('/home'); ?>">
        <em class="fa fa-home"></em>
      </a></li>
      <li><a href="<?php echo e('/add/product'); ?>">
        Add Product
      </a></li>
      <li class="active"><?php echo e($product->product_name); ?></li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Product of <?php echo e($product->product_name); ?></h1>
    </div>
  </div><!--/.row-->


<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="panel panel-success">

              <div class="panel-heading">

                <?php if(session('success')): ?>
                  <div class="alert alert-success">
                  <?php echo e(session('success')); ?>

                  </div>
                <?php endif; ?>

                Edit Product</div>

                <div class="panel-body">
                  <form action="<?php echo e(url('/update/product')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <label>Product Name</label>
                      <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                      <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="<?php echo e($product->product_name); ?>">

                      <?php if($errors->has('product_name')): ?>

                              <strong style="color:red"><?php echo e($errors->first('product_name')); ?></strong>
                          </span>
                      <?php endif; ?>

                    </div>

                    <div class="form-group">
                    <label>Product Description</label>
                      <input type="text" class="form-control" placeholder="Enter Product Detail" name="product_details" value="<?php echo e($product->product_details); ?>">

                      <?php if($errors->has('product_details')): ?>

                              <strong style="color:red"><?php echo e($errors->first('product_details')); ?></strong>
                          </span>
                      <?php endif; ?>

                    </div>

                    <div class="form-group">
                    <label>Product Price</label>
                      <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="<?php echo e($product->product_price); ?>">

                      <?php if($errors->has('product_price')): ?>
                          <strong style="color:red"><?php echo e($errors->first('product_price')); ?></strong>
                          </span>
                      <?php endif; ?>



                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>