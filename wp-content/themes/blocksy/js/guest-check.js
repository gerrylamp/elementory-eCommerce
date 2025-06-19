document.addEventListener('DOMContentLoaded', function () {
  const addToCartSelectors = [
    '.add_to_cart_button',        // for shop/archive pages
    '.single_add_to_cart_button'  // for single product pages
  ];

  const loginModalTrigger = document.querySelector('a[href="#account-modal"].ct-account-item');

  addToCartSelectors.forEach(selector => {
    document.querySelectorAll(selector).forEach(button => {
      button.addEventListener('click', function (e) {
        if (!guestCheck.is_logged_in) {
          e.preventDefault();
          e.stopPropagation();

          if (loginModalTrigger) {
            loginModalTrigger.setAttribute('aria-expanded', 'true');
            loginModalTrigger.click();
          }

        //   alert('Please log in to add items to your cart.');
        }
      });
    });
  });

  // Handle direct form submission on single product pages (extra safety)
  const productForms = document.querySelectorAll('form.cart');
  productForms.forEach(form => {
    form.addEventListener('submit', function (e) {
      if (!guestCheck.is_logged_in) {
        e.preventDefault();
        e.stopPropagation();

        if (loginModalTrigger) {
          loginModalTrigger.setAttribute('aria-expanded', 'true');
          loginModalTrigger.click();
        }

        // alert('Please log in to add items to your cart.');
      }
    });
  });
});
