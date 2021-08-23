jQuery(document).ready(function ($) {
    // Adds a class to the search button to hide/show the form then focus after .3 seconds
    $(".top-bar .search-trigger").on("click", function (e) {
        if ($(".search-part #s").hasClass("visible")) {
            $(".search-part #s").removeClass("visible");
        } else {
            $(".search-part #s").addClass("visible");
            setTimeout(function(){$(".search-part #s").focus()}, 300);
        }
    })

    var bstrapMobileSize = 992;
    if ($(window).width() < bstrapMobileSize) {
        $(".dropdown-toggle").attr("data-toggle", "dropdown");
    } else {
        $(".dropdown-toggle").removeAttr("data-toggle dropdown");
    }

    // Bootstrap menu magic
    $(window).on('resize', function () {
        if ($(window).width() < bstrapMobileSize) {
            $(".dropdown-toggle").attr("data-toggle", "dropdown");
        } else {
            $(".dropdown-toggle").removeAttr("data-toggle dropdown");
        }
    });
});