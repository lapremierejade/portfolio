// main nav fixed
const header = document.querySelector('header');

document.addEventListener('scroll', () => {
  scrollPos = window.scrollY;

  // console.log(scrollPos);
  if(scrollPos > 50){
    header.classList.add('mainNavFixed');
  }
  else {
    header.classList.remove('mainNavFixed');
  }
})