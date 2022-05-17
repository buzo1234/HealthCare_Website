const searchInput = document.getElementById('search');

var addToCartButtonsSearch = document.getElementsByClassName(
  'shop-item-search-button'
);

for (var i = 0; i < addToCartButtonsSearch.length; i++) {
  var button = addToCartButtonsSearch[i];
  button.addEventListener('click', addToCartClickedSearch);
}

function addToCartClickedSearch(event) {
  console.log('Button Pressed');
  var button = event.target;
  var shopItem = button.parentElement.parentElement;

  var title = shopItem.getElementsByClassName('shop-item-search-title')[0]
    .innerText;
  var price = shopItem.getElementsByClassName('shop-item-search-price')[0]
    .innerText;
  var imageSrc = shopItem.getElementsByClassName('shop-item-search-image')[0]
    .src;

  addItemToCart(title, price, imageSrc);
  updateCartTotal();
  btnVisibility();
}

searchInput.addEventListener('input', (e) => {
  const value = e.target.value.toLowerCase();
  if (value.length > 0) {
    document.getElementById('results').style.display = 'block';
  } else {
    document.getElementById('results').style.display = 'none';
  }

  var title = document.getElementsByClassName('shop-item-search-title');

  for (var i = 0; i < title.length; i++) {
    var element = title[i];
    if (!element.innerHTML.toLocaleLowerCase().includes(value)) {
      element.parentElement.parentElement.style.display = 'none';
    } else {
      element.parentElement.parentElement.style.display = 'flex';
    }
  }
  /* users.forEach(user => {
      const isVisible =
        user.name.toLowerCase().includes(value) ||
        user.email.toLowerCase().includes(value)
      user.element.classList.toggle("hide", !isVisible)
    }) */
});
