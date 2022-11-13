const goHome = document.querySelector('#go-home');

document.addEventListener('scroll', () => {
  scrollPos = window.scrollY;

  // console.log(scrollPos);
  if(scrollPos > 100){
    goHome.classList.add('goHomeFixed');
  }
  else {
    goHome.classList.remove('goHomeFixed');
  }
})