const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    // centerSlide: 'true',
    // fade: 'true',
    // grabCursor: 'true',
    loop: true,
    slidesPerView: 4,
        spaceBetween: 30,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
    // autoplay: {
    //   delay: 2500,
    // },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      },
      1100: {
        slidesPerView: 4,
    },
  },
  });
  