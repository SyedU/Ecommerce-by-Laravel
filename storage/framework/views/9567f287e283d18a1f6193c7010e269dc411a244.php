<?php $__env->startSection('Add Product-Page'); ?>
  active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Product</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Product</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Product list ( <?php echo e(App\Product::count()); ?> )
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <th>Alert Product</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Product Quantity</th>
                      <th>Product Price</th>
                      <th>Photo</th>
                      <th>Created At</th>
                      <th>Last Updated At</th>
                      <th>Action</th>
                    </thead>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php if(2 * $product->alert_quantity < $product->product_quantity): ?>
                          <span style="background-color:green; padding: 5px 20px 5px 20px; border-radius: 5px"></span>
                        <?php elseif(2* $product->alert_quantity == $product->product_quantity): ?>
                          <span style="background-color:yellow; padding: 5px 20px 5px 20px; border-radius: 5px"></span>
                          <?php else: ?>
                            <span style="background-color:red; padding: 5px 20px 5px 20px; border-radius: 5px"></span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($product->get_category_name->category_name); ?></td>
                      <td><?php echo e($product->product_name); ?></td>
                      <td><?php echo e($product->product_quantity); ?></td>
                      <td><?php echo e($product->product_price); ?></td>
                      
                      <td><a download href="<?php echo e(asset($product->product_image)); ?>" target="_blank"><img width="50" src="<?php echo e(asset($product->product_image)); ?>"</a></td>
                      <td><?php echo e($product->created_at->format('d-m-y h:i:s a')); ?> <br><?php echo e($product->created_at->diffforhumans()); ?> </td>
                      <td><?php echo e($product->updated_at ? $product->updated_at->diffforhumans():"Not Yet"); ?></td>
                      <td>

                        <a class="btn btn-danger" href="<?php echo e(url('delete/product')); ?>/<?php echo e($product->id); ?>"><span style="color:white">Delete</span></a><br><br>
                        <a class="btn btn-danger" href="<?php echo e(url('edit/product')); ?>/<?php echo e($product->id); ?>"><span style="color:white">Edit</span></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </table>
                  <?php echo e($products->links()); ?>



                </div>
          </div>


    </div>
    <div class="col-md-4">


          <div class="panel panel-success">

            <div class="panel-heading">

              <?php if(session('success')): ?>
                <div class="alert alert-success">
                <?php echo e(session('success')); ?>

                </div>
              <?php endif; ?>

              Add Product</div>

              <div class="panel-body">
                <form action="<?php echo e(url('/product/insert')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>

                  <div class="form-group">
                  <label>Category Name</label>
                    <select class="form-control" name="category_id">
                      <option value="">-Select One -</option>
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>



                  <div class="form-group">
                  <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="<?php echo e(old('product_name')); ?>">

                    <?php if($errors->has('product_name')): ?>

                            <strong style="color:red"><?php echo e($errors->first('product_name')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                  <label>Product Details</label>
                    <textarea class="form-control" name="product_details"><?php echo e(old('product_details')); ?></textarea>

                    <?php if($errors->has('product_details')): ?>

                            <strong style="color:red"><?php echo e($errors->first('product_details')); ?></strong>
                        </span>
                    <?php endif; ?>

                  </div>

                  <div class="form-group">
                  <label>Product Price</label>
                    <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="<?php echo e(old('product_price')); ?>">

                    <?php if($errors->has('product_price')): ?>
                        <strong style="color:red"><?php echo e($errors->first('product_price')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>


                  <div class="form-group">
                  <label>Product Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter Product Quantity" name="product_quantity" value="<?php echo e(old('product_quantity')); ?>">

                    <?php if($errors->has('product_quantity')): ?>
                        <strong style="color:red"><?php echo e($errors->first('product_quantity')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>


                  <div class="form-group">
                  <label>Alert Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter Alert Quantity" name="alert_quantity" value="<?php echo e(old('alert_quantity')); ?>">

                    <?php if($errors->has('alert_quantity')): ?>
                        <strong style="color:red"><?php echo e($errors->first('alert_quantity')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>


                  <div class="form-group">
                  <label>Product image</label>
                    <input type="file" class="form-control" name="product_image">

                  </div>






                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
          </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

        <div class="panel panel-info">

            <div class="panel-heading">

              Restore Product list
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>


                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Details</th>
                      <th>Product Quantity</th>
                      <th>Alert Quantity</th>
                      <th>Created At</th>
                      <th>Last Updated At</th>
                      <th>Action</th>
                    </thead>
                    <?php $__currentLoopData = $deleted_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deleted_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                      <td><?php echo e($deleted_product->get_category_name->category_name); ?></td>
                      <td><?php echo e($deleted_product->product_name); ?></td>
                      <td><?php echo e($deleted_product->product_price); ?></td>
                      <td><?php echo e($deleted_product->product_details); ?></td>
                      <td><?php echo e($deleted_product->product_quantity); ?></td>
                      <td><?php echo e($deleted_product->alert_quantity); ?></td>

                      <td><?php echo e($deleted_product->created_at->format('d-m-y h:i:s a')); ?> <br><?php echo e($product->created_at->diffforhumans()); ?> </td>
                      <td><?php echo e($deleted_product->updated_at ? $deleted_product->updated_at->diffforhumans():"Not Yet"); ?></td>
                      <td>

                        <a class="btn btn-success" href="<?php echo e(url('restore/product')); ?>/<?php echo e($deleted_product->id); ?>"><span style="color:white">Restore</span></a><br><br>

                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </table>
                  <?php echo e($products->links()); ?>



                </div>
          </div>


    </div>

  </div>
  <!--/.row-->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>