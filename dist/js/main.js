document.addEventListener('scroll', function(e){
  if(window.scrollY > 1000){
    document.getElementsByTagName('nav')[0].classList.add('slide-down', 'attach-to-top')
  } 

   if(window.scrollY == 0){
    document.getElementsByTagName('nav')[0].classList.remove('slide-down', 'attach-to-top')
  } 
})