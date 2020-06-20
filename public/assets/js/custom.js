(function ($) {

  //"use strict";

	// PRE LOADER
	$(window).load(function(){
	  $('.preloader').fadeOut(1000); // set duration in brackets	
	});


	// MENU
	$('.navbar-collapse a').on('click',function(){
	  $(".navbar-collapse").collapse('hide');
	});

	$(window).scroll(function() {
		if (window.location.pathname == "/" || window.location.pathname == "/home") {
			if ($(".navbar").offset().top > 50) {
				$(".navbar-fixed-top").addClass("top-nav-collapse");
				$(".cu").addClass("call-us-btn-down");
				$(".cu").removeClass("call-us-btn ");
			} else {
				$(".cu").removeClass("call-us-btn-down");
				$(".cu").addClass("call-us-btn ");
				$(".navbar-fixed-top").removeClass("top-nav-collapse");
				
			}
			$('body').addClass('homepagetop');
			$('body').removeClass('otherpagetop');
		} else {
			$(".navbar-fixed-top").addClass("top-nav-collapse");
			$('body').addClass('otherpagetop');
			$('body').removeClass('homepagetop');
		}
	});

	// SLIDER
	$('.owl-carousel').owlCarousel({
	  animateOut: 'fadeOut',
	  items:1,
	  loop:true,
	  autoplayHoverPause: false,
	  //autoplay: true,
	  smartSpeed: 1000,
	})


	// PARALLAX EFFECT
	$.stellar({
	  horizontalScrolling: false,
	}); 


	// MAGNIFIC POPUP
	$('.image-popup').magnificPopup({
		type: 'image',
		removalDelay: 300,
		mainClass: 'mfp-with-zoom',
		gallery:{
		  enabled:true
		},
		zoom: {
		enabled: true, // By default it's false, so don't forget to enable it

		duration: 300, // duration of the effect, in milliseconds
		easing: 'ease-in-out', // CSS transition easing function

		// The "opener" function should return the element from which popup will be zoomed in
		// and to which popup will be scaled down
		// By defailt it looks for an image tag:
		opener: function(openerElement) {
		// openerElement is the element on which popup was initialized, in this case its <a> tag
		// you don't need to add "opener" option if this code matches your needs, it's defailt one.
		return openerElement.is('img') ? openerElement : openerElement.find('img');
		}
	  }
	});  

/*
	// CONTACT FORM
	$("#contact-form").submit(function (e) {
	  e.preventDefault();
	  var name = $("#cf-name").val();
	  var email = $("#cf-email").val();
	  var subject = $("#cf-subject").val();
	  var message = $("#cf-message").val();
	  var dataString = 'name=' + name + '&email=' + email + '&subject=' + subject + '&message=' + message;

	  function isValidEmail(emailAddress) {
		  var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		  return pattern.test(emailAddress);
	  };
	  if (isValidEmail(email) && (message.length > 1) && (name.length > 1)) {
		  $.ajax({
			  type: "POST",
			  url: "email.php",
			  data: dataString,
			  success: function () {
				  $('.text-success').fadeIn(1000);
				  $('.text-danger').fadeOut(500);
			  }
		  });
	  }
	  else {
		  $('.text-danger').fadeIn(1000);
		  $('.text-success').fadeOut(500);
	  }
	  return false;
	});

*/


	// SMOOTHSCROLL
	$(function() {
	  $('.custom-navbar a, #home a').on('click', function(event) {
		var $anchor = $(this);
		  $('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top - 49
		  }, 1000);
			event.preventDefault();
	  });
	});  


	// WOW ANIMATION
	new WOW({ mobile: false }).init();

})(jQuery);


/* Timeline code below*/
jQuery(document).ready(function($){
	var timelines = $('.cd-horizontal-timeline'),
		eventsMinDistance = 70;

	(timelines.length > 0) && initTimeline(timelines);

	function initTimeline(timelines) {
		timelines.each(function(){
			var timeline = $(this),
				timelineComponents = {};
			//cache timeline components 
			timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
			timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
			timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
			timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
			timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
			timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
			timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
			timelineComponents['eventsContent'] = timeline.children('.events-content');

			//assign a left postion to the single events along the timeline
			setDatePosition(timelineComponents, eventsMinDistance);
			//assign a width to the timeline
			var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
			//the timeline has been initialize - show it
			timeline.addClass('loaded');

			//detect click on the next arrow
			timelineComponents['timelineNavigation'].on('click', '.next', function(event){
				event.preventDefault();
				updateSlide(timelineComponents, timelineTotWidth, 'next');
			});
			//detect click on the prev arrow
			timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
				event.preventDefault();
				updateSlide(timelineComponents, timelineTotWidth, 'prev');
			});
			//detect click on the a single event - show new event content
			timelineComponents['eventsWrapper'].on('click', 'a', function(event){
				event.preventDefault();
				timelineComponents['timelineEvents'].removeClass('selected');
				$(this).addClass('selected');
				updateOlderEvents($(this));
				updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
				updateVisibleContent($(this), timelineComponents['eventsContent']);
			});

			//on swipe, show next/prev event content
			timelineComponents['eventsContent'].on('swipeleft', function(){
				var mq = checkMQ();
				( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
			});
			timelineComponents['eventsContent'].on('swiperight', function(){
				var mq = checkMQ();
				( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
			});

			//keyboard navigation
			$(document).keyup(function(event){
				if(event.which=='37' && elementInViewport(timeline.get(0)) ) {
					showNewContent(timelineComponents, timelineTotWidth, 'prev');
				} else if( event.which=='39' && elementInViewport(timeline.get(0))) {
					showNewContent(timelineComponents, timelineTotWidth, 'next');
				}
			});
		});
	}

	function updateSlide(timelineComponents, timelineTotWidth, string) {
		//retrieve translateX value of timelineComponents['eventsWrapper']
		var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
			wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
		//translate the timeline to the left('next')/right('prev') 
		(string == 'next') 
			? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
			: translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
	}

	function showNewContent(timelineComponents, timelineTotWidth, string) {
		//go from one event to the next/previous one
		var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
			newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

		if ( newContent.length > 0 ) { //if there's a next/prev event - show it
			var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
				newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');
			
			updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
			updateVisibleContent(newEvent, timelineComponents['eventsContent']);
			newEvent.addClass('selected');
			selectedDate.removeClass('selected');
			updateOlderEvents(newEvent);
			updateTimelinePosition(string, newEvent, timelineComponents, timelineTotWidth);
		}
	}

	function updateTimelinePosition(string, event, timelineComponents, timelineTotWidth) {
		//translate timeline to the left/right according to the position of the selected event
		var eventStyle = window.getComputedStyle(event.get(0), null),
			eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
			timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
			timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
		var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

		if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
			translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
		}
	}

	function translateTimeline(timelineComponents, value, totWidth) {
		var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
		value = (value > 0) ? 0 : value; //only negative translate value
		value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
		setTransformValue(eventsWrapper, 'translateX', value+'px');
		//update navigation arrows visibility
		(value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
		(value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
	}

	function updateFilling(selectedEvent, filling, totWidth) {
		//change .filling-line length according to the selected event
		var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
			eventLeft = eventStyle.getPropertyValue("left"),
			eventWidth = eventStyle.getPropertyValue("width");
		eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
		var scaleValue = eventLeft/totWidth;
		setTransformValue(filling.get(0), 'scaleX', scaleValue);
	}

	function setDatePosition(timelineComponents, min) {
		for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
			var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
				distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 2;
			timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
		}
	}

	function setTimelineWidth(timelineComponents, width) {
		var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
			timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
			timeSpanNorm = Math.round(timeSpanNorm) + 4,
			totalWidth = timeSpanNorm*width;
		timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
		updateFilling(timelineComponents['timelineEvents'].eq(0), timelineComponents['fillingLine'], totalWidth);
	
		return totalWidth;
	}

	function updateVisibleContent(event, eventsContent) {
		var eventDate = event.data('date'),
			visibleContent = eventsContent.find('.selected'),
			selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
			selectedContentHeight = selectedContent.height();

		if (selectedContent.index() > visibleContent.index()) {
			var classEnetering = 'selected enter-right',
				classLeaving = 'leave-left';
		} else {
			var classEnetering = 'selected enter-left',
				classLeaving = 'leave-right';
		}

		selectedContent.attr('class', classEnetering);
		visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
			visibleContent.removeClass('leave-right leave-left');
			selectedContent.removeClass('enter-left enter-right');
		});
		eventsContent.css('height', selectedContentHeight+'px');
	}

	function updateOlderEvents(event) {
		event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
	}

	function getTranslateValue(timeline) {
		var timelineStyle = window.getComputedStyle(timeline.get(0), null),
			timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
		 		timelineStyle.getPropertyValue("-moz-transform") ||
		 		timelineStyle.getPropertyValue("-ms-transform") ||
		 		timelineStyle.getPropertyValue("-o-transform") ||
		 		timelineStyle.getPropertyValue("transform");

		if( timelineTranslate.indexOf('(') >=0 ) {
			var timelineTranslate = timelineTranslate.split('(')[1];
			timelineTranslate = timelineTranslate.split(')')[0];
			timelineTranslate = timelineTranslate.split(',');
			var translateValue = timelineTranslate[4];
		} else {
			var translateValue = 0;
		}

		return Number(translateValue);
	}

	function setTransformValue(element, property, value) {
		element.style["-webkit-transform"] = property+"("+value+")";
		element.style["-moz-transform"] = property+"("+value+")";
		element.style["-ms-transform"] = property+"("+value+")";
		element.style["-o-transform"] = property+"("+value+")";
		element.style["transform"] = property+"("+value+")";
	}

	//based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
	function parseDate(events) {
		var dateArrays = [];
		events.each(function(){
			var dateComp = $(this).data('date').split('/'),
				newDate = new Date(dateComp[2], dateComp[1]-1, dateComp[0]);
			dateArrays.push(newDate);
		});
		return dateArrays;
	}

	function parseDate2(events) {
		var dateArrays = [];
		events.each(function(){
			var singleDate = $(this),
				dateComp = singleDate.data('date').split('T');
			if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
				var dayComp = dateComp[0].split('/'),
					timeComp = dateComp[1].split(':');
			} else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
				var dayComp = ["2000", "0", "0"],
					timeComp = dateComp[0].split(':');
			} else { //only DD/MM/YEAR
				var dayComp = dateComp[0].split('/'),
					timeComp = ["0", "0"];
			}
			var	newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
			dateArrays.push(newDate);
		});
		return dateArrays;
	}

	function daydiff(first, second) {
		return Math.round((second-first));
	}

	function minLapse(dates) {
		//determine the minimum distance among events
		var dateDistances = [];
		for (i = 1; i < dates.length; i++) { 
			var distance = daydiff(dates[i-1], dates[i]);
			dateDistances.push(distance);
		}
		return Math.min.apply(null, dateDistances);
	}

	/*
		How to tell if a DOM element is visible in the current viewport?
		http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
	*/
	function elementInViewport(el) {
		var top = el.offsetTop;
		var left = el.offsetLeft;
		var width = el.offsetWidth;
		var height = el.offsetHeight;

		while(el.offsetParent) {
			el = el.offsetParent;
			top += el.offsetTop;
			left += el.offsetLeft;
		}

		return (
			top < (window.pageYOffset + window.innerHeight) &&
			left < (window.pageXOffset + window.innerWidth) &&
			(top + height) > window.pageYOffset &&
			(left + width) > window.pageXOffset
		);
	}

	function checkMQ() {
		//check if mobile or desktop device
		return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
	}
});

jQuery(document).ready(function($){
	$.ajax({
		type: 'GET', 
		url : "http://127.0.0.1/api/get-addr-location", 
		success : function (data) {
			$("#addr_location" ).replaceWith("<div id='addr_location'>"+data[0]['content']+"</div>");
		}
	});

	var url = window.location.href;
	url = url.split("/");
	if (url[3] != 'home') {
		var activetab = $("#"+url[3]).find( "a" );
		activetab.css("color", "#ce3232");
		activetab.css("border-bottom", "1px solid rgb(206, 50, 50");
		$('.phone-no-div').hide();
	}
});

$('#contact_submit').on('click',function(event){
	event.preventDefault();
	alert('posting');
	$.ajax({
		url: "/recapcha-page",
		type:"POST",
		data:$('#contactus_form').serialize(),
		success:function(response){
		console.log(response);
		},
	});
});

$('#contact_us_submit').on('click',function(event){
	document.getElementById("overlay").style.display = "block";
	event.preventDefault();
	var msg = document.getElementById("error_message");
	if(contact_us_check()) {
		$.ajax({
			url: "/api/save-contact-us",
			type:"POST",
			data:$('#contactus_form').serialize(),
			success:function(response){
				if (response['isSuccess'] == true) {
					$("#error_message").removeClass("label-danger");
					$("#error_message").addClass("label-success");
					msg.style.display = "inline-block";
					msg.innerHTML = response['message'];
				} else {
					$("#error_message").addClass("label-danger");
					$("#error_message").removeClass("label-success");	
					msg.style.display = "inline-block";
					msg.innerHTML = response['message'];
				}
				grecaptcha.reset();
				$("#contact_us_reset").click()
				document.getElementById("overlay").style.display = "none";
			}, error:function(response){
				$("#error_message").addClass("label-danger");
				$("#error_message").removeClass("label-success");
				msg.style.display = "inline-block";
				msg.innerHTML = "Something went wrong. Please Try again in sometime.";
				grecaptcha.reset();
				document.getElementById("overlay").style.display = "none";
			},
		});
	} else {
		document.getElementById("overlay").style.display = "none";
	}
});
$('#contact_us_reset').on('click',function(event){
	grecaptcha.reset();
});
function contact_us_check() {
	var msg = document.getElementById("error_message");
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var email = document.getElementById("email");
	var phone = document.getElementById("phone");
	var message=document.getElementById("message");
	if (firstname.value == "" || lastname.value == "" || email.value=="" || message.value=="") {
		msg.style.display = "inline-block";
		msg.innerHTML = "Fields are empty";
		$("#error_message").addClass("label-danger");
		$("#error_message").removeClass("label-success");
		return false;
	} else {
		msg.style.display = "none";
		return true;
	}
}

// This function will validate Email.
function ValidateEmail(uemail, message) {
	var msg = document.getElementById("error_message");
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (uemail.value.match(mailformat)) {
		uemail.style.borderColor = "#66afe9";
		msg.style.display = "none";
		return true;
	} else {
		$("#error_message").addClass("label-danger");
		$("#error_message").removeClass("label-success");
		uemail.style.borderColor = "red";
		msg.style.display = "inline-block";
		msg.innerHTML = message;
		uemail.focus();
		return false;
	}
}

// Function to validate Emails
function ValidateEmptyField(emt_len, message) {
	var msg = document.getElementById("error_message");
	if (emt_len.value === "") {
		msg.style.display = "inline-block";
		msg.innerHTML = message;
		$("#error_message").addClass("label-danger");
		$("#error_message").removeClass("label-success");
		emt_len.style.borderColor = "red";
		emt_len.focus();
		return false;
	} else {
		emt_len.style.borderColor = "#66afe9";
		msg.style.display = "none";
		return true;
	}
}

// Function to validate Contact
function ValidateContact(cont, message) {
	var msg = document.getElementById("error_message");
	var contformat = /^\d{10}$/;

	if ($("#phone").val() != "") {
		if (cont.value.match(contformat)) {
			cont.style.borderColor = "#66afe9";
			msg.style.display = "none";
			return true;
		} else {
			cont.style.borderColor = "red";
			$("#error_message").addClass("label-danger");
			$("#error_message").removeClass("label-success");
			msg.style.display = "inline-block";
			msg.innerHTML = message;
			cont.focus();
			return false;
		}
	} else {
		return true;
	}
}
