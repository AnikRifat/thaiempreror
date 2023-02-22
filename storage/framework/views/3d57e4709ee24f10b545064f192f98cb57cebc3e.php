<?php $__env->startSection('title', 'Place Order'); ?>
<?php $__env->startSection('content'); ?>

<style type="text/css">
  .sub-cats li{padding-left: 15px;border-left: 1px solid #eee}
  .sub-cats li .active{color: #d00;}
  .sub-cats li a:hover{color: #d00;}
  .quantity{margin-bottom: 10px;}
  .quantity input[type="button"] {padding: 0;font-size: 12px;font-weight: bold;width: 20px}
  .ItemCat{display: block}
  .ItemCat a{color: #f00;font-size: 18px; }
  .ItemSubCat a{color: #d00;font-size: 16px; padding-left: 15px}
  a.addordr{font-size: 14px;border: 1px solid #f00;padding:5px;}
  .total_table td:last-child{text-align: right;}
  .orders td{padding:5px;}
  .orders td:last-child{text-align: right;}
</style>


  <section id="food-menu" class="galleri-wrapper food-menu-wrapper section-padding" style="background:#fff;">
    <div class="container"> 
      <div class="row"> 
        <div class="col-xs-12"> 
          <h1 style="font-size:45px">Food Menu</h1> 
          <p class="slogan">All our food are made freshly to be healthy.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-3 sidebar-menu">
          <div class="gallery-trigger">
            <ul id="_filter">
             <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li><a name="<?php echo e('cat'.$cat->id); ?>" onclick="showCat(this)" id="CatItem"><?php echo e($cat->cat_name); ?></a>
             <?php if(count(App\FoodSubCat::where('cat_id', $cat->id)->get()) > 0): ?>
             <ul style="display:none" class="subCat sub-cats">
              <?php $__currentLoopData = App\FoodSubCat::where('cat_id', $cat->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li><a onClick="showSubCat(this);" name="<?php echo e($cat->id.'subcat'.$subcat->id); ?>"><?php echo e($subcat->sub_cat_name); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
             <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </li>
            </ul> 
          </div>
        </div>

        <div class="col-md-6 col-sm-6">          
      <div class="gallery-items">
        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
       <div class="ItemCat" id="<?php echo e('cat'.$cat->id); ?>">
        <a href="#" class="cat_name"><?php echo e($cat->cat_name); ?></a>
        <!-- portfolio-item -->
        <?php $subcats = DB::table('food_sub_cats')->where('cat_id', $cat->id)->get(); ?>
        <?php if(count($subcats) > 0): ?>
          
          <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="clearfix"></div>
          <div class="ItemSubCat" id="<?php echo e($cat->id.'subcat'.$subcat->id); ?>"> <!--sub-cat-block-->
            <a href="#"><?php echo e($subcat->sub_cat_name); ?></a>
            <hr class="clearfix">
            <?php $__currentLoopData = DB::table('food_items')->orderBy('for_web', 'DESC')->where('sub_cat_id', $subcat->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portfolio-item col-xs-12" data-groups='["total", "<?php echo e($item->cat_id); ?>"]'>
              <div class="portfolio">
                <div class="media menu-media order_item">
                  <div class="media-left media-top">
                    <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                    <div class="item_name"><?php echo e($item->food_name); ?> </div>
                    <?php if($item->details): ?>
                    <br>
                    <div><?php echo e($item->details); ?></div>
                    <?php endif; ?>
                  </div><!-- media left-->
                  <div class="item-media-body">
                    <div class="food_price"><span>&pound;</span><span class="item_price"><?php echo e($item->price); ?></span></div>
                  </div><!--/.media body-->
                  <div class="media-left media-top media-item-price">
                    <a class="addordr">Place Order</a>
                    <?php if($item->for_web == 1): ?>
                    
                    <?php endif; ?>
                  </div>
                </div>
              </div>      
            </div><!-- col-xs-12 -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- subcats -->
      <?php else: ?>
        <?php $__currentLoopData = DB::table('food_items')->orderBy('for_web', 'DESC')->where('cat_id', $cat->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="portfolio-item col-xs-12" data-groups='["total", "<?php echo e($item->cat_id); ?>"]'>
          <div class="portfolio">
            <div class="media menu-media order_item">
              <div class="media-left media-top">
                <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                <div class="item_name"><?php echo e($item->food_name); ?> </div>
                <?php if($item->details): ?>
                <br>
                <small><?php echo e($item->details); ?></small>
                <?php endif; ?>
              </div><!-- media left-->
              <div class="item-media-body">
                <div class="food_price"><span>&pound;</span><span class="item_price"><?php echo e($item->price); ?></span></div>
              </div><!--/.media body-->
              <div class="media-left media-top media-item-price">
                <a class="addordr">Place Order</a>
                <?php if($item->for_web == 1): ?>
                
                <?php endif; ?>
              </div>
            </div>
          </div>      
        </div><!-- col-xs-12 -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

      </div> <!-- grid -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      <div class="clearfix"></div><br>
      
      <hr>
      <a class="btn" style="padding:5px 15px; font-size: 14px" href="#food-menu">Back to Food Menu</a>
      <!-- <div class="load-button text-center">
        <button class="btn" name="submit" type="submit">load more</button>
      </div> -->
    </div><!--gallery items-->
        </div><!--middle /.col-->
        <div class="col-md-3 col-sm-3">
            <div class="col-sm-1 col-xs-2" style="padding:0;">
              <span id="order_key" class="order_key btn" style="display:none; padding:4px; margin-top:8px; border:1px solid #fff; border-radius:0" title="Order Basket">
                <span id="order_count" style="font-size: 12px;left: 12px;position: absolute;text-align: center;top: 6px;" title="ordered items"><?php echo e(count(Session::get('_orders')?Session::get('_orders'):[])); ?></span>
                
              </span>
              <span style="display:none" id="FoodNameCheck"><?php echo e(count(Session::get('_orders')?Session::get('_orders'):[])); ?></span>
            </div>
            
              <?php echo Form::open(['route' => 'home.order_confirm', 'method' => 'POST', 'id' => 'online_order', 'style' => 'display:none']); ?>

              <div id="order_section" class="orders_section" style="display:block">
                <div class="table-responsive" id="OrderedTable"><table class="orders" id="orders" style="width:100%;">
                    
                  </table>
                  <table class="total_table" style="width:100%;margin-top:20px;">
                    <tr>
                      <td>Total</td>
                      <td style="text-align:right;">&pound;<span id="total">00.00</span></td>
                    </tr>
                    <tr>
                      <td>Discount (-)</td>
                      <td>&pound;<span id="discount">00.00</span></td>
                    </tr>
                    <tr>
                      <td>Delivery Charge (+)</td>
                      <td>&pound;<span id="charge">00.00</span></td>
                    </tr>
                    <tr>
                      <td style="font-size:18px;color:red">Order Total</td>
                      <td style="font-size:18px;color:red">&pound;<span id="grand_total">00.00</span></td>
                    </tr>
                  </table>
                </div>
                <div class="panel panel-default" style="margin-top:50px">
                  <div class="panel-body">
                    <h4>
                      <input type="radio" value="Collection" name="order_type" required> Collection<br>
                      <small>Minimum 25 - 30 minutes</small>
                    </h4>
                    <br>
                    <h4>
                      <input type="radio" value="Delivery" name="order_type" required> Delivery<br>
                      <small>Minimum 45 - 60 minutes</small>
                    </h4>
                  </div>
                </div>
                <div class="panel panel-default" style="margin-top:20px">
                  <div class="panel-body">
                    <h4>
                      <input type="radio" value="Cash" name="payment" required> Cash<br>
                    </h4>
                      <hr>
                    <h4>
                      <input type="radio" value="Card" name="payment" required> Card<br>
                      <img src="/images/home/card_sign_small.png" alt="">
                    </h4>
                  </div>
                </div>
                <div class="panel panel-default" style="margin-top:20px">
                  <div class="panel-body">
                    <h4 style="margin-bottom:15px">Your Detail</h4>
                    <div class="form-group">
                      <input type="text" class="form-control" name="first_name" placeholder="First Name" requried>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="last_name" placeholder="Last Name" requried>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="primary_phone" placeholder="Contact No" required>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default" style="margin-top:20px">
                  <div class="panel-body">
                    <div class="form-group">
                      <input type="checkbox"> Save detail for future use<br>
                      <small>(we will never your card detail)</small>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Pasword" disabled>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default" style="margin-top:20px">
                  <div class="panel-body">
                    <img src="/images/home/allergy.png" class="img-responsive" alt=""><br>
                    <p style="text-align:justify">If you have a food allergy or intolerance (or someone you're ordering for has), phone the restaurant / takeaway on +44 (0) 1322 836 121    +44 (0) 1322 836 164 before place your order.</p>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="special" placeholder="Special Requirements...">
                </div><br>
                <div class="form-group">
                  <input type="submit" class="btn btn-default" value="Submit Order" style="width:100%">
                </div>
              </div><!-- order_section -->

              <?php echo Form::close(); ?>

        </div>
      <script type="text/javascript">

      // show cats
      function showCat(sitems){

        var ItemCat = document.getElementsByClassName('ItemCat');
        //show sub cat items
        if(sitems.nextElementSibling)
        {
          if(sitems.nextElementSibling.style.display == 'none')
          {
            sitems.nextElementSibling.style.display = 'block';
          }
          else
          {
            sitems.nextElementSibling.style.display = 'none';
          }
        }

        for(var i = 0; i < ItemCat.length; i++){
          if(sitems.name == ItemCat[i].id){
            ItemCat[i].style.display = 'block';
            document.getElementById('noitems_alert').style.display = 'none';
          } else {
            ItemCat[i].style.display = 'none';
          }
        }
      }
      // show sub cats
      function showSubCat(subcat){
        var ItemSubCat = document.getElementsByClassName('ItemSubCat');
        var subcatkey = document.getElementsByClassName('subcatkey');
        //sub category item display function
        for(var i = 0; i < ItemSubCat.length; i++){
          if(subcat.name == ItemSubCat[i].id){
            ItemSubCat[i].style.display = 'block';
            ItemSubCat[i].addClass('active') = 'block';
            // document.getElementsByClassName('nosubitems')[1].style.display = 'none';
          } else {
            ItemSubCat[i].style.display = 'none';
          }
        }        
      }
      //call showCat() function onload the document.
      showCat(document.getElementById('CatItem'));
      </script>
    </div><!-- row -->
  </div><!-- container -->
</section> 
<!--====| Shuffle Menu Style End |====-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>