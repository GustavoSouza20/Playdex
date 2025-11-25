;(function($) {
    'use strict';
    $(window).on( 'elementor/frontend/init', function() {


        var GlobalJSLoad = function() {
          
			
        };

        elementorFrontend.hooks.addAction('frontend/element_ready/global', GlobalJSLoad);
        
        var GlobalSlider = function() {

        
        };

        elementorFrontend.hooks.addAction('frontend/element_ready/global', GlobalSlider);


    });
}(jQuery));
