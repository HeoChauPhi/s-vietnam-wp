<?php

$countclock = $settings->sw_counter_date;
$countmsg = $settings->sw_counter_message;

?>

(function($) {

	$(function() {
    
        var note = $('.sw-counter-note'),
		ts = new Date("<?php echo $countclock; ?>"),
		newYear = false;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
		
	$('.sw-counter-clock').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){

    
            $daysDisplay = "<?php echo $settings->sw_counter_days; ?>";
            $no = "no";
            
            var message = "";
			message += "<div class='counter-text'>";
            if($daysDisplay != $no) { 
            message += days + " day" + ( days==1 ? '':'s' ) + ", ";
            }
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " </div>";

			if(newYear){
				message += "left until the new year!";
			}
			else {
            message += "<div class='alert'>" + "<?php echo $countmsg; ?>" + "</div>";
			}

            note.html(message);
		}
	});
    
    

	});

})(jQuery);