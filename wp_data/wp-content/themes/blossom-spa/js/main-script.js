jQuery(window).resize(function() {
    addMarginBottomHeader();
});

jQuery(document).ready(function () {
    addMarginBottomHeader();
    jQuery('#banner_section .banner-list').owlCarousel({
        loop:true,
        nav:true,
        navText : ['<span class="fa fa-chevron-circle-left" aria-hidden="true"></span>','<span class="fa fa-chevron-circle-right" aria-hidden="true"></span>'],
        dots:true,
        margin:15,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsiveClass:true,
        lazyLoad:true,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            // 768:{
            //     items:2,
            //     nav:true
            // },
            // 992:{
            //     items:4,
            //     nav:true,
            //     loop:false
            // }
        }
    });
});

jQuery(document).ready(function () {
    jQuery('.compare__tab .owl-carousel.category__item').owlCarousel({
        items: 4,
        nav: false,
        dots: true,
        dotsEach: true,
        autoplay: false,
        loop:false,
        autoplayHoverPause: !0,
        margin: 15,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            }
        }
    });
});


function addMarginBottomHeader() {
    jQuery('.site-header').next().css("margin-top", jQuery('.site-header').outerHeight() + 'px');
}


jQuery(document).ready(function () {
    taisaoActiveFucntion(".taisao-list-item:first");
	jQuery('.taisao-list-item').click(function() {
        taisaoActiveFucntion(this);
    })

    tabLinksClickCommon(".compare__nav .flex-center .tabLinks:nth-child(1)");

	jQuery('.tabLinks').click(function() {
        tabLinksClickCommon(this);
    })
});
function taisaoActiveFucntion(element) {
    if(!jQuery(element).hasClass('active')){
        jQuery('.taisao-list-item.active, .taisao-detail-item.active').removeClass('active');
        jQuery(element).addClass('active');
        jQuery('.taisao-detail-item').eq(jQuery('.taisao-list-item').index(jQuery(element))).addClass('active');
    } else {
        return false;
    }
}

function tabLinksClickCommon(element) {
    if(!jQuery(element).hasClass('active')){
        jQuery('.tabContent.active').removeClass('active');
        jQuery(jQuery(element).attr('data-target')).addClass('active');
        jQuery('.tabLinks.active').removeClass('active');
        jQuery(element).addClass('active');
    } else {
        return false;
    }
}

jQuery(document).ready(function () {
    var getEleClose = jQuery('.show_popup--js');
    getEleClose.on('click', () => {
        jQuery('#img-popup-kqdt').css('display', 'none');
    });

    var getEleImg = jQuery(".img_show_popup");
    getEleImg.each(function( index, element ) {
        jQuery(element).on('click', function(e) {
            openPopupImg(e.target.src)
        });
    });
});

function openPopupImg(imgLink) {
    jQuery('#img-popup-kqdt').css('display', 'block');
    let popupHTML = `<div class="box-img-popup"><img class="item_img_popup"  src="${imgLink}"></div>`;
    jQuery('.show_popup--js').html(popupHTML);
}

//not clickable item
jQuery(document).ready(function () {
    jQuery('.item-notclickable>a').removeAttr("href");

    jQuery('.seach-submit__btn').click(function() {
        jQuery(".search-form-wrap .search-form").submit();
    })
});













