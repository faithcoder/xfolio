jQuery(document).ready(function($) {
    $('.exfolio-experience-title, .exfolio_collapse_toggle').on('click', function() {
        var $experienceItem = $(this).closest('.exfolio-experience-item');
        var $collapseContent = $experienceItem.find('.exfolio-collapse-content');
        var $iconDown = $experienceItem.find('.collapse-icon-down');
        var $iconUp = $experienceItem.find('.collapse-icon-up');

        // Toggle content visibility
        $collapseContent.slideToggle(300); 

        // Toggle icons
        $iconDown.toggle();
        $iconUp.toggle();
    });

    // Portfolio panel handling
    function initXfolioPortfolio() {
        // Open panel when portfolio item is clicked
        $('.xfolio-portfolio-item a').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            // Show loading state and activate overlay
            $('.xfolio-portfolio-overlay').addClass('active');
            $('.xfolio-portfolio-panel-inner').html('<div class="xfolio-loading">Loading</div>');
            $('.xfolio-portfolio-panel').addClass('active');
            
            // Prevent body scrolling
            $('body').css('overflow', 'hidden');
            
            // Load content via AJAX
            $.get(url, function(data) {
                var content = $(data).find('article').first();
                $('.xfolio-portfolio-panel-inner').html(
                    '<button class="xfolio-close-panel">&times;</button>' +
                    content.html()
                );
                // Update URL without refreshing
                history.pushState({}, '', url);
            });
        });

        function closeXfolioPanel() {
            $('.xfolio-portfolio-panel').removeClass('active');
            $('.xfolio-portfolio-overlay').removeClass('active');
            $('body').css('overflow', '');
            history.pushState({}, '', window.location.pathname);
        }

        // Close panel when close button is clicked
        $(document).on('click', '.xfolio-close-panel', function() {
            closeXfolioPanel();
        });

        // Close panel when clicking on overlay
        $('.xfolio-portfolio-overlay').on('click', function() {
            closeXfolioPanel();
        });

        // Handle escape key
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                closeXfolioPanel();
            }
        });

        // Handle browser back button
        $(window).on('popstate', function() {
            closeXfolioPanel();
        });
    }

    // Initialize portfolio functionality
    initXfolioPortfolio();
});