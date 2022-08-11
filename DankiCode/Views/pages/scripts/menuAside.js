const $ = document.querySelector.bind(document);
const containerGrid = $(".grid");
const btnMenuDesktop = $(".feed-menu");
const btnMenuMobile = $(".feed-menu-mobile");
const btnMenuMobileNavBar = $(".navbar__btn-menu");
const navBar = $(".navbar");

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

window.onload = () => {
  const listItemNavBar = document.querySelectorAll(".navbar__item-list");

  listItemNavBar.forEach((item) => {
    const target = item;
    const link = item.children[1];
    const url = link.href;

    if (document.location.href === url) {
      target.classList.add("navbar__item-list--active");
    } else {
      target.classList.remove("navbar__item-list--active");
    }
  });
};
