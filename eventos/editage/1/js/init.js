//Hook up the tweet display

$(document).ready(function() {
						   
	$("#countdown").countdown({
				date: "22 march 2016 08:30:00",
				format: "on"
			},
			
			function() {
				// callback function
			});

    $(".tweet").tweet({
        username: "flashuser",
        count: 3,
        loading_text: "loading tweets..."
    });

});	
