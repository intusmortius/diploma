// import Swiper from 'swiper';
// import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Swiper from 'swiper/bundle';

var swiper = new Swiper('.home-slider-container', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });