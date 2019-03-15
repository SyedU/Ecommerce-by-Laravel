<?php $__env->startSection('content'); ?>
  <!-- Shopping Cart Start -->
      <section id="card">
          <div class="container">
              <div class="row">
                <?php if(session('status')): ?>
                  <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                  </div>
                <?php endif; ?>
                  <div class="col-md-9">
                      <div class="cart-info">
                          <table class="table table-striped table-hover table-bordered">
                              <tbody>
                                  <tr>
                                      <th class="tl">Product & Color</th>
                                      <th>Unit Price</th>
                                      <th>Quantity</th>
                                      <th>Total Price</th>
                                      <th>Remove Item</th>
                                  </tr>
                                  <?php
                                    $cart_subtotal = 0;
                                    $shipping = 15;
                                    $discount = 5;
                                  ?>

                                  <form action="<?php echo e(url('update/cart')); ?>" method="post">
                                  <?php echo csrf_field(); ?>


                                  <?php $__empty_1 = true; $__currentLoopData = $cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                  <tr>

                                      <td>
                                          <div class="col-md-12 pl">
                                              <div class="col-md-3 pl">
                                                  <img src="<?php echo e(asset($cart_product->get_product_info->product_image)); ?>" alt="cart1" class="img-responsive">
                                              </div>
                                              <div class="col-md-9 pro-info pl text-left">
                                                  <h3><?php echo e($cart_product->get_product_info->product_name); ?></h3>
                                                  <p>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star-half"></i>
                                                  </p>

                                              </div>
                                          </div>
                                      </td>
                                      <td>$<?php echo e($cart_product->get_product_info->product_price); ?></td>
                                      <td>
                                          <div class="quantity">
                                              <div class="handle-counter" id="handleCounter<?php echo e($cart_product->id); ?>">
                                                  <div class="input">
                                                      <input type="text" value="<?php echo e($cart_product->product_quantity); ?>" name="nir[<?php echo e($cart_product->id); ?>]">
                                                  </div>
                                                  <div class="click">
                                                      <a class="counter-plus btn btn-primary">+</a>
                                                      <a class="counter-minus btn btn-primary">-</a>
                                                  </div>
                                                  <div class="clearfix"></div>
                                                  <?php
                                                    $flag = 0;
                                                  ?>
                                                  <?php if($cart_product->get_product_info->product_quantity < $cart_product->product_quantity): ?>
                                                    <h4>Not Enough; We have :<?php echo e($cart_product->get_product_info->product_quantity); ?></h4>
                                                    <?php
                                                      $flag = 1;
                                                    ?>
                                                  <?php endif; ?>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                        <?php
                                          $cart_subtotal =+ $cart_subtotal + ($cart_product->get_product_info->product_price * $cart_product->product_quantity);
                                        ?>

                                        $<?php echo e($cart_product->get_product_info->product_price * $cart_product->product_quantity); ?>

                                      </td>
                                      <td><a href="<?php echo e(url('cart/delete')); ?>/<?php echo e($cart_product->id); ?>"><i class="fa fa-trash-o"></i></a></td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                  <tr>
                                    <td colspan="5"><h3>No Products to show</h3></td>
                                    <?php
                                      $flag = 1;
                                    ?>
                                  </tr>


                                <?php endif; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="cart-total">
                          <h2>Have a coupon?</h2>
                          <div class="input-group">

                          <?php if(isset($coupon_by_user)): ?>
                            <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user" value="<?php echo e($coupon_by_user); ?>">
                            <?php else: ?>
                              <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user" value="">
                          <?php endif; ?>

                                  <span class="input-group-btn">
                                      <button class="btn btn-success" type="submit">Add</button>
                                  </span>
                              </div>

                      </div>
                      <div class="total-amount">
                          <ul>
                              <li>
                                  <h3>Cart Total</h3>
                              </li>
                              <li><span>Cart Subtotal</span>
                                <a href="#">
                                  $ <?php echo e($cart_subtotal); ?>

                                  <input type="hidden" name="cart_subtotal" value="<?php echo e($cart_subtotal); ?>">
                                </a></li>
                              <li><span>(+) Shipping</span>
                                <a href="#">
                                  $ <?php echo e($shipping); ?>

                                  <input type="hidden" name="shipping" value="<?php echo e($shipping); ?>">
                                </a></li>
                              <li><span>(-) Discount</span>
                                <a href="#">
                                  $ <?php echo e($discount); ?>

                                  <input type="hidden" name="discount" value="<?php echo e($discount); ?>">
                                </a></li>
                              <li><span>Grand Total</span>
                                <a href="#">
                              $<?php echo e(($cart_subtotal + $shipping) - $discount); ?>

                              <input type="hidden" name="grand_total" value="<?php echo e(($cart_subtotal + $shipping) - $discount); ?>">
                              </a></li>
                              <?php if(isset($coupon_amount)): ?>


                              <?php
                                $grand_total = ($cart_subtotal + $shipping) - $discount;
                                $coupon_discount = ($grand_total * $coupon_amount)/100;
                                $after_coupon_discount = $grand_total - $coupon_discount;

                              ?>
                              <li><span>(-) Coupon Discount</span>
                                <a href="#">
                                  <?php echo e($coupon_amount); ?>%
                                  <input type="hidden" name="coupon_amount" value="<?php echo e($coupon_amount); ?>">
                                </a></li>
                              <li><span>(-)After Coupon Discount</span>
                                <a href="#">$<?php echo e($after_coupon_discount); ?>

                                  <input type="hidden" name="after_coupon_discount" value="<?php echo e($after_coupon_discount); ?>">
                                </a></li>
                              <?php endif; ?>
                          </ul>
                      </div>

                      <div class="proceed">
                          <button name="update_cart" value="update_cart" class="btn btn-primary">update cart</button>
                          <?php if($flag == 0): ?>
                          <button name="proceed_btn" value="proceed_btn" class="btn btn-primary">proceed</button>
                        <?php endif; ?>

                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Shopping Cart End -->

      <!-- Brand Start -->
      <section id="brand">
          <i class="fa fa-chevron-left prv-arrow4"></i>
          <i class="fa fa-chevron-right nxt-arrow4"></i>
          <div class="container">
              <div class="row">
                  <div class="brand-slider">
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand2.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand1.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand3.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand4.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand5.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                      <div class="col-md-2">
                          <a href="#">
                              <div class="brand-item">
                                  <img src="images/brand3.png" alt="brand" class="img-responsive">
                              </div>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Brand End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <script>
        $(function($) {
            var options = {
                minimum: 1,
                maximize: 100,
                onChange: valChanged,
                onMinimum: function(e) {
                    console.log('reached minimum: ' + e)
                },
                onMaximize: function(e) {
                    console.log('reached maximize' + e)
                }
            }
            <?php $__currentLoopData = $cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $('#handleCounter<?php echo e($cart_product->id); ?>').handleCounter(options)
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        })

        function valChanged(d) {
            //            console.log(d)
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>