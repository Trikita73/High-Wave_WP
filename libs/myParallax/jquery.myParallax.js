(function($) {

    $.fn.myParallax = function( options ) {

        var settings = $.extend({
            "speed" : "150"
        }, options);

        return this.each(function() {

            var ths = $(this);
            var imgPath = ths.data('parallax-image') || ths.data('parallax-src'); // Поддерживаем оба варианта атрибута
            // ПРОВЕРКА: Если пути к картинке нет, выходим из функции
            if (!imgPath) {
                console.warn("myParallax: No image path found for", ths);
                return; 
            }

            ths.css({
                "min-height" : "400px",
                "position" : "relative",
                "overflow" : "hidden"
            })
            .wrapInner("<div class='parallax-content' style='position:relative;z-index:1'>")
            .prepend("<div class='image-parallax' style='background-image:url(" + imgPath + ");background-size:cover;background-position:top;position:absolute;top:0;left:0;width:100%;will-change: transform'>");
			

            function parallaxInit() {
                var pheight = ths.outerHeight(); // Используем outerHeight для точности
                var imgChild = ths.children(".image-parallax");

                imgChild.css({
                    "height" : pheight * 1.7,
                    "top" : -pheight
                });

                var st = $(document).scrollTop();
                var windowHeight = $(window).height();
                var offsetTop = ths.offset().top;
                
                var sp = offsetTop - windowHeight;
                var ob = offsetTop + pheight;
                var sr = st - sp;

                if(st >= sp && st <= ob) {
                    var yPos = sr / settings.speed;
                    imgChild.css({
                        "transform" : "translate3d(0px, " + yPos + "%, 0px)",
                        "-webkit-transform" : "translate3d(0px, " + yPos + "%, 0px)"
                    });
                }
            }

            // Используем современные обработчики событий
            $(window).on('scroll', parallaxInit);
            $(window).on('load', parallaxInit);
            $(window).on('resize', parallaxInit); // Только для окна, а не для всех элементов "*"

            // Первый запуск сразу после инициализации
            parallaxInit();
        });
    };

})(jQuery);