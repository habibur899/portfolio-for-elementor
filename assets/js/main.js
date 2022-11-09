;(function($) {

        /* ==================================================
            # imagesLoaded
        ===============================================*/
        $("#portfolio-grid,.utf-blog-masonry").imagesLoaded(function() {
            /* Filter menu */
            $(".mix-item-menu").on("click", "button", function() {
                var filterValue = $(this).attr("data-filter");
                $grid.isotope({
                    filter: filterValue,
                });
            });

            /* filter menu */
            $(".mix-item-menu button").on("click", function(event) {
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
                },
            });

        });


})(jQuery);