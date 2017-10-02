$(document).ready(function () {

    $('.portofolio-center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 560,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $("a.menu-jump-animate").on('click', function (e) {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 1100, function () {
            window.location.hash = hash;
        });
    });
//    // initial
//    const wrapper_vertical_tab = $('#vertical-tab-content-wrapper')
//            const initial_content = $('#vertical-tab-content-1').clone()
//            wrapper_vertical_tab.append(initial_content)
//
//    $('#vertical-tab a').click(function () {
//
//        const content = $('#vertical-tab-content-' + $(this).attr('data-target')).clone()
//                wrapper_vertical_tab.html(content)
//        return true
//    })

});

