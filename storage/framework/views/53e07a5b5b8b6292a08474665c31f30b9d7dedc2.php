<?php $__env->startSection('Add Category-Page'); ?>
  active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Category</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Category</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Category list ( <?php echo e(App\Category::count()); ?> )
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>

                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Created At</th>
                      <th>Last Updated At</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>

                    <?php
                      $flag=1;
                    ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($flag++); ?></td>
                      <td><?php echo e($category->category_name); ?></td>
                      <td><?php echo e($category->created_at->format('d-m-y h:i:s a')); ?> <br><?php echo e($category->created_at->diffforhumans()); ?> </td>
                      <td><?php echo e($category->updated_at ? $category->updated_at->diffforhumans():"Not Yet"); ?></td>
                      <td>

                        <?php if($category->status == 1): ?>
                          <span style="background:green; color:white; padding: 5px; border-radius: 3px;">Active</span>

                        <?php else: ?>
                          <span style="background:red; color:white; padding: 5px; border-radius: 3px;">Deactive</span>
                        <?php endif; ?>
                      </td>
                      <td>

                        <a class="btn btn-sm btn-warning" href="<?php echo e(url('change/status/category')); ?>/<?php echo e($category->id); ?>"><span style="color:white">Change Status</span></a><br><br>

                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </table>



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

              Add Category</div>

              <div class="panel-body">
                <form action="<?php echo e(url('/category/insert')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                  <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="<?php echo e(old('category_name')); ?>">

                    <?php if($errors->has('category_name')): ?>

                            <strong style="color:red"><?php echo e($errors->first('category_name')); ?></strong>
                        </span>
                    <?php endif; ?>

                  </div>

                  

                  

                  <button type="submit" class="btn btn-primary">Add</button>
                </form>

              </div>
          </div>

    </div>
  </div>

  <!--/.row-->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>