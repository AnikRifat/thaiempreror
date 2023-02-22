@extends('admin')
@section('title', 'Add Food Item')
@section('content')

<?php
  $_orders = [];
  if(!empty(Session::get('_orders'))){
    $_orders = Session::get('_orders');
  }
?>

<style type="text/css">
  ul.sidebar-menu{
    padding-left: 0;
  }
  ul.sidebar-menu li{
    list-style: none;
    border-bottom: 1px solid #eee;
  }
  ul.sidebar-menu li:last-child{border: none;}
  ul.sidebar-menu li a{
    display: block;
    /*background: #eee;*/
    padding: 15px 25px;
    text-transform: uppercase;
    cursor: pointer;
  }
  ul.sidebar-menu li a:active{
    color:#f00;
  }
  ul.sidebar-menu li a:hover{
    color:#f00;
    background: #efefef;
  }
  .food-items{padding: 0 15px;}
  .food_item{padding: 10px;border-bottom: 1px solid #eee}
  .food_item:hover{color: #f00;background: #efefef;cursor: pointer;}
  .itemIntro{display: block;display: table; width: 100%;}
  .itemIntro .item_name, .itemIntro .food-price{display: table-cell;}
  .order-items{padding: 15px}
  .orders{border-bottom: 1px solid #eee;padding-bottom: 15px}
  .total_table td:last-child{text-align: right;padding: 5px 0;}
  .orders td:last-child{text-align: right;}
  .active{background: #eee;color: #f00}
  .cat_title, .sub_cat_title{color:#f00;}
  .cat_title{font-size: 17px;margin-top: 15px}
  .sub_cat_title{padding-left: 15px}
  .order-panel-title{border-bottom: 1px solid #ddd;padding-bottom: 15px!important;display: block;}
</style>

<span id="order_count" style="font-size: 12px;left: 12px;position: absolute;text-align: center;top: 6px;display:none" title="ordered items">{{count($_orders)}}</span>
<span style="display:none" id="FoodNameCheck">{{count($_orders)}}</span>

<div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header order-panel-title">Menu</div>
          <div class="card-body">
            <ul class="sidebar-menu">
             @foreach($cats as $cat)
             <li><a name="{{'cat'.$cat->id}}" onclick="showCat(this)" id="CatItem">{{$cat->cat_name}}</a>
             @if(count(App\FoodSubCat::where('cat_id', $cat->id)->get()) > 0)
             <ul style="display:none" class="subCat sub-cats">
              @foreach(App\FoodSubCat::where('cat_id', $cat->id)->get() as $subcat)
               <li><a onClick="showSubCat(this);" name="{{$cat->id.'subcat'.$subcat->id}}">{{$subcat->sub_cat_name}}</a></li>
              @endforeach
             </ul>
             @endif
             @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header order-panel-title">Food Items</div>
          <div class="card-body food-items">
            @foreach($cats as $cat)
       <div class="ItemCat" id="{{'cat'.$cat->id}}" style="display:block">
        <div class="cat_title" id="{{$cat->cat_name}}">{{$cat->cat_name}}</div>
        <!-- portfolio-item -->
        <?php $subcats = DB::table('food_sub_cats')->where('cat_id', $cat->id)->get(); ?>
        @if(count($subcats) > 0)
        <div class="clearfix"></div>
          
          @foreach($subcats as $subcat)
          <div class="clearfix"></div>
          <div class="ItemSubCat" id="{{$cat->id.'subcat'.$subcat->id}}" style="display:none"> <!--sub-cat-block-->
            <div class="sub_cat_title" id="{{$subcat->sub_cat_name}}">- {{$subcat->sub_cat_name}}</div>
            @foreach(DB::table('food_items')->orderBy('for_web', 'DESC')->where('sub_cat_id', $subcat->id)->get() as $item)
            <div class="portfolio-item" data-groups='["total", "{{$item->cat_id}}"]'>
              <div class="portfolio">
                <div class="media menu-media food_item">
                  <div class="media-body">
                    <div class="itemIntro addordr" onclick="addordr(this)">
                      <input type="hidden" name="item_id" value="{{$item->id}}">
                      <span class="item_name">{{$item->food_name}}</span>
                      <div class="food-price">&pound;<span class="item_price">{{$item->price}}</span></div>
                    </div>
                  </div><!--/.media body-->
                </div>
              </div>      
            </div><!-- col-xs-12 -->
            @endforeach
          </div> {{-- sub-cats block --}}
        @endforeach <!-- subcats -->        
      @else
        @foreach(DB::table('food_items')->orderBy('for_web', 'DESC')->where('cat_id', $cat->id)->get() as $item)
        <div class="portfolio-item" data-groups='["total", "{{$item->cat_id}}"]'>
          <div class="portfolio">
            <div class="media menu-media food_item">
              <div class="media-body">
                <div class="itemIntro addordr" onclick="addordr(this)">
                  <input type="hidden" name="item_id" value="{{$item->id}}">
                  <span class="item_name">{{$item->food_name}}</span>
                  <div class="food-price">&pound;<span class="item_price">{{$item->price}}</span></div>
                </div>
              </div><!--/.media body-->
            </div>
          </div>      
        </div><!-- col-xs-12 -->
        @endforeach
        @endif

      </div> <!-- grid -->
      @endforeach {{-- $cats as $cat --}}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header order-panel-title">Order Busket</div>
          <div class="card-body order-items">

            <div class="col-sm-1 col-xs-2" style="padding:0;">
              <span id="order_key" class="order_key btn" style="display:none; padding:4px; margin-top:8px; border:1px solid #fff; border-radius:0" title="Order Basket">
                <span id="order_count" style="font-size: 12px;left: 12px;position: absolute;text-align: center;top: 6px;" title="ordered items">{{count(Session::get('_orders')?Session::get('_orders'):[])}}</span>
                {{-- <img src="/images/home/order-basket.png" alt="basket"> --}}
              </span>
              <span style="display:none" id="FoodNameCheck">{{count(Session::get('_orders')?Session::get('_orders'):[])}}</span>
            </div>
            
              {!! Form::open(['route' => 'admin.create.order', 'method' => 'POST', 'id' => 'online_order', 'style' => 'display:block']) !!}
              <div id="order_section" class="orders_section" style="display:block">
                <div class="table" id="OrderedTable"><table class="orders" id="orders" style="width:100%;">
                    
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
                <div class="panel panel-default" style="margin-top:20px">
                  <div class="panel-body">
                    <h4 style="margin-bottom:15px">Your Detail</h4>
                    <div class="form-group">
                      {{ Form::text('first_name', !empty($user->first_name)? $user->first_name:'', ['class' => 'form-control home_take', 'required' => '', 'placeholder' => 'First Name'])}}
                    </div>
                    <div class="form-group">
                      {{ Form::text('last_name', !empty($user->last_name)? $user->last_name:'', ['class' => 'form-control home_take', 'id' => 'last_name', 'placeholder' => 'Last Name'])}}
                    </div>
                    <div class="form-group">
                      {{ Form::text('primary_phone', !empty($user->primary_phone)? $user->primary_phone:'', ['class' => 'form-control home_take', 'required' => '', 'placeholder' => 'Contact']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::email('email', !empty($user->email)? $user->email:'', ['class' => 'form-control home_take', 'placeholder' => 'Email Address']) }}
                    </div>
                    <div class="form-group">
                      <select id="order_type" name="order_type" class="form-control" required>
                        <option value="">Select Order Option</option>
                        <option value="DINE IN" {{Session::get('_order_type') && Session::get('_order_type') == 'DINE IN'? 'selected' : ''}}>DINE IN</option>
                        <option value="HOME DELIVERY" {{Session::get('_order_type') && Session::get('_order_type') == 'HOME DELIVERY'? 'selected' : ''}}>HOME DELIVERY</option>
                        <option value="TAKE AWAY" {{Session::get('_order_type') && Session::get('_order_type') == 'TAKE AWAY'? 'selected' : ''}}>TAKE AWAY</option>
                      </select>
                    </div>
                    <div class="form-group">
                      {{ Form::date('order_time_date', date('Y-m-d h:s:i'), ['class' => 'form-control', 'placeholder' => 'Order Time & Date']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::number('table_no', null, ['class' => 'form-control dine_in', 'required' => '', 'placeholder' => 'Table Number']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::number('number_of_guest', null, ['class' => 'form-control dine_in', 'required' => '', 'placeholder' => 'Number of Guest']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::text('property_no', !empty($user->property_no)? $user->property_no:'', ['class' => 'form-control home', 'placeholder' => 'Property Number']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::text('town_name', !empty($user->town_name)? $user->town_name:'', ['class' => 'form-control home', 'placeholder' => 'Town Name']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::text('post_code', !empty($user->post_code)? $user->post_code:'', ['class' => 'form-control home', 'placeholder' => 'Post Code']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::text('note', !empty($user->note)? $user->note:'', ['class' => 'form-control home_take', 'id' => 'note', 'placeholder' => 'Note']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => '2', 'placeholder' => 'Detail']) }}
                    </div>
                    
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-success" value="Place Order" style="width:100%">
                </div>
              </div><!-- order_section -->

              {!! Form::close() !!}
          </div>
        </div>
      </div>
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

    <script type="text/javascript" src="/js/home/order.js"></script>


@endsection