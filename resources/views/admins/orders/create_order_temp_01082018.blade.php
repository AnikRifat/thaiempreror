@extends('admin')
@section('title', 'Add Food Item')
@section('content')

<style type="text/css">
 .itemName, .unitPrice, .price, .totalPrice{ border: none;}
 .unitPrice, .totalPrice, .price{width: 50px!important;}
 .remarks{width: 100%;}
 .remove{cursor: pointer;}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">add</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Proceed to Order</h4>

                    {!! Form::open(['route' => 'admin.create.order', 'method' => 'POST']) !!}

                    <div class="col-md-9">
                        <div class="form-group label-floating">
                            <a class="btn btn-info" href="#">Monday Exclusive* -  £9.95</a>
                            <a class="btn btn-info" href="#">Banqueting Night - £12.95</a>
                        </div>
                        <div class="form-group label-floating">
                            {{ Form::label('food_id', '--- Food Name ---', ['class' => 'control-label']) }}
                            <select id="foodCategory" name="food_id" class="form-control border-input">
                                <option value=""></option>
                                    @foreach($cats as $cat)
                                    <optgroup label="{{$cat->cat_name}}">
                                        @foreach(DB::table('food_items')->where('cat_id', $cat->id)->where('sub_cat_id', null)->get() as $food)
                                        <option value="{{ $food->price }}">{{ $food->food_name }}</option>
                                        @endforeach
                                    </optgroup>

                                    @foreach(DB::table('food_sub_cats')->where('cat_id', $cat->id)->get() as $subcat)                                    
                                    <optgroup label=" > {{$subcat->sub_cat_name}}">
                                        @foreach(DB::table('food_items')->where('sub_cat_id', $subcat->id)->get() as $food)                                        
                                        <option value="{{ $food->price }}">{{ $food->food_name}}</option>
                                        @endforeach
                                    </optgroup>
                                        
                                    @endforeach                                    
                                    @endforeach

                                    
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <table id="foodItemsTbl" class="table table-bordered table-stripped">
                            <tr>
                                <th>Food Name</th>
                                <th>Unit Price (&pound;)</th>
                                <th>Qty.</th>
                                <th>Price (&pound;)</th>
                                <th>Remarks</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th style="text-align:right" colspan="3"> Total Price (&pound;) =</th>
                                <th></th>
                                <th colspan='2'></th>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-12"><br><br></div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('order_type', 'Order Type', ['class' => 'control-label']) }}
                                {{ Form::text('order_type', (Session::get('_order_type')? Session::get('_order_type'):''), ['class' => 'form-control border-input', 'readonly' => 'readonly', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('order_time_date', 'Order Time & Date', ['class' => 'control-label']) }}
                                {{ Form::text('order_time_date', date('Y-m-d h:s:i'), ['class' => 'form-control form-check-input']) }}
                            </div>
                        </div>
                        
                        @if(!empty(Session::get('_order_type')) && Session::get('_order_type') == 'DINE IN')
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                {{ Form::label('table_no', 'Table Number', ['class' => 'control-label']) }}
                                {{ Form::number('table_no', null, ['class' => 'form-control form-check-input', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                {{ Form::label('number_of_guest', 'Number Of Guest', ['class' => 'control-label']) }}
                                {{ Form::number('number_of_guest', null, ['class' => 'form-control form-check-input', 'required' => '']) }}
                            </div>
                        </div>
                        @endif
                        @if(!empty(Session::get('_order_type')) && Session::get('_order_type') == 'HOME DELIVERY' || Session::get('_order_type') == 'TAKE AWAY')

                        <div class="clearfix"></div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                                {{ Form::text('first_name', !empty($user->first_name)? $user->first_name:'', ['class' => 'form-control', 'required' => ''])}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                                {{ Form::text('last_name', !empty($user->last_name)? $user->last_name:'', ['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="col-md-3">    
                            <div class="form-group label-floating">
                                {{ Form::label('primary_phone', 'Primary Phone', ['class' => 'control-label']) }}
                                {{ Form::text('primary_phone', !empty($user->primary_phone)? $user->primary_phone:'', ['class' => 'form-control', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('email', 'Email Address (optional)', ['class' => 'control-label']) }}
                                {{ Form::email('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @if(!empty(Session::get('_order_type')) && Session::get('_order_type') == 'HOME DELIVERY')
                        {{Form::hidden('user_id', !empty($user->id)? $user->id:'')}}
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                {{ Form::label('property_no', 'Holding Number and Street Name', ['class' => 'control-label']) }}
                                {{ Form::text('property_no', !empty($user->property_no)? $user->property_no:'', ['class' => 'form-control', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                {{ Form::label('town_name', 'Town Name', ['class' => 'control-label']) }}
                                {{ Form::text('town_name', !empty($user->town_name)? $user->town_name:'', ['class' => 'form-control', 'required' => '']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                {{ Form::label('post_code', 'Post Code', ['class' => 'control-label']) }}
                                {{ Form::text('post_code', !empty($user->post_code)? $user->post_code:'', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                {{ Form::label('note', 'Comment', ['class' => 'control-label']) }}
                                {{ Form::text('note', !empty($user->note)? $user->note:'', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @endif
                    @endif

                        <div class="clearfix"></div>

                        <div class="form-group label-floating">
                            {{ Form::label('details', 'Note:', ['class' => 'control-label']) }}
                            {{ Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => '2']) }}
                        </div>
                    </div>


                    <div class="col-md-12">
                        <a class="btn btn-default" href="/admin/choose_order_option"><i class="material-icons">arrow_back</i></a>
                        <button type="submit" class="btn btn-success btn-fill pull-right"><i class="material-icons">save</i></button>
                    </div>

                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>

<script type="">    
    var cat = document.getElementById('foodCategory');
    var fooditems = document.getElementById('foodItemsTbl');
    cat.addEventListener('change', addRow);

    function addRow(){        
        var row = fooditems.insertRow(1);
        var name = row.insertCell(0);
        var uPrice = row.insertCell(1);
        var qty = row.insertCell(2);
        var price = row.insertCell(3);
        var remarks = row.insertCell(4);        
        var btn = row.insertCell(5);


       var removeItem = document.createElement('span');
       removeItem.innerHTML = '<a>Remove</a>';
       removeItem.classList.add('remove');
       btn.appendChild(removeItem);


        var remarksInput = document.createElement('input');
        remarksInput.name = "remarks[]";
        remarksInput.type="text";
        remarksInput.value='';                
        remarksInput.classList.add('remarks');
        // name.innerHTML = cat.options[cat.options.selectedIndex].innerHTML;
        remarks.appendChild(remarksInput);  

        var nameInput = document.createElement('input');
        nameInput.name = "itemName[]";
        nameInput.type="text";
        nameInput.value=cat.options[cat.options.selectedIndex].innerHTML;
        nameInput.readOnly= true;
        nameInput.classList.add('itemName');
        // name.innerHTML = cat.options[cat.options.selectedIndex].innerHTML;
        name.appendChild(nameInput);

        var uPriceInput = document.createElement('input');
        uPriceInput.name = "unitPrice[]";
        uPriceInput.type = "number";
        uPriceInput.value = cat.options[cat.options.selectedIndex].value;
        uPriceInput.readOnly = true;
        uPriceInput.classList.add('unitPrice');
        // uPrice.innerHTML = cat.options[cat.options.selectedIndex].value;
        uPrice.appendChild(uPriceInput);


        qty.innerHTML = '<input name="itemQty[]" onChange="calcPrice(this)" type="number" value="1" style="width:50px;text-align:center" min="1"/>';  
        
        var priceInput = document.createElement('input');
        priceInput.name="itemPrice[]"
        priceInput.type = "number";
        priceInput.readOnly = true;        
        priceInput.value = cat.options[cat.options.selectedIndex].value; 
        priceInput.classList.add('price');
        priceInput.style.width = 50;
        price.appendChild(priceInput);
        console.log(priceInput);
        // price.innerHTML= cat.options[cat.options.selectedIndex].value; 

        calcTotal();
        btn.addEventListener('click', function(event){
            console.log(event)
                fooditems.deleteRow(event.path[3].rowIndex);
                console.log('remove row', event);
                calcTotal();
            });
    }


     function calcPrice(e){        
        // console.log(e.parentElement.nextSibling.children.item(0).value = 100);
        console.log(e.parentElement.nextSibling.children.item(0).value = (e.value * e.parentElement.previousSibling.children.item(0).value));
        // e.parentElement.nextSibling.innerHTML = e.parentElement.previousSibling.innerHTML*e.value;
        calcTotal();
    }

    function calcTotal(){
        var items = fooditems.rows;
        var price = 0;
        for(var i = 0; i <= items.length; i++){            
            if(i > 0 && i < items.length){
                var cells = items[i].getElementsByTagName('td');
                if(cells.item(3)){
                price+= parseInt(cells.item(3).children.item(0).value);                    
                }
            }
        }
        var ths = items[items.length-1].getElementsByTagName('th');
        var totalPriceInput = document.createElement('input');
        totalPriceInput.type = "number";
        totalPriceInput.name = "totalPrice";
        totalPriceInput.readOnly = true;
        totalPriceInput.value = price;
        totalPriceInput.classList.add('totalPrice');
        if(!ths.item(1).children.length){
            ths.item(1).appendChild(totalPriceInput);    
        }else{
            ths.item(1).children.item(0).value = price;
        } 
    }
   
</script>
@endsection