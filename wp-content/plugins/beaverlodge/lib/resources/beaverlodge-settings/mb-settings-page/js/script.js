jQuery( document ).ready( function ( $ )
{
	'use strict';

	$( '.if-js-closed' ).removeClass( 'if-js-closed' ).addClass( 'closed' );
	postboxes.add_postbox_toggles( MBSettingsPage.pageHook );
} );
