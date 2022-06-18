$(window).load(function() {
    $('.flexslider').flexslider({
      // auto slide
      slideshow:true,
      // intrevalo do auto slide
      slideshowSpeed: 3000, 
      //tipo de animacao
      animation: "slide",
      // loop, senao para no ultimo
      animationLoop: true,
      // smoother animacoes
      useCSS:true
    });
  });