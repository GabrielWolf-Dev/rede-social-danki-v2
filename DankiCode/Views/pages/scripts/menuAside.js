const containerGrid = document.querySelector(".grid");
const btnMenuDesktop = document.querySelector(".feed-menu");
const btnMenuMobile = document.querySelector(".feed-menu-mobile");
const btnMenuMobileNavBar = document.querySelector(".navbar__btn-menu");
const navBar = document.querySelector(".navbar");

btnMenuDesktop.addEventListener("click", () => {
  containerGrid.classList.toggle("grid--navbar-hidden");
  navBar.classList.toggle("navbar--hide");
});

btnMenuMobileNavBar.addEventListener("click", () => {
  navBar.classList.add("navbar--hide");
  navBar.classList.remove("navbar--active");
});

btnMenuMobile.addEventListener("click", () => {
  navBar.classList.add("navbar--active");
  navBar.classList.remove("navbar--hide");
});
