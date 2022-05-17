if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', ready);
} else {
  ready();
}

function ready() {
  updateCart();
  updateCartTotal();
  btnVisibility();
  var removeCartItemButtons = document.getElementsByClassName('remove-button');
  for (var i = 0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i];
    button.addEventListener('click', removeCartItem);
  }

  var quantityInputs = document.getElementsByClassName('cart-quantity-input');
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener('change', quantityChanged);
  }

  var addToCartButtons = document.getElementsByClassName('shop-item-button');
  for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i];
    button.addEventListener('click', addToCartClicked);
  }

  document
    .getElementsByClassName('checkout-button')[0]
    .addEventListener('click', purchaseClicked);
}

function btnVisibility() {
  if (
    localStorage.getItem('cart') &&
    JSON.parse(localStorage.getItem('cart')).length > 0
  ) {
    document.getElementsByClassName('checkout-button')[0].style.display =
      'block';
  } else {
    document.getElementsByClassName('checkout-button')[0].style.display =
      'none';
  }
}

function purchaseClicked() {
  alert('Thank you for your purchase');
  var cartItems = document.getElementsByClassName('cart-items')[0];
  while (cartItems.hasChildNodes()) {
    cartItems.removeChild(cartItems.firstChild);
  }
  localStorage.removeItem('cart');
  updateCartTotal();
  btnVisibility();
}

function removeCartItem(event) {
  var buttonClicked = event.target;
  var remove_title =
    buttonClicked.parentElement.parentElement.parentElement.getElementsByClassName(
      'cart-item-title'
    );
  var cart_items = JSON.parse(localStorage.getItem('cart'));
  cart_items = cart_items.filter(checkTitle);
  function checkTitle(item) {
    return remove_title[0].innerText != item.title;
  }
  localStorage.setItem('cart', JSON.stringify(cart_items));
  buttonClicked.parentElement.parentElement.parentElement.remove();
  updateCartTotal();
  btnVisibility();
}

function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartTotal();
}

function addToCartClicked(event) {
  var button = event.target;
  var shopItem = button.parentElement.parentElement;

  var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
  var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText;
  var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src;

  addItemToCart(title, price, imageSrc);
  updateCartTotal();
  btnVisibility();
}

function updateCart() {
  var cartItems = document.getElementsByClassName('cart-items')[0];
  if (localStorage.getItem('cart')) {
    var cart_items = JSON.parse(localStorage.getItem('cart'));
    for (var i = 0; i < cart_items.length; i++) {
      var cartRow = document.createElement('div');
      cartRow.classList.add('cart-row');

      var cartRowContents = `
  <div class='flex w-full justify-between items-center px-2 bg-white shadow-lg py-2 mx-3 my-1 '>
  <img src=${cart_items[i].image} alt="" class='w-1/6 h-[100px] object-contain'>
  <div class='flex w-1/2 flex-col px-4'>
      <p class='font-semibold truncate cart-item-title'>${cart_items[i].title}</p>
      <p class='text-lg font-bold cart-price'>${cart_items[i].price}</p>
  </div>

  <div class='flex sm:flex-col md:flex-col lg:flex-row'>
      <div class='flex items-center mb-1'>

          <p class='font-semibold'>Qty:</p>
          <input type="number" value='1' class='w-12 h-12 mx-4 px-2 cart-quantity-input border-2 border-black'>
      </div>
      <button class='bg-red-500 px-2 py-1 text-white font-semibold rounded-md text-lg w-3/4 lg:w-full remove-button'>Remove</button>
  </div></div>`;
      cartRow.innerHTML = cartRowContents;
      cartItems.append(cartRow);
      cartRow
        .getElementsByClassName('remove-button')[0]
        .addEventListener('click', removeCartItem);
      cartRow
        .getElementsByClassName('cart-quantity-input')[0]
        .addEventListener('change', quantityChanged);
    }
  }
}

function addItemToCart(title, price, imageSrc) {
  var cart = [];

  var cartItems = document.getElementsByClassName('cart-items')[0];

  var cartItemNames = cartItems.getElementsByClassName('cart-item-title');
  console.log(cartItemNames);
  for (var i = 0; i < cartItemNames.length; i++) {
    if (cartItemNames[i].innerText == title) {
      alert('This item is already added to the cart');
      return;
    }
  }
  while (cartItems.hasChildNodes()) {
    cartItems.removeChild(cartItems.firstChild);
  }

  var cart_item_obj = { title: title, price: price, image: imageSrc };

  if (!localStorage.getItem('cart')) {
    cart.push(cart_item_obj);
    localStorage.setItem('cart', JSON.stringify(cart));
  } else {
    cart = JSON.parse(localStorage.getItem('cart'));
    cart.push(cart_item_obj);
    localStorage.setItem('cart', JSON.stringify(cart));
  }
  var cart_items = JSON.parse(localStorage.getItem('cart'));
  for (var i = 0; i < cart_items.length; i++) {
    var cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');

    var cartRowContents = `
  <div class='flex w-full justify-between items-center px-2 bg-white shadow-lg py-2 mx-3 my-1 '>
  <img src=${cart_items[i].image} alt="" class='w-1/6 h-[100px] object-contain'>
  <div class='flex w-1/2 flex-col px-4'>
      <p class='font-semibold truncate cart-item-title'>${cart_items[i].title}</p>
      <p class='text-lg font-bold cart-price'>${cart_items[i].price}</p>
  </div>

  <div class='flex sm:flex-col md:flex-col lg:flex-row'>
      <div class='flex items-center mb-1'>

          <p class='font-semibold'>Qty:</p>
          <input type="number" value='1' class='w-12 h-12 mx-4 px-2 cart-quantity-input border-2 border-black'>
      </div>
      <button class='bg-red-500 px-2 py-1 text-white font-semibold rounded-md text-lg w-3/4 lg:w-full remove-button'>Remove</button>
  </div></div>`;
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow
      .getElementsByClassName('remove-button')[0]
      .addEventListener('click', removeCartItem);
    cartRow
      .getElementsByClassName('cart-quantity-input')[0]
      .addEventListener('change', quantityChanged);
  }
}

function updateCartTotal() {
  var cartItemContainer = document.getElementsByClassName('cart-items')[0];
  var cartRows = cartItemContainer.getElementsByClassName('cart-row');
  var total = 0;
  for (var i = 0; i < cartRows.length; i++) {
    var cartRow = cartRows[i];
    var priceElement = cartRow.getElementsByClassName('cart-price')[0];
    var quantityElement = cartRow.getElementsByClassName(
      'cart-quantity-input'
    )[0];
    var price = priceElement.innerText.replace('Rs. ', '');
    var quantity = quantityElement.value;
    total = total + price * quantity;
  }
  total = Math.round(total * 100) / 100;
  document.getElementsByClassName('cart-total-price')[0].innerText = total;
}
