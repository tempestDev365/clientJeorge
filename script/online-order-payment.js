const orderDetails = JSON.parse(localStorage.getItem("cart")); //items in the cart

let cartCount = localStorage.getItem("cart-count") //number of items in the cart

document.getElementById("cart-count").textContent = cartCount;
console.log(orderDetails);
console.log(cartCount);

let cart = JSON.parse(localStorage.getItem("cart")) || [];

function displayCart() {
  const cartContainer = document.getElementById("cart-items");
  cartContainer.innerHTML = "";
  subtotal = 0;

  orderDetails.forEach((item, index) => {
    subtotal += item.price * item.quantity;
    const cartItem = document.createElement("h1");
    cartItem.classList.add("cart-item");

    cartItem.innerHTML = `
            <div class="item-name">${item.name}</div>
            <div class="item-price">${item.price}</div>
            
            <div class="item-quantity">
            <span class="quantity">${item.quantity}</span>
            </div>
        `;
    cartContainer.appendChild(cartItem);
  });

  

  // Update subtotal and total price (including service charge)
  document.getElementById("subtotal-price").textContent = subtotal;
  document.getElementById("total-price").textContent = subtotal + 100;

}



// Function to save the cart in local storage
function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  localStorage.setItem("cart-count", cartCount);
}


function confirmPayment() {
  window.location.href = '../pages/transaction-processing.html';
  saveCart();
  updateCart();
}

window.onload = displayCart;





//--------------INPUT FORM JS----------------------------//

// Function to generate a unique transaction reference number
function generateTransactionRef() {
  const randomNum = Math.floor(Math.random() * 1000000);
  return `HYGGE${randomNum.toString().padStart(6, '0')}`;
}

// Handle form submission
document.getElementById('online-order-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const name = document.getElementById('name').value;
  const address = document.getElementById('address').value;
  const contact = document.getElementById('contact').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;
  const paymentRef = document.getElementById('paymentRef').value;
  const imageFile = document.getElementById('image').files[0];

  // Ensure image or payment reference number is provided
  if (!imageFile && !paymentRef) {
    alert('You must provide either an image or a payment reference number!');
    return;
  }

  const transactionRef = generateTransactionRef();
  const dateCreated = new Date().toLocaleString();

  // Store the data in local storage
  const data = {
    name,
    address,
    contact,
    email,
    message,
    image: imageFile ? URL.createObjectURL(imageFile) : null,
    paymentRef,
    transactionRef,
    dateCreated
  };

  let storedData = JSON.parse(localStorage.getItem('formData')) || [];
  storedData.push(data);
  localStorage.setItem('formData', JSON.stringify(storedData));

  alert('Orders submitted successfully!');
  resetForm();
});

// Function to handle image upload and preview
document.getElementById('image').addEventListener('change', function (e) {
  const imageContainer = document.getElementById('imagePreviewContainer');
  imageContainer.innerHTML = ''; // Clear any previous image

  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      const image = document.createElement('img');
      image.classList.add('image-view');h
      image.src = event.target.result;
      imageContainer.appendChild(image);

      const removeBtn = document.createElement('button');
      removeBtn.textContent = 'Remove';
      removeBtn.classList.add('remove-image');
      removeBtn.onclick = () => {
        document.getElementById('image').value = ''; // Clear input
        imageContainer.innerHTML = ''; // Clear preview
      };
      imageContainer.appendChild(removeBtn);
    };
    reader.readAsDataURL(file);
  }
});

// Function to reset the form
function resetForm() {
  document.getElementById('online-order-form').reset();
  document.getElementById('imagePreviewContainer').innerHTML = '';
}

























// // -----Form for reservation with advance order----------
// document.addEventListener("DOMContentLoaded", function () {
//     // Disable past dates
//     let today = new Date().toISOString().split('T')[0];
//     document.getElementById("date").setAttribute("min", today);


// });