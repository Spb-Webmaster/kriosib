export function slick() {

    if($('.block_4_regular_slider').length) {
        $('.block_4_regular_slider').slick({
            //dots: true,
            infinite: true,
            speed: 1000,
            autoplaySpeed: 5000,
            slidesToShow: 1,
            autoplay: false,
            arrows: true,
            adaptiveHeight: true,
            fade: true,
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        // dots: true
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        })
    }

}
