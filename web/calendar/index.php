<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: '',
				right: ''
			},
			//defaultDate: '2014-11-12',			
		});	
		var ___date = $(".fc-state-highlight").text();
		$(".fc-toolbar h2").html( '<span>' + ___date +'</span><br>' + '<span>' + $(".fc-toolbar h2").text() +'</span>')	;
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		/*font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;*/
		font-size: 12px;
		font-family: Myriad Pro;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

	#calendar td{
		text-align: center;
		line-height: 1.5;
		/*font-weight: bolder;*/
	}
	#calendar .fc-left h2 span:first-child{
		float: left;
		font-size: 50px;		
	}
	#calendar .fc-left h2 span:last-child{
		float: left;
		font-size: 24px;
		line-height: 0.2;
	}
	#calendar .fc-today{
		font-weight: bolder;
		background-color: azure;
	}


</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
