let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');
let popup = document.querySelector('#popup-message');
let closePopup = document.querySelector('#close-popup');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

// Function to show popup
function showPopupMessage() {
    popup.classList.add('active'); // Display the popup
}

// Close the popup when the button is clicked
closePopup.onclick = () => {
    popup.classList.remove('active');
};

// Example: Simulate an appointment submission
document.querySelector('form').onsubmit = (e) => {
    e.preventDefault(); // Prevent the actual form submission
    showPopupMessage(); // Show the popup message
};
