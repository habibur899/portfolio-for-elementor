;(function ($) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetHelloWorldHandler = function (scope, $) {

        /* ==================================================
            # imagesLoaded
        ===============================================*/
        $("#portfolio-grid,.utf-blog-masonry").imagesLoaded(function () {
            /* Filter menu */
            $(".mix-item-menu").on("click", "button", function () {
                var filterValue = $(this).attr("data-filter");
                $grid.isotope({
                    filter: filterValue,
                });
            });

            /* filter menu */
            $(".mix-item-menu button").on("click", function (event) {
                $(this).siblings(".active").removeClass("active");
                $(this).addClass("active");
                event.preventDefault();
            });

            /* Filter active */
            var $grid = $("#portfolio-grid").isotope({
                itemSelector: ".pf-item",
                percentPosition: true,
                masonry: {
                    columnWidth: ".pf-item",
                }
            });

        });

        /* ==================================================
            # Magnific popup init
         ===============================================*/
        $(".utf-popup-link").magnificPopup({
            type: "image",
        });

        $(".utf-popup-gallery").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });


        $(".magnific-mix-gallery").each(function () {
            var $container = $(this);
            var $imageLinks = $container.find(".item");

            var items = [];
            $imageLinks.each(function () {
                var $item = $(this);
                var type = "image";
                if ($item.hasClass("magnific-iframe")) {
                    type = "iframe";
                }
                var magItem = {
                    src: $item.attr("href"),
                    type: type,
                };
                magItem.title = $item.data("title");
                items.push(magItem);
            });

            $imageLinks.magnificPopup({
                mainClass: "mfp-fade",
                items: items,
                gallery: {
                    enabled: true,
                    tPrev: $(this).data("prev-text"),
                    tNext: $(this).data("next-text"),
                },
                type: "image",
                callbacks: {
                    beforeOpen: function () {
                        var index = $imageLinks.index(this.st.el);
                        if (-1 !== index) {
                            this.goTo(index);
                        }
                    },
                },
            });
        });

    };

    // Make sure you run this code under Elementor.
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/portfolio-for-elementor.default', WidgetHelloWorldHandler);
    });
})(jQuery);