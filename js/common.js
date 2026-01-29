$(document).ready(function() {

	//JQuery: The script is responsible section portfolio myParallax -->
	$('#portfolio').myParallax({
		"speed" : "25"
	});

	//JQuery: Section Resume ->
	/*
	$(window).on("load resize orientationchange", function () {
    	adjustMaskText();
  	});
	*/

	//JQuery: This element is responsible for portfilio img -->
	$("#portfolio_grid").mixItUp();

	//JQuery: Portfolio -->
	$(".s_portfolio li").click(function() {
		$(".s_portfolio li").removeClass("active");
		$(this).addClass("active");
	});

	//JQuery: Connection MagnificPopup -->
	//$(".popup").magnificPopup({type:"image"});
	$(".popup_content").magnificPopup({
		type:"inline",
		midClick: true,
		mainClass: 'mfp-fade', // add animation class
		removalDelay: 300 // wait when animation finish after class close
	});
	$(".popup_direct").magnificPopup({type:"inline"});

	//JQuery: This code animation in the section About -->
	$(".animation_1").animated("flipInY", "flipOutDown");
	$(".animation_2").animated("fadeInLeft", "fadeOutDown");
	$(".animation_3").animated("fadeInRight", "fadeOutDown");

	//JQuery: This code animation left and right section resume -->
	$(".left .resume_item").animated("fadeInLeft", "fadeOutDown");
	$(".right .resume_item").animated("fadeInRight", "fadeOutDown");

	//JQuery: Title animation on the header -->
	$(".top_text h1").animated("fadeInDown", "fadeOutUp");
	$(".top_text p, .section_header").animated("fadeInUp", "fadeOutDown");

	//JQuery: This code changes the height of the window (resize Height) -->
	function heightDetect() {
		$(".main_head").css("height", $(window).height());
	};
	heightDetect();
	$(window).resize(function() {
		heightDetect();
	});

	//JQuery: This is code has animation sandvich -->
	$(".toggle_mnu").click(function() {
		$(".sandwich").toggleClass("active");	
	});

	//JQuery: Highlighting the menu -->
	$(".top_mnu ul a").click(function() {
		$(".top_mnu").fadeOut(600);
		$(".sandwich").toggleClass("active");
	}).append("<span>");

	//JQuery: This code responsible for opening menu and fade -->
	$(".toggle_mnu").click(function() {
		if ($(".top_mnu").is(":visible")) {
			$("top_text").removeClass("h_opacify");
			$(".top_mnu").fadeOut(600); //fadeIn - ефект(скорость)
			$(".top_mnu li a").removeClass("fadeInUp animated");
		} else {
			$("top_text").addClass("h_opacify");
			$(".top_mnu").fadeIn(600);
			$(".top_mnu li a").addClass("fadeInUp animated")
		};			
	});

	//JQuery: This code is responsible for MagnificPopup at Portfolio -->
	$(".portfolio_item").each(function(i) {
		$(this).find("button").attr("href", "#work_" + i);
		$(this).find(".podrt_descr").attr("id", "work_" + i);
	});

	//JQuery: BootstrapValidation -->
	$("input, select, textarea").jqBootstrapValidation();

	//JQuery: Scroll Menu -->
	$(".top_mnu ul a").mPageScroll2id({
		scrollSpeed: 350,
		scrollEasing: 'linear',
		offset: 0,
		onStart: function () {
			try {
				$("[data-parallax='scroll']").parallax("destroy");
			} catch (e) {}
		},
		onComplete: function () {
			$("[data-parallax='scroll']").parallax({
				imageSrc: 'img/header/header.jpg',
				zIndex: 1
			});
		}
	});

	//JQuery: Make all divs the same Height --> 
	function alignResumeItems() {
		//dropp height for div
		$('.left .resume_item, .right .resume_item').css('height', 'auto');

		let leftItems = $('.left .resume_item');
		let rightItems = $('.right .resume_item');
		let count = Math.min(leftItems.length, rightItems.length); 

		for (let i = 0; i < count; i++) {
			let leftHeight = $(leftItems[i]).outerHeight();
			let rightHeight = $(rightItems[i]).outerHeight();
			let maxHeight = Math.max(leftHeight, rightHeight);

			$(leftItems[i]).height(maxHeight);
			$(rightItems[i]).height(maxHeight);
		}
	}

	// launch after loading
	$(window).on('load', alignResumeItems);
	// and when window size is changing 
	$(window).on('resize', function () {
		setTimeout(alignResumeItems, 100); // wait when all div-blocks are counting 
	});

});

// JQuery: size (margin, padding, font-size) for text which locate in div #resume -->
/*
function adjustMaskText() {
  $(".portfolio_item").each(function () {
    const $item = $(this);
    const $mask = $item.find(".mask");
    const $h2 = $mask.find("h2");
    const $p = $mask.find("p");
    const $ul = $mask.find("ul");

    const width = $item.outerWidth();
    const height = $item.outerHeight();

    const vw = $(window).width() / 100;
    const vh = $(window).height() / 100;
    const index = vw + vh;

    // Вычислим размеры на основе index
    const fontSize = Math.max(12, index * 0.8);          // минимум 12px
    const headingSize = fontSize + 4;
    const paddingTop = Math.max(10, index * 2);          // минимум 10px

    // Применим стили
    $mask.css({
      "padding-top": paddingTop + "px",
      "padding-left": 0,
      "padding-right": 0,
      "padding-bottom": "10px", // можно настроить
      "text-align": "center"
    });

    $h2.css({
      "font-size": headingSize + "px",
      "margin-bottom": "8px"
    });

    $p.css("font-size", fontSize + "px");
    $ul.css("font-size", (fontSize - 1) + "px");
  });
}
*/


//JQuery: He is responsible for the slow scroll and loader -->
$(window).load(function() {
	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");

});

//JQuery: Scroll Top -->
$('#s_top').hide();

$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#s_top').fadeIn();
		} else {
			$('#s_top').fadeOut();
		}
	});

	$("#s_top").click(function () {
		// turn off parallax if it active
		if ($(window).width() > 992) {
			try {
				$("[data-parallax='scroll']").parallax("destroy");
			} catch (e) { }
		}

		// scroll top
		$("html, body").stop().animate({ scrollTop: 0 }, 400, function () {
			// return parallax after scroll
			if ($(window).width() > 922) {
				$("[data-parallax='scroll']").parallax({
					imageSrc: 'img/header/header.jpg',
					zIndex: 1
				}); 
			}
		});
		return false;
	});
});

//JQuery: Height ul menu -->
function centerTopMenu() {
	const $menu = $(".top_mnu ul");

	if ($menu.length) {
		$menu.css("margin-top", 0); // dropp height

		const windowHeight = $(window).height();
		const menuHeight = $menu.outerHeight();
		const offset = (windowHeight - menuHeight) / 2;

		// If offset more > than 0 apply this condition
		if (offset > 0) {
			$menu.css("margin-top", offset + "px");
		}
	}
}

//  Call when open menu
$(".toggle_mnu").on("click", function () {
	setTimeout(centerTopMenu, 50); // Take some time for view menu
});

// Call when size window change
$(window).on("resize", centerTopMenu);

// Call when page is loading 
$(window).on("load", centerTopMenu);


