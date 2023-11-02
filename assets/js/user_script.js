'use strict';



/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  document.body.classList.add("loaded");
});

// USER ACTIVE WINDOW
// JavaScript to show/hide the pop-up panel
const userIcon = document.querySelector('.user-icon');
const userName = document.querySelector('.user-name');
const popupPanel = document.querySelector('.popup-panel');
const closeBtn = document.querySelector('.user-close-btn');

let panelVisible = false;

// Add click event listeners to user icon and name elements
userIcon.addEventListener('click', togglePopupPanel);
userName.addEventListener('click', togglePopupPanel);
closeBtn.addEventListener('click', hidePopupPanel);

// Add scroll and resize event listeners to adjust the position of the pop-up panel
window.addEventListener('scroll', adjustPopupPosition);
window.addEventListener('resize', adjustPopupPosition);

function togglePopupPanel() {
  if (panelVisible) {
    hidePopupPanel();
  } else {
    showPopupPanel();
  }
}

function showPopupPanel() {
  popupPanel.style.display = 'block';
  panelVisible = true;
  adjustPopupPosition();
}

function hidePopupPanel() {
  popupPanel.style.display = 'none';
  panelVisible = false;
}

function adjustPopupPosition() {
  // Get the position of the user element
  const userRect = userName.getBoundingClientRect();
  // Set the position of the popup panel
  const popupWidth = popupPanel.offsetWidth;
  const popupHeight = popupPanel.offsetHeight;
  const spaceOnRight = window.innerWidth - userRect.left - userRect.width;

  // Check if there's enough space on the right to show the panel
  if (spaceOnRight >= popupWidth + 20) { // Adding 20px for the space from the right edge
    popupPanel.style.left = userRect.left + 'px';
  } else {
    // If not enough space on the right, align to the right edge of the screen
    popupPanel.style.left = (window.innerWidth - popupWidth - 20) + 'px';
  }

  // Set the position below the user name
  popupPanel.style.top = userRect.bottom + 'px';
}

// JavaScript to handle the cart functionality
const cartIcon = document.querySelector('.cart-icon');
const cartPanel = document.querySelector('.cart-panel');
const cartItemsWrapper = document.querySelector('.cart-items');
const totalPriceElement = document.querySelector('.total-price');
const closeCartBtn = document.querySelector('.close-cart-btn');

let cartItems = []; // Array to store cart items

// Add click event listener to cart icon to toggle cart panel visibility
cartIcon.addEventListener('click', toggleCartPanel);

// Add click event listener to close button to hide cart panel
closeCartBtn.addEventListener('click', hideCartPanel);

// Function to toggle the cart panel visibility
function toggleCartPanel() {
  if (cartPanel.style.display === 'block') {
    hideCartPanel();
  } else {
    showCartPanel();
  }
}

// Function to show the cart panel
function showCartPanel() {
  cartPanel.style.display = 'block';
}

// Function to hide the cart panel
function hideCartPanel() {
  cartPanel.style.display = 'none';
}

// Function to add a new item to the cart
function addItemToCart(productName, price) {
  const cartItem = {
    name: productName,
    price: price,
    quantity: 1,
  };
  cartItems.push(cartItem);
  renderCartItems();
}

// Function to render the cart items
function renderCartItems() {
  cartItemsWrapper.innerHTML = '';
  let totalPrice = 0;
  cartItems.forEach((item) => {
    // const listItem = document.createElement('li');
    // listItem.innerHTML = `
    //   <div class="cart-item-content">
    //     <span>${item.name}</span>
    //     <span>PHP ${item.price.toFixed(2)}</span>
    //     <input type="number" min="1" value="${item.quantity}" onchange="updateQuantity('${item.name}', this.value)" style="color: white">
    //     <button onclick="deleteCartItem('${item.name}')" style="color: white">Delete</button>
    //   </div>
    // `;
    cartItemsWrapper.appendChild(listItem);
    totalPrice += item.price * item.quantity;
  });

  totalPriceElement.textContent = `PHP ${totalPrice.toFixed(2)}`;
}

// Function to update the quantity of a cart item
function updateQuantity(productName, newQuantity) {
  const itemToUpdate = cartItems.find((item) => item.name === productName);
  if (itemToUpdate) {
    itemToUpdate.quantity = parseInt(newQuantity, 10);
    renderCartItems();
  }
}

// Function to delete a cart item
function deleteCartItem(productName) {
  cartItems = cartItems.filter((item) => item.name !== productName);
  renderCartItems();
}

// Example usage
addItemToCart('Product 1', 10.99);
addItemToCart('Product 2', 24.99);
addItemToCart('Product 3', 8.50);addItemToCart('Product 1', 10.99);
addItemToCart('Product 2', 24.99);
addItemToCart('Product 3', 8.50);


/**
 * add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
}

addEventOnElements(navTogglers, "click", toggleNavbar);



/**
 * HEADER & BACK TOP BTN
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

let lastScrollPos = 0;

const hideHeader = function () {
  const isScrollBottom = lastScrollPos < window.scrollY;
  if (isScrollBottom) {
    header.classList.add("hide");
  } else {
    header.classList.remove("hide");
  }

  lastScrollPos = window.scrollY;
}

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
    hideHeader();
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});



/**
 * HERO SLIDER
 */

const heroSlider = document.querySelector("[data-hero-slider]");
const heroSliderItems = document.querySelectorAll("[data-hero-slider-item]");
const heroSliderPrevBtn = document.querySelector("[data-prev-btn]");
const heroSliderNextBtn = document.querySelector("[data-next-btn]");

let currentSlidePos = 0;
let lastActiveSliderItem = heroSliderItems[0];

const updateSliderPos = function () {
  lastActiveSliderItem.classList.remove("active");
  heroSliderItems[currentSlidePos].classList.add("active");
  lastActiveSliderItem = heroSliderItems[currentSlidePos];
}

const slideNext = function () {
  if (currentSlidePos >= heroSliderItems.length - 1) {
    currentSlidePos = 0;
  } else {
    currentSlidePos++;
  }

  updateSliderPos();
}

heroSliderNextBtn.addEventListener("click", slideNext);

const slidePrev = function () {
  if (currentSlidePos <= 0) {
    currentSlidePos = heroSliderItems.length - 1;
  } else {
    currentSlidePos--;
  }

  updateSliderPos();
}

heroSliderPrevBtn.addEventListener("click", slidePrev);

/**
 * auto slide
 */

let autoSlideInterval;

const autoSlide = function () {
  autoSlideInterval = setInterval(function () {
    slideNext();
  }, 7000);
}

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], "mouseover", function () {
  clearInterval(autoSlideInterval);
});

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], "mouseout", autoSlide);

window.addEventListener("load", autoSlide);



/**
 * PARALLAX EFFECT
 */

const parallaxItems = document.querySelectorAll("[data-parallax-item]");

let x, y;

window.addEventListener("mousemove", function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // reverse the number eg. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    x = x * Number(parallaxItems[i].dataset.parallaxSpeed);
    y = y * Number(parallaxItems[i].dataset.parallaxSpeed);
    parallaxItems[i].style.transform = `translate3d(${x}px, ${y}px, 0px)`;
  }

});
function togglePanel() {
  var panel = document.getElementById("profilePanel");
  panel.classList.toggle("active");
}