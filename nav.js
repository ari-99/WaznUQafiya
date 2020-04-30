var prevOffset = window.pageYOffset;
var isCollapsed = false;
var mediaQuery = window.matchMedia("(max-width: 634px)");
var firstScroll = true;
$(window).scroll(function (e) {
    let currOffset = window.pageYOffset;
    if (currOffset > prevOffset && !isCollapsed) {
        $("div.nav #copyright").fadeOut();
        console.log('scroll down');
        $("div.nav").stop();
        if (!mediaQuery.matches) {
            $("div.nav").animate({
                height: '60px',
            }, () => {
                // $("div.nav").css('align-items', 'flex-end');
            });
            $("div.nav a:not(#dropdown)").fadeIn();
        } else {
            if (!$(".downArrow").hasClass('collapsed')) {
                $("div.nav a").fadeIn();
            } else {
                $('a.activeLink').fadeIn(200);
                $(".downArrow").parent('a').fadeIn();
                $("#logo").animate({
                    height: '60px',
                }, 200);
            }
            $("div.nav").css('height', '');
            if (firstScroll) {
                $('.downArrow').click();
                firstScroll = false;
            }
        }
        isCollapsed = true;
    } else if (currOffset < 3 && isCollapsed) {
        console.log('scroll up');
        $("div.nav #copyright").fadeIn();
        $("div.nav").stop();
        if ($(".downArrow").hasClass('collapsed')) {
            $("#logo").css('height', '150px');
        }
        $("div.nav").animate({
            height: '20vh',
        }, () => {
            // $("div.nav").css('align-items', 'center');
        });
        $("div.nav a").fadeOut();
        isCollapsed = false
    }
    prevOffset = currOffset;
    // console.log(`current offset ${prevOffset}`)
});
$('.downArrow').click(e => {
    $('.nav a[href]:not(.activeLink)').slideToggle(200);
    if (!$(e.target).hasClass('collapsed')) {
        $("#logo").animate({
            height: '60px',
        }, 200);
        // $(e.target).parent('a').css('background-color', '#405264');
    } else {
        $("#logo").css('height', '');
        // $(e.target).parent('a').css('background-color', '');
    }
    $(e.target).toggleClass('collapsed');

});
// inView.offset(300);
if (mediaQuery.matches) {
    inView.threshold(0.3);
} else {
    inView.threshold(0.7);
}
inView('#searchSec').on('enter', () => {
    inViewHandler(1);
    
});
inView('#suggestSec').on('enter', () => {
    inViewHandler(2);
});
inView('#showcaseSec').on('enter', () => {
    inViewHandler(3);
});
inView('#links').on('enter', () => {
    inViewHandler(4);
});
inView('#links').on('exit', () => {
    inViewHandler(3);
});

function inViewHandler(childNo) {
    if (!firstScroll) {
        if (mediaQuery.matches && $('.downArrow').hasClass('collapsed')) {
            $('.nav a.activeLink').toggle(false);
            $('.nav a').toggleClass('activeLink', false);
            $(`.nav a:nth-of-type(${childNo})`).toggleClass('activeLink', true);
            $('.nav a.activeLink').slideDown(200);
        }
    }else {
        $('.nav a').toggleClass('activeLink', false);
        $(`.nav a:nth-of-type(${childNo})`).toggleClass('activeLink', true);
    }
}