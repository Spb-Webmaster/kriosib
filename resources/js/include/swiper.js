// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/css';

export function swiper() {

    const swiper = new Swiper('.swiper', {

        slidesPerView: 4,
        autoplay: {
            delay: 5500,
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            /*     nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",*/
        },
        pagination: {
            //    el: ".swiper-pagination",
            //     dynamicBullets: true,
            clickable: true,
        },


    }).on('slideChange', function () {
        /*          setTimeout(() => {
                      This.find('.swiper-slide').find('.swiper__html').removeClass('custom-class');
                      This.find('.swiper-slide-active').find('.swiper__html').addClass('custom-class');
                  })*/
    });


}
