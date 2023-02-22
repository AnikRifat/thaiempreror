var cat = document.getElementById('foodCategory');
    var fooditems = document.getElementById('foodItemsTbl');
    cat.addEventListener('change', addRow);

    function addRow(){
        //add table row/tr and cell/td
        var row = fooditems.insertRow(-1);
        var name = row.insertCell(0);
        var qty = row.insertCell(1);
        var remarks = row.insertCell(2);
        var btn = row.insertCell(3)

        //add item id
        var itemidInput = document.createElement('input');
        itemidInput.name = "itemId[]";
        itemidInput.type = "hidden";
        itemidInput.value = cat.options[cat.options.selectedIndex].value;
        name.appendChild(itemidInput);

        //add item name
        var nameInput = document.createElement('span');
        nameInput.innerHTML = cat.options[cat.options.selectedIndex].innerHTML;
        name.appendChild(nameInput);

        //add item qty field
        /*
        var qtyInput = document.createElement('input');
        qtyInput.name = "itemQty[]";
        qtyInput.type = "number";
        qtyInput.value = "1";
        qtyInput.min = "1";
        qtyInput.classList.add('itemQty')
        qty.appendChild(qtyInput);
        */
        var qtyInput = document.createElement('span');
        qtyInput.classList.add('quantity');
        qtyInput.innerHTML = '<input type="button" value="-" class="qtyMinus"><input type="text" class="qtyshow" value="1" name="itemQty[]" readonly><input type="button" value="+" class="qtyPlus">';

        qty.appendChild(qtyInput);

        //add remarks input field
        var remarksInput = document.createElement('input');
        remarksInput.name = "remarks[]";
        remarksInput.type = "text";
        remarksInput.value = "";
        remarksInput.classList.add('remarks');
        remarks.appendChild(remarksInput);

        
        //insert text to remove btn
        var removeItem = document.createElement('span');
        removeItem.innerHTML = '<a>x</a>';
        removeItem.setAttribute('onclick', 'removetr(this)');
        removeItem.classList.add('remove');
        btn.appendChild(removeItem);

        //remove table row/tr
        // btn.addEventListener('click', function(event){
        //     fooditems.deleteRow(event.path[3].rowIndex);
        // });
    }
    // remove table row on click close sign
    function removetr(o) {
     var p = o.parentNode.parentNode;
         p.parentNode.removeChild(p);
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