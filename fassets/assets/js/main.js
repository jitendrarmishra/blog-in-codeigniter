//HEADER
$(window).scroll(function(){
    if ($(window).scrollTop() >= 10) {
        $('header').addClass('fixed');    
    }
    else {
        $('header').removeClass('fixed');  
    }
});
//menubar
 $(".navbar-toggler").click(function() {
    $(this).toggleClass("toggler-close"), $(".mobile-navbar-nav").slideToggle();
})

$(document).ready(function() {  	
	//Scroll To Top 
	/* page scroll top on click function */
    $("button.back-to-top").on('click', function () {
        $('html').animate({
            scrollTop: 0
        }, 500);
        return false;
    })

    $(window).on("scroll", function () {
        var scrollWindowHeight = jQuery(window).scrollTop();
        if (scrollWindowHeight > 500) {
            $("button.back-to-top").slideDown(1000).fadeIn(1000);
        } else {
            $("button.back-to-top").slideUp(1000).fadeOut(1000);
        }
    });	

	//Pre-loader
	$("#loading").delay(200).fadeOut(500);
	$("#loading-center").on('click',function() {
	$("#loading").fadeOut(500);
	});	
	
}(jQuery));

//slider_section slider
$(".slider-section .owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    nav: true,
    dots: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplaySpeed: 2000,
    animateIn: 'fadeUp',
    animateOut: 'fadeOut',
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"]
});

/* current-series-slider */
$('.current-series-slider').owlCarousel({
	items:4,
	loop: true,
	autoplay: false,
	margin: 15,
	nav: false,
	dots: true,	
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
	responsive: {
		0: {
			items: 1
		},
		480: {
			items: 2
		},
		1024: {
			items:3
		},
		1200: {
			items: 4
		}
	}
});
$('.news-slider').owlCarousel({
	items:4,
	loop: true,
	autoplay: false,
	margin: 15,
	nav: true,
	dots: false,	
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
	responsive: {
		0: {
			items: 1
		},
		480: {
			items: 2
		},
		1024: {
			items:3
		},
		1200: {
			items: 4
		}
	}
});

/* current-series-slider */
$('.associated-team-slider').owlCarousel({
	items:5,
	loop: true,
	autoplay: false,
	margin: 15,
	nav: false,
	dots: true,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
	responsive: {
		0: {
			items: 1
		},
		480: {
			items: 2
		},
		1024: {
			items:4
		},
		1200: {
			items: 5
		}
	}
});

/* testimonial-slider */
$(".testimonial-slider").owlCarousel({
    items: 1,
    loop: true,
    autoplay: false,
    nav: true,
    dots: false,
    autoplay: true,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"]
});

/* sponsor-slider */
$('.sponsor-slider').owlCarousel({
	items:6,
	loop: true,
	autoplay: false,
	margin: 15,
	nav: true,
	dots: false,	
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
	responsive: {
		0: {
			items: 1
		},
		480: {
			items: 2
		},
		1024: {
			items:4
		},
		1200: {
			items: 6
		}
	}
});


/* DataTable */
$(document).ready( function () {
    $('#batsmen-table, #bowlers-table, #high-scores-table, #fielders-table').DataTable({
        paging: false,
        searching: false,
        lengthChange: false,
        responsive: true,
        dom: ''
    });
} );

$(document).ready( function () {
    $('#T20-bat-in-table, #T20-bowl-in-table').DataTable({
        paging: true,
        searching: false,
        autoWidth: true,
        pageLength: 10, 
        displayLength: 10,
        lengthChange: false,
        responsive: true,
        ordering: false, 
        dom: ''
    });
} );


//wow
new WOW().init();