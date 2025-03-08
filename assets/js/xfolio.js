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
        $(document).on('click', '.xfolio-portfolio-link', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var postId = $(this).closest('article').data('post-id');
            
            // Show loading state and activate overlay
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
                        history.pushState({}, '', url);
                    } else {
                        throw new Error('Invalid response');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    $('.xfolio-portfolio-panel-inner').html(
                        '<button class="xfolio-close-panel">&times;</button>' +
                        '<div class="xfolio-error">Failed to load content. Please try again.</div>'
                    );
                }
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