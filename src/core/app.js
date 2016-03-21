'use strict';

angular.module('bowlingScoreApp', ['ui.bootstrap'])
.constant('PATHS', {

    'basepath': 'http://46.101.10.61/APSIS/server/api/index.php/'
})
.config(function($httpProvider) {
    //Enable cross domain calls
	$httpProvider.defaults.useXDomain = true;
	$httpProvider.defaults.withCredentials = false;
	delete $httpProvider.defaults.headers.common['X-Requested-With'];
	$httpProvider.defaults.headers.common['Accept'] = 'application/json';
	$httpProvider.defaults.headers.common['Content-Type'] = 'application/json';
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
	

	//initialize get
	if (!$httpProvider.defaults.headers.get) {
	$httpProvider.defaults.headers.get = {};
	}
	//disable IE ajax request caching
	$httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
	// extra
	$httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
	$httpProvider.defaults.headers.get['Pragma'] = 'no-cache';
});



