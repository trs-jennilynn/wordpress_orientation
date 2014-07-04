jQuery(document).ready(function($) {	
	//Setup Instagram Feed
    $.fn.spectragram.accessData={accessToken:'493851702.8316e06.2327d128bd0f42699de1480ec1c316c0',clientID:'8316e060283d4dd7a5638cb052e71894'};
    
    $('#instagram').spectragram('getUserFeed',{
        query: 'mikekus',
        max: 10
    });
});    