<?php $__env->startSection('Add Banner-Page'); ?>
  active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <ol class="breadcrumb">
    <li><a href="<?php echo e('/home'); ?>">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Banner</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Banner</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Banner list
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>


                      <th>Heading</th>
                      <th>Sub-Heading</th>
                      <th>Details</th>


                    </thead>


                    

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

              Add Banner</div>

              <div class="panel-body">
                <form action="<?php echo e(url('/banner/insert')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                  <label>Heading</label>
                    <input type="text" class="form-control" placeholder="Enter Heading Name" name="heading" value="<?php echo e(old('heading')); ?>">
                  </div>

                  <div class="form-group">
                  <label>Sub Heading</label>
                    <input type="text" class="form-control" placeholder="Enter Sub-Heading Name" name="sub_heading" value="<?php echo e(old('sub_heading')); ?>">
                  </div>


                  <div class="form-group">
                  <label>Details</label>
                    <textarea class="form-control" name="details" value="<?php echo e(old('details')); ?>" ></textarea>
                  </div>

                  <div class="form-group">
                  <label>Banner image</label>
                    <input type="file" class="form-control" name="banner_image">

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