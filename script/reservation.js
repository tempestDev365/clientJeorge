document.addEventListener("DOMContentLoaded", function () {
  // Disable past dates
  let today = new Date().toISOString().split("T")[0];
  document.getElementById("date").setAttribute("min", today);
});
const transactionRef = document.getElementById("transactionRef");
//--------------INPUT FORM JS----------------------------//

// Function to generate a unique transaction reference number
function generateTransactionRef() {
  const randomNum = Math.floor(Math.random() * 1000000);
  transactionRef.value = `#RSV${randomNum}`;
}

// Handle form submission
// document.getElementById('reservation-form').addEventListener('submit', function (e) {
//   e.preventDefault();

//   const name = document.getElementById('name').value;
//   const contact = document.getElementById('contact').value;
//   const email = document.getElementById('email').value;
//   const date = document.getElementById('date').value;
//   const time = document.getElementById('time').value;
//   const people = document.getElementById('people').value;

//   const transactionRef = generateTransactionRef();
//   const dateCreated = new Date().toLocaleString();

//   // Store the data in local storage
//   const data = {
//     name,
//     contact,
//     email,
//     time,
//     date,
//     people,
//     transactionRef,
//     dateCreated
//   };

//   let storedData = JSON.parse(localStorage.getItem('formData')) || [];
//   storedData.push(data);
//   localStorage.setItem('formData', JSON.stringify(storedData));

//   alert('Reservation submitted successfully!');
//   resetForm();
// });

// // Function to reset the form
// function resetForm() {
//   document.getElementById('reservation-form').reset();
// }
