$(function(){
		/*
		 * Retrieve Upcoming Events
		*/
		
		// Must first authenticate 
		$.ajax({
			url : "https://api2.libcal.com/1.1/oauth/token",
			type : "POST",
			dataType: 'json',
			data: {
				'client_id': 202,
				'client_secret': '38fb15417a6373b9fea95df8624de9b0',
				'grant_type': 'client_credentials'
			},
			success: function(data){
				// After getting valid access token, you can make a request to the events API endpoint
				if(data.hasOwnProperty('access_token')){
					$.ajax({
						url : "https://api2.libcal.com/1.1/events?cal_id=8606&category=36359&days=180",
						type : "GET",
						dataType: 'json',
						beforeSend: function(xhr){
							xhr.setRequestHeader('Authorization', 'Bearer ' + data.access_token);
						},
						success: function(data){
							if(data.events.length > 0){
								var $calendarContainer = $('#workshops');
								var source   = $("#workshops-template").html();
								// Build Handlebars template
								var eventTemplate = Handlebars.compile(source);
								// Loop through events
								$.each(data.events, function(i, val){
									// Format dates using Moment.js
									// format('D MMM')  ex. 1 Jan
									// format('D MMMM') ex. 1 January
									data.events[i].date = (new moment(data.events[i].start).format('D MMM'));
									// Format time variables
									data.events[i].start_time = new Date(data.events[i].start).toLocaleTimeString(undefined, {
										hour: '2-digit',
										minute: '2-digit'
									});
									data.events[i].end_time = new Date(data.events[i].end).toLocaleTimeString(undefined, {
										hour: '2-digit',
										minute: '2-digit'
									});
									// Pass data to template and add event to container
									$calendarContainer.find('.events-body').append(eventTemplate(data.events[i]));
								});
								// Only show container if there are upcoming events
								$calendarContainer.show();
							}
						}
					});
				}
			}
		});
	});