const containerGrid = document.querySelector(".grid");
const btnMenuDesktop = document.querySelector(".feed-menu");
const btnMenuMobile = document.querySelector(".navbar__btn-menu");
const navBar = document.querySelector(".navbar");

btnMenuDesktop.addEventListener("click", () => {
  containerGrid.classList.toggle("grid--navbar-hidden");
  navBar.classList.toggle("navbar--hide");
});

btnMenuMobile.addEventListener("click", () => {
  navBar.classList.toggle("navbar--hide");
});
