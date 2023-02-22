  // add food name to the FoodNameCheck input.
  // FoodName.value = '';
  var check = 0;
  var order_counter = 0;
  var FoodName = document.getElementById('FoodNameCheck');
  var orders = document.getElementById('orders');
  var order_count = document.getElementById('order_count');
  var ItemsName = document.getElementsByClassName('ItemsName');
  var items_name = document.getElementsByClassName('item_name');
  var ItemsQty = document.getElementsByClassName('ItemsQty');
  var ItemsPrice = document.getElementsByClassName('ItemsPrice');
  var UnitPrice = document.getElementsByClassName('UnitPrice');
  var allAlerts = document.getElementById('allAlerts');
  var sub_alert = document.getElementById('sub_alert');
  var OrderedTable = document.getElementById('OrderedTable');
  var basket_empty = document.getElementById('basket_empty');
  var order_section = document.getElementById('order_section');
  var online_order = document.getElementById('online_order');

  $(".addordr").on("click", function () {
    // var quty = $(this).closest("div.order_item").find("span.qtyshow").html();
    var quty = 1;
    var item_id = $(this).closest('div.order_item').find("input[name='item_id']").val();
    var item = $(this).closest('div.order_item').find("div.item_name");
    var item_price = $(this).closest('div.order_item').find("span.item_price").html();
    var item_name = item.html();

      for(var i = 0; i < ItemsName.length; i++) {
        if(ItemsName[i].innerHTML != item_name) {
          check = 0;
          // return;          
        } else {
          var total_qty = Number(ItemsQty[i].innerHTML)+1;
          ItemsQty[i].innerHTML = total_qty;
          ItemsPrice[i].innerHTML = Number(item_price*total_qty).toFixed(2);

          //call to the price calculation
          priceCalc(); 
          check = 1;
          return;
        }
      }

      if(check == 0){
        //isert ordered table row
          var row = orders.insertRow(-1);
          //add td with the row
          var rmbtn = row.insertCell(0);
          var qty = row.insertCell(1);
          var name = row.insertCell(2);
          var price = row.insertCell(3);

          name.setAttribute('class', 'names');
          name.innerHTML = '<span class="ItemsName">'+item_name+'</span>'+'<input type="hidden" name="itemId[]" value="'+item_id+'">'+'<input type="hidden" name="itemName[]" value="'+item_name+'">';
          price.innerHTML = '&pound;<span class="ItemsPrice">'+item_price+'</span><input type="hidden" class="UnitPrice" name="itemPrice[]" value="'+item_price+'">';
          qty.innerHTML = '<span class="ItemsQty">'+quty+'</span><input type="hidden" name="itemQty[]" value="'+quty+'">';

          order_count.innerHTML = parseFloat(order_count.innerHTML)+1;

          // add food name to the FoodNameCheck input.
          FoodName.innerHTML = item_id;

          //create a remove btn
          var rm = document.createElement('span');
          rm.innerHTML = '<a>-</a>';
          rm.setAttribute('onclick', 'removetr(this)');
          rm.classList.add('remove');
          rmbtn.appendChild(rm);
          rmbtn.setAttribute('width', '30');

          online_order.style.display = 'block';
      }

      // create order added mark
      var create = document.createElement('div');
      create.innerHTML = '<br><small style="color:#f00">Added to the order</small>';
      item[0].parentNode.appendChild(create);

      //call to price calculation function
      priceCalc();
  });

  //remove tr
  function removetr(elm) {

    order_count.innerHTML = parseFloat(order_count.innerHTML)-1;
    if(parseFloat(order_count.innerHTML) == 0) {
      FoodName.innerHTML = 0;
      check = 0;
    }

    minusQty(elm);
    priceCalc();
  }

  function minusQty(elm)
  {
    // console.log(val.parentNode.nextSibling.firstChild.innerHTML);
    var item_qty = elm.parentNode.nextSibling.firstChild;
    var item_price = elm.parentNode.parentNode.lastChild.firstElementChild;
    var unit_price = elm.parentNode.parentNode.lastChild.lastChild;
    // console.log(item_price);
      var total_qty = Number(item_qty.innerHTML)-1;
      item_qty.innerHTML = total_qty;
      item_price.innerHTML = Number(Number(unit_price.value)*total_qty).toFixed(2);
      //if quantity is 0 then remove the item
      if(total_qty == 0)
      {
        var p = elm.parentNode.parentNode;
        p.parentNode.removeChild(p);        

      //remove order placed mark
      var itemNameElm = elm.parentNode.nextSibling.nextSibling.firstChild;
      for(var r = 0; r < items_name.length; r++)
      {
        if(items_name[r].innerHTML == itemNameElm.innerHTML){
          items_name[r].parentNode.lastChild.remove();
        }
      }
      }
      if(ItemsName.length == 0){
        //if no orderd items in table then remove hide the order section
        online_order.style.display = 'none';
      }
  }

  // price calculation for all ordered items
  function priceCalc()
  {
    var totalPrice = 0;
    var total = document.getElementById('total');
    var prices = document.getElementsByClassName('ItemsPrice');
    for(var p = 0; p < prices.length; p++)
    {
      totalPrice += Number(prices[p].innerHTML);
      total.innerHTML = Number(totalPrice).toFixed(2);
    }

    calcTotal();
  }

  //total calculation
  function calcTotal()
  {
    var total = document.getElementById('total');
    var discount = document.getElementById('discount');
    var charge = document.getElementById('charge');
    var grand_total = document.getElementById('grand_total');
    var total_num = Number(total.innerHTML);
    //calculation grand total
    disc_value = total_num*10/100;
    discount.innerHTML = disc_value;
    charge_value = 1;
    charge.innerHTML = charge_value;
    GTotal = total_num-disc_value+charge_value;
    grand_total.innerHTML = Number(GTotal).toFixed(2);
  }

  // // onclik order basket move to food menu.
  // $(".order_key").on("click", function () {

  //   if(parseFloat(FoodName.innerHTML) < 1) {
  //     // window.location="/#food-menu";
  //     OrderedTable.style.display = 'none';
  //     ordersShowHide();
  //   } else {
  //     OrderedTable.style.display = 'block';
  //     basket_empty.style.display = 'none';
  //     ordersShowHide();
  //   }
  // });

  // function ordersShowHide(){
  //   if(order_section.style.display == 'none') {
  //       order_section.style = 'display:block';
  //     } else {
  //       order_section.style = 'display:none';
  //     }
  // }

  // $(".qtyPlus").on("click", function () {
  //     var qtyshow = $(this).closest("div.quantity").find("span.qtyshow");
  //     qtyshow.text(parseFloat(qtyshow.html())+1);
  // });

  // $(".qtyMinus").on("click", function () {
  //     var qtyshow = $(this).closest("div.quantity").find("span.qtyshow");
  //     if(qtyshow.html() > 1){
  //       qtyshow.text(parseFloat(qtyshow.html())-1);
  //     }
  // });