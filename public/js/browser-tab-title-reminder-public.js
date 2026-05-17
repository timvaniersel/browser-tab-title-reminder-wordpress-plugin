(function() {
	'use strict';

	var pageTitle = document.title;
	var titleTimeout;

	window.addEventListener( 'blur', function() {
		window.clearTimeout( titleTimeout );
		titleTimeout = window.setTimeout( function() {
			document.title = browser_tab_title_params.new_title;
		}, browser_tab_title_params.delay );
	} );

	window.addEventListener( 'focus', function() {
		window.clearTimeout( titleTimeout );
		document.title = pageTitle;
	} );
}());
