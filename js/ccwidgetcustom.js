
function setConstantContactPlaceholder( txt ){
	var pText = txt;
	var ccWidget = jQuery( "#cc_email" );

	ccWidget.attr( "placeholder", pText );
}
setConstantContactPlaceholder( "enter email address" );

function addEmailValidator( ){
	var ccWidget = jQuery( "#cc_email" );
	var form = jQuery( "#constant-contact-signup" );
	
	jQuery( form ).submit( function( event ) {
		if( ccWidget.value == "") {
			event.preventDefault();
		}
	});
}
addEmailValidator();
