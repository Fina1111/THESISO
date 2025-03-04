const navbar = document.getElementById("navbar")

function openMenu() {
  navbar.classList.add('show')
}

function closeMenu() {
  navbar.classList.remove('show')
}


document.querySelectorAll(".carousel").forEach((carousel) => {
const items = carousel.querySelectorAll(".carousel__item");

// Create navigation container
const nav = document.createElement("div");
nav.classList.add("carousel__nav");

// Create buttons dynamically
items.forEach((_, i) => {
const button = document.createElement("span");
button.classList.add("carousel__button");

button.addEventListener("click", () => {
  // Remove active class from all items and buttons
  items.forEach((item) => item.classList.remove("carousel__item--selected"));
  document.querySelectorAll(".carousel__button").forEach((btn) => btn.classList.remove("carousel__button--selected"));

  // Add active class to selected item and button
  items[i].classList.add("carousel__item--selected");
  button.classList.add("carousel__button--selected");
});

nav.appendChild(button);
});

// Append navigation buttons to the carousel
carousel.appendChild(nav);

// Select the first item on page load
items[0].classList.add("carousel__item--selected");
nav.children[0].classList.add("carousel__button--selected");
});

