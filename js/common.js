jQuery(document).ready(function($) {

    //JQuery: The script is responsible section portfolio myParallax -->
    $('#portfolio').myParallax({
        "speed" : "25"
    });

    //JQuery: This element is responsible for portfilio img -->
    $("#portfolio_grid").mixItUp();

    //JQuery: Portfolio -->
    $(".s_portfolio li").click(function() {
        $(".s_portfolio li").removeClass("active");
        $(this).addClass("active");
    });

    //JQuery: Connection MagnificPopup -->
    $(".popup_content").magnificPopup({
        type:"inline",
        midClick: true,
        mainClass: 'mfp-fade', 
        removalDelay: 300 
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
            $(".top_mnu").fadeOut(600); 
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
			$("[data-parallax='scroll']").each(function() {
				let bgImage = $(this).attr("data-image-src");
				if (bgImage && bgImage !== "") { // Проверяем, что атрибут не пустой
					$(this).parallax({
						imageSrc: bgImage,
						zIndex: 1
					});
				}
			});
		}
    });

    //JQuery: Make all divs the same Height --> 
    function alignResumeItems() {
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

    // and when window size is changing 
    $(window).on('resize', function () {
        setTimeout(alignResumeItems, 100); 
    });

    //JQuery: He is responsible for the slow scroll and loader 
    $(window).on('load', function() {
        $(".loader_inner").fadeOut();
        $(".loader").delay(400).fadeOut("slow");
        alignResumeItems(); // Запускаем выравнивание после загрузки картинок
        centerTopMenu(); // Центрируем меню после загрузки
    });

    //JQuery: Scroll Top -->
    $('#s_top').hide();
    // Показываем кнопку "Scroll Top" при прокрутке вниз на 100 пикселей и скрываем при возвращении вверх
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#s_top').fadeIn();
        } else {
            $('#s_top').fadeOut();
        }
    });
    // При клике на кнопку "Scroll Top" сначала уничтожаем параллакс, затем плавно скроллим к началу страницы, и после завершения анимации снова инициализируем параллакс для всех элементов с атрибутом data-parallax="scroll"
    $("#s_top").click(function () {
        if ($(window).width() > 992) {
            try {
                $("[data-parallax='scroll']").parallax("destroy");
            } catch (e) { }
        }
        // Плавный скролл к началу страницы
        $("html, body").stop().animate({ scrollTop: 0 }, 400, function () {
			if ($(window).width() > 922) {
				$("[data-parallax='scroll']").each(function() {
					let bgImage = $(this).attr("data-image-src");
					if (bgImage && bgImage !== "") {
						$(this).parallax({
							imageSrc: bgImage,
							zIndex: 1,
							iosFix: true,
							androidFix: true,
							bleed: 10
						});
					}
				});
			}
		});
        return false;
    });

    //JQuery: Height ul menu -->
    function centerTopMenu() {
        const $menu = $(".top_mnu ul");
        if ($menu.length) {
            $menu.css("margin-top", 0); 
            const windowHeight = $(window).height();
            const menuHeight = $menu.outerHeight();
            const offset = (windowHeight - menuHeight) / 2;

            if (offset > 0) {
                $menu.css("margin-top", offset + "px");
            }
        }
    }

    //JQuery: This code is responsible for the slow scroll and loader -->
    $(".toggle_mnu").on("click", function () {
        setTimeout(centerTopMenu, 50); 
    });

    $(window).on("resize", centerTopMenu);

    // Launch parallax for Direction
    $("#directions").myParallax({
        "speed" : "30"
    });

});