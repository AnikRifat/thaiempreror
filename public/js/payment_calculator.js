var discAmount = document.getElementById('discAmount');
var tDue = document.getElementById('tDue');
var discountedPrice = document.getElementById('discountedPrice');
var cash = document.getElementById('cash'); //customize
var card = document.getElementById('card'); //customize

discountedPrice.innerHTML = tDue.innerHTML;
discAmount.addEventListener('keyup', onDiscAmountChange);

if(discAmount.value != ''){            
     discountedPrice.innerHTML = tDue.innerHTML - (tDue.innerHTML*discAmount.value/100).toFixed(2);
}

function onDiscAmountChange(){           
    // discountedPrice.innerHTML = calcDiscount(tDue.innerHTML, event.path[0].value);
    discountedPrice.innerHTML = (tDue.innerHTML - (tDue.innerHTML*discAmount.value/100)).toFixed(2);
    // if(card != ''){
    //     cash.value = discountedPrice.innerHTML;
    // }
    cash.value = (parseFloat(discountedPrice.innerHTML) - card.value).toFixed(2);
    calcReturn();
}

cash.value = discountedPrice.innerHTML;
card.addEventListener('keyup', addCardAmount);
function addCardAmount(){
    cash.value = (discountedPrice.innerHTML - card.value).toFixed(2);
    calcReturn();
}

//return calc
var receive = document.getElementById('receive');
var returnable = document.getElementById('returnable');
receive.addEventListener('keyup', calcReturn);
function calcReturn(){
    if(receive.value == ""){
        returnable.innerHTML = 0;
    } else {
        returnable.innerHTML = (receive.value - cash.value).toFixed(2);
    }
}