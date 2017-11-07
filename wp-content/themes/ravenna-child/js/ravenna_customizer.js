/*
Upsells
*/

jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */


	if( !jQuery( ".ravenna-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section ravenna-upsells" style="padding-bottom: 15px">');
		}

    if( jQuery( ".ravenna-upsells" ).length ) {

  		jQuery('.ravenna-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://flyfreemedia.com/documentation/ravenna/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}', ravennaCustomizerObject.documentation));
  		jQuery('.ravenna-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/ravenna" class="button" target="_blank">{github}</a>'.replace('{github}', ravennaCustomizerObject.github));
  		jQuery('.ravenna-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/ravenna#postform" class="button" target="_blank">{review}</a>'.replace('{review}', ravennaCustomizerObject.review));

  	}

	if ( !jQuery( ".ravenna-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
});
