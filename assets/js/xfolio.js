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
        // Check for portfolio parameter in URL
        function checkForPortfolioInUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            const portfolioId = urlParams.get('portfolio');
            if (portfolioId) {
                loadPortfolioContent(portfolioId);
            }
        }

        // Load portfolio content
        function loadPortfolioContent(postId) {
            $('.xfolio-portfolio-overlay').addClass('active');
            $('.xfolio-portfolio-panel-inner').html('<div class="xfolio-loading">Loading</div>');
            $('.xfolio-portfolio-panel').addClass('active');
            
            // Prevent body scrolling
            $('body').css('overflow', 'hidden');
            
            // Load content via AJAX
            $.ajax({
                url: xfolio_ajax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'xfolio_load_portfolio',
                    nonce: xfolio_ajax.nonce,
                    post_id: postId
                },
                success: function(response) {
                    if (response.success) {
                        var portfolioContent = `
                            <button class="xfolio-close-panel">&times;</button>
                            <article class="xfolio-portfolio-detail">
                                ${response.data.image ? `
                                    <div class="xfolio-portfolio-featured-image">
                                        ${response.data.image}
                                    </div>
                                ` : ''}
                                <div class="xfolio-portfolio-content">
                                    <h1 class="xfolio-portfolio-title">${response.data.title}</h1>
                                    <div class="xfolio-portfolio-description">
                                        ${response.data.content}
                                    </div>
                                    ${response.data.tools || ''}
                                    ${response.data.preview || ''}
                                </div>
                            </article>
                        `;
                        
                        $('.xfolio-portfolio-panel-inner').html(portfolioContent);
                    }
                },
                error: function() {
                    $('.xfolio-portfolio-panel-inner').html(
                        '<button class="xfolio-close-panel">&times;</button>' +
                        '<div class="xfolio-error">Failed to load content</div>'
                    );
                }
            });
        }

        // Open panel when portfolio item is clicked
        $(document).on('click', '.xfolio-portfolio-link', function(e) {
            e.preventDefault();
            var postId = $(this).closest('article').data('post-id');
            var currentUrl = window.location.href.split('?')[0];
            var newUrl = currentUrl + '?portfolio=' + postId;
            
            loadPortfolioContent(postId);
            
            // Update URL without refreshing
            history.pushState({}, '', newUrl);
        });

        function closeXfolioPanel() {
            $('.xfolio-portfolio-panel').removeClass('active');
            $('.xfolio-portfolio-overlay').removeClass('active');
            $('body').css('overflow', '');
            // Remove portfolio parameter from URL
            var currentUrl = window.location.href.split('?')[0];
            history.pushState({}, '', currentUrl);
        }

        // Close panel handlers
        $(document).on('click', '.xfolio-close-panel', closeXfolioPanel);
        $('.xfolio-portfolio-overlay').on('click', closeXfolioPanel);
        $(document).keyup(function(e) {
            if (e.key === "Escape") closeXfolioPanel();
        });

        // Handle browser back/forward
        $(window).on('popstate', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const portfolioId = urlParams.get('portfolio');
            if (portfolioId) {
                loadPortfolioContent(portfolioId);
            } else {
                closeXfolioPanel();
            }
        });

        // Check for portfolio in URL on page load
        checkForPortfolioInUrl();
    }

    // Initialize portfolio functionality
    initXfolioPortfolio();
});