// Sticky Navbar

$(window).scroll(function () {
    if ($(this).scrollTop() > 45) {
        $('.navbar').addClass('sticky-top shadow-sm');
    } else {
        $('.navbar').removeClass('sticky-top shadow-sm');
    }
});


// Sticky Navbar
// $(window).scroll(function () {
//     if ($(this).scrollTop() > 45) {
//         $('.nav-bar').addClass('sticky-top');
//     } else {
//         $('.nav-bar').removeClass('sticky-top');
//     }
// });

// Header carousel
$(".header-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    items: 1,
    dots: true,
    loop: true,
    nav : true,
    navText : [
        '<i class="bi bi-chevron-left"></i>',
        '<i class="bi bi-chevron-right"></i>'
    ]
});


 // Get the current URL path
 const currentPath = window.location.pathname;

 // Select all navigation links
 const navLinks = document.querySelectorAll('.navbar-nav .nav-item.nav-link');

 // Loop through the links and add the 'active' class to the matching link
 navLinks.forEach(link => {
   if (link.href.includes(currentPath)) {
     link.classList.add('active');
   }
 });




// packages carousel
// $(".packages-carousel").owlCarousel({
//     autoplay: true,
//     smartSpeed: 100,
//     center: false,
//     dots: false,
//     loop: true,
//     margin: 25,
//     nav : true,
//     navText : [
//         '<i class="fa-solid fa-arrow-left fa-xl"></i>',
//         '<i class="fa-solid fa-arrow-right fa-xl"></i>'
//     ],
//     responsiveClass: true,
//     responsive: {
//         0:{
//             items:1
//         },
//         768:{
//             items:2
//         },
//         992:{
//             items:2
//         },
//         1200:{
//             items:3
//         }
//     }
// });

// Service carousel


 // testimonial carousel
 $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    center: true,
    dots: true,
    loop: true,
    margin: 25,
    nav : true,
    navText : [
        '<i class="fi fi-arrow-left"></i>',
        '<i class="fi fi-arrow-right"></i>'
    ],
    responsiveClass: true,
    responsive: {
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:2
        },
        1200:{
            items:3
        }
    }
});

