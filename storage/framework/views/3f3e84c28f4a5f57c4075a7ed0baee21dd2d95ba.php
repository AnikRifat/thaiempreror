<?php $__env->startSection('title', 'Confirm Order'); ?>
<?php $__env->startSection('content'); ?>

<style type="text/css">
  .food_price span{font-size:16px;font-weight:700;font-family:'Roboto';}
  .media-top .btn{padding: 5px;font-size: 12px;}
  .confirm_order{max-width: 600px; background: #fff;border: 2px solid #000;padding: 15px;margin: 15px auto;}
  .table{border-collapse: collapse; margin: 0 auto;border:1px solid #000;width: 100%;}
  .table tr th{font-weight: bold;}
  .table tr th, .table tr td{border: 1px solid #ddd;}
  .remove a{background: #f55;color: yellow;display: block;font-weight:bold;text-align: center;}
</style>
<!--====| Contact Us Start |====-->
<section id="contact" class="section-padding contact-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1>Confirm Order</h1>
        <p class="slogan">Please put in your information and confirm order</p>
      </div>

      <?php echo Form::open(['route' => 'home.order_confirm', 'method' => 'POST', 'name' => 'order_confirm', 'onsubmit' => 'return MakeFormValid()']); ?>

      <div class="col-md-12 col-sm-12">
          <?php if(Session::get('_orders')): ?>
        <h2 style="text-align:center">Ordered Items</h2>
        <div class="table-responsive confirm_order">
          <table class="table" id="orders">
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Item Price</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>

            <?php
            $total_price = 0;
            $s = 1;
            ?>
            
            <?php $__currentLoopData = Session::get('_orders'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($s); ?></td>
              <td><?php echo e($order->item_name); ?></td>
              <td style="text-align:right">&pound;<?php echo e($order->item_price); ?></td>
              <td><?php echo e($order->item_qty); ?></td>
              <td style="text-align:right">&pound;<?php echo e(number_format($order->item_qty*$order->item_price, 2)); ?></td>
            </tr>
            <input value="<?php echo e($order->item_id); ?>" type="hidden" name="itemId[]">
            <input value="<?php echo e($order->item_name); ?>" type="hidden" name="itemName[]">
            <input value="<?php echo e($order->item_price); ?>" type="hidden" name="itemPrice[]">
            <input value="<?php echo e($order->item_qty); ?>" type="hidden" name="itemQty[]">
            <input value="<?php echo e(number_format($order->item_qty*$order->item_price, 2)); ?>" type="hidden" name="Price[]">
            <?php
            $total_price += number_format($order->item_qty*$order->item_price, 2);
            $s++;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th colspan="3" style="text-align:right">Total Price = </th>
              <th colspan="2" style="text-align:right">&pound;<?php echo e(number_format($total_price, 2)); ?></th>
            </tr>
            <input value="<?php echo e(number_format($total_price, 2)); ?>" type="hidden" name="total_price">
          </table>
        </div>
        <h3 style="text-align:center"><a class="btn btn-primary" style="padding:5px 10px; font-size:14px;" href="/#food-menu">Edit Order</a></h3>
        <?php else: ?>
        <script type="text/javascript">
        window.location.href = '/';
        </script>
        <?php endif; ?>
        <br>
        <div class="clearfix"></div>
      </div>
      <div class="col-xs-12 col-sm-12">
        <div class="form-wrapper">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <input type="text" class="form-control" name="first_name" placeholder="first name" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="text" class="form-control" name="last_name" placeholder="last name">
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="text" class="form-control" name="primary_phone" placeholder="primary phone number" required id="primary_phone">
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="text" class="form-control" name="secondary_phone" placeholder="secondary phone number">
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="email" class="form-control" name="email" placeholder="e-mail address" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <select class="form-control" name="order_type" required id="order_type">
                  <option value="">--- Order Type ---</option>
                  <option value="HOME DELIVERY">HOME DELIVERY</option>
                  <option value="TAKE AWAY">TAKE AWAY</option>
                </select>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="text" class="form-control required" name="property_no" placeholder="property number and street name">
              </div>              
              <div class="col-xs-12 col-sm-3">
                <input type="text" class="form-control required" name="town_name" placeholder="Town name">
              </div>
              <div class="col-xs-12 col-sm-3">
                <input type="text" class="form-control required" name="post_code" id="post_code" placeholder="post code">
              </div>
              <div class="col-xs-12 col-sm-12">
                <textarea id="message" class="form-control" rows="3" name="details" placeholder="Type your message, such as any special request, Additional direction, landmarks, etc." required></textarea>
              </div>
              <!-- <div class="form-group col-xs-12">
                <div id="mail_success" class="success" style="display:none;">Your message has been sent successfully. </div>
                <div id="mail_fail" class="error" style="display:none;"> Sorry, error occured this time sending your message. </div>
              </div> -->
              <div class="send-button text-center">
                <button class="btn" name="submit" type="submit">submit order</button>
              </div>
            </div>
          </div>
        </div>
      <?php echo Form::close(); ?>

      </div>     
    </div>
  </section>
  <!--====| Contact Us End |====-->
  <script type="text/javascript">
  var order_type = document.getElementById('order_type');
  var required = document.getElementsByClassName('required');
  order_type.addEventListener('change', MakeRequired);
  function MakeRequired(){
    //console.log(order_type);
    for(var i = 0; i < required.length; i++){
      if(order_type.value == 'HOME DELIVERY'){
        required[i].setAttribute('required', 'required');
      } else {
        required[i].removeAttribute('required', 'required');
      }
    }
  }

  //onsubmit check valid mobile number
  function MakeFormValid(){
    var primary_phone = document.forms["order_confirm"]["primary_phone"].value;
    var secondary_phone = document.forms["order_confirm"]["secondary_phone"].value;
    var post_code = document.forms["order_confirm"]["post_code"];
    if (isNaN(primary_phone) || primary_phone.charAt(0) != 0 || primary_phone.length > 11){
      alert("Please input a valid primary phone number with first number 0 and max 11 numbers.");
      return false;
    }

    if (secondary_phone != ''){
      if (isNaN(secondary_phone) || secondary_phone.charAt(0) != 0 || secondary_phone.length > 11){
        alert("Please input a valid secondary phone number with first number 0 and max 11 numbers.");
        return false;
      }
    }

    var uspc = post_code.value.toUpperCase().replace(/^(.{3})(.*)$/, "$1 $2");
    post_code.value = uspc;
  }

  //phone number test valid
  // var primary_phone = document.getElementById('primary_phone');
  // primary_phone.addEventListener('keyup', phonevalidcheck);
  // // primary_phone = primary_phone.value;
  // function phonevalidcheck(){
  //   if(isNaN(primary_phone.value) || primary_phone.value.charAt(0) != 0 || primary_phone.value.length > 11) {
  //     alert('please input a valid phone number \nwith first number 0');
  //   }
  // }

  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>