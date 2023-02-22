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
  // var allAlerts = document.getElementById('allAlerts');
  // var sub_alert = document.getElementById('sub_alert');
  var OrderedTable = document.getElementById('OrderedTable');
  var basket_empty = document.getElementById('basket_empty');
  var order_section = document.getElementById('order_section');
  var online_order = document.getElementById('online_order');

  // $(".addordr").on("click", function () {
  function addordr(adrelm) {
    // var quty = $(this).closest("div.order_item").find("span.qtyshow").html();
    var quty = 1;
    var item_id = adrelm.firstChild.nextElementSibling.value;
    var item = adrelm;
    console.log(item);
    var item_price = adrelm.lastElementChild.lastElementChild.innerHTML;

    var item_name = item.firstChild.nextElementSibling.nextElementSibling.innerHTML;
    // console.log(adrelm.firstChild.nextElementSibling.value);

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

      //call to price calculation function
      priceCalc();

      // create order added mark
      var create = document.createElement('small');
      create.style = 'color:#f00';
      create.innerHTML = 'Added to the order';
      item.parentNode.append(create);
  }

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
          items_name[r].parentNode.parentNode.lastChild.remove();
        }
      }
      // console.log(items_name[0].parentNode.parentNode.lastChild.remove());
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


  // required field on select order type
    var order_type = document.getElementById('order_type');
    var dine_in    = document.getElementsByClassName('dine_in');
    var home       = document.getElementsByClassName('home');
    var home_take  = document.getElementsByClassName('home_take');

    order_type.addEventListener('change', MakeRequired);
    function MakeRequired(){
        if(order_type.value == 'HOME DELIVERY'){

            HomeShow();
            
            HomeTakeShow();

            DineInHide();

            removeRequired();

        } else if(order_type.value == 'DINE IN'){
            
            HomeHide();

            HomeTakeHide();

            DineInShow();

            removeRequired();

        } else if(order_type.value == 'TAKE AWAY') {
            
            HomeHide();

            HomeTakeShow();
            
            DineInHide();

            removeRequired();

        } else {
            //
        }
      }

      function HomeShow () {
        for(var i = 0; i < home.length; i++){
                home[i].parentNode.style = 'display:block';
                home[i].setAttribute('required', 'required');
            }
      }
      function HomeHide() {
        for(var i = 0; i < home.length; i++){
                home[i].parentNode.style = 'display:none';
                home[i].removeAttribute('required', 'required');
            }
      }
      function HomeTakeShow() {
        for(var i = 0; i < home_take.length; i++){
                home_take[i].parentNode.style = 'display:block';
                home_take[i].setAttribute('required', 'required');
            }
      }
      function HomeTakeHide() {
        for(var i = 0; i < home_take.length; i++){
                home_take[i].parentNode.style = 'display:none';
                home_take[i].removeAttribute('required', 'required');
            }
      }

      function DineInShow() {
        for(var i = 0; i < dine_in.length; i++) {
                dine_in[i].parentNode.style = 'display:block';
                dine_in[i].setAttribute('required', 'required');
            }
      }

      function DineInHide() {
        for(var i = 0; i < dine_in.length; i++) {
                dine_in[i].parentNode.style = 'display:none';
                dine_in[i].removeAttribute('required', 'required');
            }
      }

      function removeRequired(){
        document.getElementById('email').removeAttribute('required', 'required');
        document.getElementById('last_name').removeAttribute('required', 'required');
        document.getElementById('note').removeAttribute('required', 'required');
      }

      //onload
      MakeRequired();


// var cats = document.getElementsByClassName('cats');
// for(var i = 0; cats.length > i; i++){
//   if(cats[i].className == )
// }