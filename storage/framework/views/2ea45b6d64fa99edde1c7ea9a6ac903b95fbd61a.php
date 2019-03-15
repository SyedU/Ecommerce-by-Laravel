<?php $__env->startSection('Add Coupon-Page'); ?>
  active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Coupon</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Coupon</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Coupon List
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>

                      <th>Coupon</th>
                      <th>Percentage(%)</th>

                    </thead>


                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                      <td><?php echo e($coupon->coupon); ?></td>
                      <td><?php echo e($coupon->percentage); ?>%</td>

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

              Add Coupon</div>

              <div class="panel-body">
                <form action="<?php echo e(url('/coupon/insert')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                  <label>Percentage</label>
                    <input type="number" class="form-control" placeholder="Enter Percentage" name="percentage" value="<?php echo e(old('percentage')); ?>">

                    <?php if($errors->has('percentage')): ?>

                            <strong style="color:red"><?php echo e($errors->first('percentage')); ?></strong>
                        </span>
                    <?php endif; ?>

                  </div>

                  

                  

                  <button type="submit" class="btn btn-primary">Add Coupon</button>
                </form>

              </div>
          </div>

    </div>
  </div>

  <!--/.row-->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>