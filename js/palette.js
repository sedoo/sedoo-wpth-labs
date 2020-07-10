jQuery(document).ready(function(){
    ////////////
    // On click on the regenerate bouton 
    /////
    jQuery('#btn_regenerate_palette .acf-button-group').click(function(){

        ////////////
        // Get main color
        /////
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'labs_by_sedoo_ajax_get_main_color', // dans le theme labs
            },
            success: function(data){
                ////////////
                // Get calcul method from previous select
                /////
                calculmethod = jQuery('#select_calcul_method select').val();

                ////////////
                // Calculate color palette from the first one
                /////
                var scheme = new ColorScheme;
                scheme.from_hex(data.substr(1))         
                    .scheme(calculmethod)   
                    .variation('soft')
                    .distance(0.5);
                    // color list
                var colors = scheme.colors();
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(1) .acf-color-picker>input').val('#'+colors[3]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(1) .wp-picker-container button').css('background-color', '#'+colors[3]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(1) input.wp-color-picker').val('#'+colors[3]);

                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(2) .acf-color-picker>input').val('#'+colors[4]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(2) .wp-picker-container button').css('background-color', '#'+colors[4]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(2) input.wp-color-picker').val('#'+colors[4]);

                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(3) .acf-color-picker>input').val('#'+colors[5]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(3) .wp-picker-container button').css('background-color', '#'+colors[5]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(3) input.wp-color-picker').val('#'+colors[5]);

                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(4) .acf-color-picker>input').val('#'+colors[6]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(4) .wp-picker-container button').css('background-color', '#'+colors[6]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(4) input.wp-color-picker').val('#'+colors[6]);
                    
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(5) .acf-color-picker>input').val('#'+colors[7]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(5) .wp-picker-container button').css('background-color', '#'+colors[7]);
                    jQuery('#sedoo_color_repeater .acf-repeater .acf-row:nth-of-type(5) input.wp-color-picker').val('#'+colors[7]);
                },

            ////////////
            // If error
            /////
		    error : function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
		    }
        });
    });

});