// menu burger
const burger = document.querySelector("#burger");
const span1 = document.querySelector("#burger-span-1");
const span2 = document.querySelector("#burger-span-2");
const span3 = document.querySelector("#burger-span-3");
const nav = document.querySelector("#mobile-nav");

burger.addEventListener("click", () => {
  burger.classList.toggle("burgerFixed");
  nav.classList.toggle("mobileNavActive");
  span1.classList.toggle("span1Active");
  span2.classList.toggle("span2Active");
  span3.classList.toggle("span3Active");
});
