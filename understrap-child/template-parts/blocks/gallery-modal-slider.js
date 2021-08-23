jQuery(document).ready(function ($) {

    // SVGs for slider arrows    
    var nextArrow = '<svg xmlns="http://www.w3.org/2000/svg" width="15.734" height="10.49" viewBox="0 0 15.734 10.49"><path id="arrow-next" d="M18.734,10.371H6.348L9.477,7.233,8.245,6,3,11.245,8.245,16.49l1.233-1.233L6.348,12.119H18.734Z" transform="translate(18.734 16.49) rotate(180)" fill="#000"/>Next</svg>';
    var prevArrow = '<svg xmlns="http://www.w3.org/2000/svg" width="15.734" height="10.49" viewBox="0 0 15.734 10.49"><path id="arrow-prev" d="M18.734,10.371H6.348L9.477,7.233,8.245,6,3,11.245,8.245,16.49l1.233-1.233L6.348,12.119H18.734Z" transform="translate(-3 -6)" fill="#000"/>Previous</svg>';

    // Init block slider
    $('.gallery-modal-slider').each(function () {
        var gallerySlider = '#' + this.closest('.gallery-modal-slider-block').id;

        $(gallerySlider + ' .gallery-modal-slider').slick({
            accessibility: true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4,
            appendArrows: $(gallerySlider + ' .slider-nav'),
            prevArrow: '<i class="arrow prev">' + prevArrow + '</i>',
            nextArrow: '<i class="arrow next">' + nextArrow + '</i>',
            appendDots: $(gallerySlider + ' .pagination'),
            dots: true,
            customPaging: function (slick, index) {
                return (index + 1);
            },
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 374,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ]
        });
    });

    // Stop video playback on modal close
    $('.modal.vid').on('hide.bs.modal', function (e) {
        var $if = $(e.delegateTarget).find('iframe');
        var src = $if.attr("src");
        $if.attr("src", '/empty.html');
        $if.attr("src", src);
    });
});