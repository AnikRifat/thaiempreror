@extends('admin')
@section('title', 'Add Food Item')
@section('content')

<?php
  $_orders = [];
  if(!empty(Session::get('_orders'))){
    $_orders = Session::get('_orders');
  }
?>

<span id="order_count" style="font-size: 12px;left: 12px;position: absolute;text-align: center;top: 6px;display:none" title="ordered items">{{count($_orders)}}</span>
<span style="display:none" id="FoodNameCheck">{{count($_orders)}}</span>

<div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Menu</div>
          <div class="card-body">
            <ul class="menu">
              @foreach($cats as $cat)
               <li><a onClick="showCat(this);" class="cats" name="{{'cat'.$cat->id}}" href="#{{$cat->cat_name}}">{{$cat->cat_name}}</a></li> 
               @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Food Items</div>
          <div class="card-body">food item list</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Order Busket</div>
          <div class="card-body">order items</div>
        </div>
      </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-icon" data-background-color="purple">
        <i class="material-icons">add</i>
      </div>
      <div class="card-content">
        <h4 class="card-title">Proceed to Order</h4>
        {!! Form::open(['route' => 'admin.create.order', 'method' => 'POST']) !!}

        <style type="text/css">
        #filter .active{background: #fff!important;}
        </style>

    <div class="row" id="menu">
        <div class="gallery-trigger">
          <h2 style="text-align:center">--- MENU ---</h2>
          <ul id="filter">
           {{-- <li><a class="active" href="#" data-group="total">all</a></li> --}}
           @foreach($cats as $cat)
           <li><a onClick="showCat(this);" class="cats" name="{{'cat'.$cat->id}}" href="#{{$cat->cat_name}}">{{$cat->cat_name}}</a></li> 
           @endforeach
          </ul> 
        </div>
        <div class="clearfix"></div>

        @foreach($cats as $cat)
       {{-- <div id="grid"> --}}
       <div class="ItemCat" id="{{'cat'.$cat->id}}" style="display:none">
        <h4 id="{{$cat->cat_name}}">{{$cat->cat_name}}</h4>
        <!-- portfolio-item -->
        <?php $subcats = DB::table('food_sub_cats')->where('cat_id', $cat->id)->get(); ?>
        @if(count($subcats) > 0)
        <div class="clearfix"></div>
        <p style="font-size:20px;color:#f00;text-align:center" class="nosubitems">Click on the sub-categories to view the food items.</p>
          <ul class="sub-cats" id="filter">
          @foreach($subcats as $subcat)
            <li><a class="subcatkey" style="font-weight:bold" onClick="showSubCat(this);" name="{{$cat->id.'subcat'.$subcat->id}}" href="#{{$subcat->sub_cat_name}}">{{$subcat->sub_cat_name}}</a></li>
          @endforeach
          </ul>
          
          @foreach($subcats as $subcat)
          <div class="clearfix"></div>
          <div class="ItemSubCat" id="{{$cat->id.'subcat'.$subcat->id}}" style="display:none"> <!--sub-cat-block-->
            <h4 id="{{$subcat->sub_cat_name}}">{{$subcat->sub_cat_name}}</h4>
            <hr class="clearfix">
            @foreach(DB::table('food_items')->orderBy('for_web', 'DESC')->where('sub_cat_id', $subcat->id)->get() as $item)
            <div class="portfolio-item col-xs-12 col-sm-6 col-md-6" data-groups='["total", "{{$item->cat_id}}"]'>
              <div class="portfolio">
                <div class="media menu-media order_item">
                  <div class="media-left media-top">
                    <a href="#">
                      <img src="/images/{{$item->image?'items/'.$item->image:'no_image.png'}}" alt="{{$item->food_name}}">
                    </a>
                  </div><!-- media left-->
                  <div class="media-body">
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <div class="itemIntro">
                      <span class="item_name">{{$item->food_name}}</span>
                      <div class="food-price">&pound;<span class="item_price">{{$item->price}}</span></div>
                    </div>

                    <div class="itemControl">
                      <div class="details">{{$item->details}}</div>
                      <div class="controls">
                        <div class="quantity">
                          <input type="button" value="-" class="qtyMinus">
                          <span class="qtyshow">1</span>
                          <input type="button" value="+" class="qtyPlus">
                        </div>
                        <input class="btn btn-primary btn-sm addordr" type="button" value="+ order">
                      </div>
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
        <div class="portfolio-item col-xs-12 col-sm-6 col-md-6" data-groups='["total", "{{$item->cat_id}}"]'>
          <div class="portfolio">
            <div class="media menu-media order_item">
              <div class="media-body">
                <input type="hidden" name="item_id" value="{{$item->id}}">

                <div class="itemIntro">
                  <span class="item_name">{{$item->food_name}}</span>
                  <div class="food-price">&pound;<span class="item_price">{{$item->price}}</span></div>
                </div>

                <div class="itemControl">
                  <div class="details">{{$item->details}}</div>
                  <div class="controls">
                    <div class="quantity">
                      <input type="button" value="-" class="qtyMinus">
                      <span class="qtyshow">1</span>
                      <input type="button" value="+" class="qtyPlus">
                    </div>
                    <input class="btn btn-primary btn-sm addordr" type="button" value="+ order">
                  </div>
                </div>
              </div><!--/.media body-->
            </div>
          </div>      
        </div><!-- col-xs-12 -->
        @endforeach
        @endif

      </div> <!-- grid -->
      @endforeach {{-- $cats as $cat --}}
      <p id="noitems_alert" style="text-align:center">Click on the categories to view the food items.</p><br>
      <div class="clearfix"></div>
      <div style="text-align:center">
        <a class="btn btn-warning" style="padding:5px 15px;font-size: 15px;" href="#menu">Back to Menu</a>
      </div>
      <!-- <div class="load-button text-center">
        <button class="btn" name="submit" type="submit">load more</button>
      </div> -->
      <script type="text/javascript">

      // show cats
      function showCat(sitems){
        var ItemCat = document.getElementsByClassName('ItemCat');
        for(var i = 0; i < ItemCat.length; i++){
          if(sitems.name == ItemCat[i].id){
            ItemCat[i].style.display = 'block';
            document.getElementById('noitems_alert').style.display = 'none';
          } else {
            ItemCat[i].style.display = 'none';
          }

          var cats = document.getElementsByClassName('cats');
          for(var r = -1; r < cats.length; r++){
            if(sitems.className == 'cats'){
              sitems.classList.add('active');
            }else{
              cats[i].classList.remove('active');
            }
          }

        }        
      }
      // show sub cats
      function showSubCat(subcat){
        var ItemSubCat = document.getElementsByClassName('ItemSubCat');
        var subcatkey = document.getElementsByClassName('subcatkey');
        for(var i = 0; i < ItemSubCat.length; i++){
          if(subcat.name == ItemSubCat[i].id){
            ItemSubCat[i].style.display = 'block';
            // document.getElementsByClassName('nosubitems')[1].style.display = 'none';
          } else {
            ItemSubCat[i].style.display = 'none';
          }

          var scats = document.getElementsByClassName('subcatkey');
          for(var s = -1; s < scats.length; s++){
            if(subcat.className == 'subcatkey'){
              subcat.classList.add('active');
            }else{
              scats[i].classList.remove('active');
            }
          }
        }        
      }
      </script>
    </div>
                    
                <div class="col-md-12 items-table">
                    <table id="orders" class="table table-bordered table-stripped">
                        <tr>
                            <th>Food Name</th>
                            {{-- <th>Price</th> --}}
                            <th>Qty.</th>
                            <th>Remarks</th>
                            <th></th>
                        </tr>
                    </table>
                </div>

                    <div class="col-md-12">
                        <br><br>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('order_type', 'Order Type', ['class' => 'control-label']) }}
                                <select id="order_type" name="order_type" class="form-control" required>
                                    <option value=""></option>
                                    <option value="DINE IN" {{Session::get('_order_type') && Session::get('_order_type') == 'DINE IN'? 'selected' : ''}}>DINE IN</option>
                                    <option value="HOME DELIVERY" {{Session::get('_order_type') && Session::get('_order_type') == 'HOME DELIVERY'? 'selected' : ''}}>HOME DELIVERY</option>
                                    <option value="TAKE AWAY" {{Session::get('_order_type') && Session::get('_order_type') == 'TAKE AWAY'? 'selected' : ''}}>TAKE AWAY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('order_time_date', 'Order Time & Date', ['class' => 'control-label']) }}
                                {{ Form::text('order_time_date', date('Y-m-d h:s:i'), ['class' => 'form-control form-check-input']) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                {{ Form::label('table_no', 'Table Number', ['class' => 'control-label']) }}
                                {{ Form::number('table_no', null, ['class' => 'form-control form-check-input dine_in', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                {{ Form::label('number_of_guest', 'Number Of Guest', ['class' => 'control-label']) }}
                                {{ Form::number('number_of_guest', null, ['class' => 'form-control form-check-input dine_in', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                                {{ Form::text('first_name', !empty($user->first_name)? $user->first_name:'', ['class' => 'form-control home_take', 'required' => ''])}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                                {{ Form::text('last_name', !empty($user->last_name)? $user->last_name:'', ['class' => 'form-control home_take', 'id' => 'last_name'])}}
                            </div>
                        </div>
                        <div class="col-md-3">    
                            <div class="form-group label-floating">
                                {{ Form::label('primary_phone', 'Primary Phone', ['class' => 'control-label']) }}
                                {{ Form::text('primary_phone', !empty($user->primary_phone)? $user->primary_phone:'', ['class' => 'form-control home_take', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('email', 'Email Address (optional)', ['class' => 'control-label']) }}
                                {{ Form::email('email', !empty($user->email)? $user->email:'', ['class' => 'form-control home_take']) }}
                            </div>
                        </div>
                        {{Form::hidden('user_id', !empty($user->id)? $user->id:'')}}
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                {{ Form::label('property_no', 'Holding Number and Street Name', ['class' => 'control-label']) }}
                                {{ Form::text('property_no', !empty($user->property_no)? $user->property_no:'', ['class' => 'form-control home']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('town_name', 'Town Name', ['class' => 'control-label']) }}
                                {{ Form::text('town_name', !empty($user->town_name)? $user->town_name:'', ['class' => 'form-control home']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('post_code', 'Post Code', ['class' => 'control-label']) }}
                                {{ Form::text('post_code', !empty($user->post_code)? $user->post_code:'', ['class' => 'form-control home']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                {{ Form::label('note', 'Comment', ['class' => 'control-label']) }}
                                {{ Form::text('note', !empty($user->note)? $user->note:'', ['class' => 'form-control home_take', 'id' => 'note']) }}
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group label-floating">
                            {{ Form::label('details', 'Note:', ['class' => 'control-label']) }}
                            {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => '2']) }}
                        </div>
                    </div>


                    <div class="col-md-12">
                        <a class="btn btn-default" href="/admin/choose_order_option"><i class="material-icons">arrow_back</i> back</a>
                        <button type="submit" class="btn btn-success btn-fill pull-right"><i class="material-icons">save</i> place order</button>
                    </div>

                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="/js/home/order.js"></script>


@endsection