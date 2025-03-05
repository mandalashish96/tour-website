// let nextBtn = document.querySelector('.next');
// let prevBtn = document.querySelector('.prev');
// let slider = document.querySelector('.slider');

// nextBtn.addEventListener('click', function(){
//     let slides = document.querySelectorAll('.slides');
//     slider.append(slides[0]);
// });

// prevBtn.addEventListener('click', function(){
//     let slides = document.querySelectorAll('.slides');
//     slider.prepend(slides[slides.length - 1]);
// });

$(document).ready(function () {
  // Initialize Owl Carousel
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    autoplay: true,
    margin: 10,
    

    nav: false,
    responsive: {
      0: { items: 1 },
      576: { items: 2 },
      768: { items: 3 },
      1200: { items: 4 }
    }
  });

  // Custom Navigation Events
  $('#prev-btn').click(function () {
    owl.trigger('prev.owl.carousel');
  });

  $('#next-btn').click(function () {
    owl.trigger('next.owl.carousel');
  });
});




