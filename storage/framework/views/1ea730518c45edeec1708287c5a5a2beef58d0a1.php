<?php $__env->startSection('Add Testimonial-Page'); ?>
  active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Testimonial</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Testimonial</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Testimonial list ( <?php echo e(App\Testimonial::count()); ?> )
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>


                      <th>Sl.No.</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Description</th>
                      <th>Signature</th>
                      <th>Created At</th>

                    </thead>

                    <?php
                      $flag=1;
                    ?>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($flag++); ?></td>
                      <td><?php echo e($testimonial->testimonial_name); ?></td>
                      <td><?php echo e($testimonial->testimonial_designation); ?></td>
                      <td><?php echo e($testimonial->testimonial_description); ?></td>
                      <td><?php echo e($testimonial->testimonial_signature); ?></td>
                      <td><?php echo e($testimonial->created_at->format('d-m-y h:i:s a')); ?> <br><?php echo e($testimonial->created_at->diffforhumans()); ?> </td>

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

              Add Testimonial</div>

              <div class="panel-body">
                <form action="<?php echo e(url('/testimonial/insert')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>

                  <div class="form-group">
                  <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="testimonial_name" value="<?php echo e(old('testimonial_name')); ?>">


                  </div>

                  <div class="form-group">
                  <label>Designation</label>
                    <input type="text" class="form-control" placeholder="Enter Designation" name="testimonial_designation" value="<?php echo e(old('testimonial_designation')); ?>">

                  </div>


                  <div class="form-group">
                  <label>Description</label>
                    <input type="text" class="form-control" placeholder="Enter Description" name="testimonial_description" value="<?php echo e(old('testimonial_description')); ?>">

                  </div>

                  <div class="form-group">
                  <label>Signature</label>
                    <input type="text" class="form-control" placeholder="Enter Signature" name="testimonial_signature" value="<?php echo e(old('testimonial_signature')); ?>">

                  </div>

                  <div class="form-group">
                  <label>Person image</label>
                    <input type="file" class="form-control" name="testimonial_image">

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