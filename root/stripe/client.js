// A reference to Stripe.js initialized with a fake API key.
// Sign in to see examples pre-filled with your key.
var stripe = Stripe("pk_live_nDfzSufsOzGE7LBnxmBOIoQR005cac1s3c");
// The items the customer wants to buy
var total = calculateSubTotal();
if (total > 0) {
    total = total.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
}
var purchase = {
  price: total
};
// Disable the button until we have Stripe set up on the page
document.querySelector("button").disabled = true;
fetch("/stripe/checkout.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json"
  },
  body: JSON.stringify(purchase)
})
  .then(function(result) {
    return result.json();
  })
  .then(function(data) {
    var elements = stripe.elements();
    var style = {
      base: {
        color: "#32325d",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#32325d"
        }
      },
      invalid: {
        fontFamily: 'Arial, sans-serif',
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };
    var card = elements.create("card", { hidePostalCode: true, style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");
    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("button").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });
    var form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      var name = document.getElementById('name').value;
      if (name == ''){
          showError('The Name field is required')
          return;
      }
      
      var phone = document.getElementById('phone').value;
      if (phone == ''){
          showError('The Contact Number field is required')
          return;
      }
      
      var email = document.getElementById('email').value;
      if (email == ''){
          showError('The Email field is required')
          return;
      }
      
      var mode = document.getElementsByName('payment_mode');
      var i;
      var paymentMode = '';

      for (i = 0; i < mode.length; i++) {
        if (mode[i].checked) {
            paymentMode = mode[i].value
        }
      }
      if (paymentMode === 'Stripe' && document.getElementsByName('delivery_mode')[1].checked) {
          var address = document.getElementById('address').value;
          if (address == '') {
             showError('The Address field is required')
             return;
          }
          
          var area = document.getElementById('area').value;
          if (area == '') {
             showError('The Suburb field is required')
             return;
          }
      }
      
      // Complete payment when the submit button is clicked
      payWithCard(stripe, card, data.clientSecret);
    });
  });
// Calls stripe.confirmCardPayment
// If the card requires authentication Stripe shows a pop-up modal to
// prompt the user to enter authentication details without leaving your page.
var payWithCard = function(stripe, card, clientSecret) {
  loading(true);
  stripe
    .confirmCardPayment(clientSecret, {
      receipt_email: document.getElementById('email').value,
      payment_method: {
        card: card,
        billing_details: {
            name: document.getElementById('name').value,
            phone: document.getElementById('phone').value,
            email: document.getElementById('email').value,
        }
      }
    })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        showError(result.error.message);
      } else {
        // The payment succeeded!
        orderComplete(result.paymentIntent.id);
      }
    });
};
/* ------- UI helpers ------- */
// Shows a success message when the payment is complete
var orderComplete = function(paymentIntentId) {
  loading(false);
  document.querySelector("button").disabled = true;
  submitOrder();
};
// Show the customer the error from Stripe if their card fails to charge
var showError = function(errorMsgText) {
  loading(false);
  var errorMsg = document.querySelector("#card-error");
  errorMsg.textContent = errorMsgText;
  setTimeout(function() {
    errorMsg.textContent = "";
  }, 10000);
};
// Show a spinner on payment submission
var loading = function(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("button").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("button").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
};