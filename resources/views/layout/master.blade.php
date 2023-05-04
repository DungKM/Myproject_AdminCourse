
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard PRO by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">

</head>

<body>
	<div class="wrapper">
	  @include('layout.sidebar')

	    <div class="main-panel">
			@include('layout.header')

	        <div class="content">
	         @yield('content')
	        </div>
           @include('layout.footer')
	    </div>
	</div>
</body>

	<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
	<script src="{{asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src="{{asset('js/jquery.validate.min.js')}}"></script>

	<!-- Promise Library for SweetAlert2 working on IE -->
	<script src="{{asset('js/es6-promise-auto.min.js')}}"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="{{asset('js/moment.min.js')}}"></script>

	<!--  Date Time Picker Plugin is included in this js file -->
	<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>

	<!--  Select Picker Plugin -->
	<script src="{{asset('js/bootstrap-selectpicker.js')}}"></script>

	<!--  Switch and Tags Input Plugins -->
	<script src="{{asset('js/bootstrap-switch-tags.js')}}"></script>

	<!-- Circle Percentage-chart -->
	<script src="{{asset('js/jquery.easypiechart.min.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('js/chartist.min.js')}}"></script>

	<!--  Notifications Plugin    -->
	<script src="{{asset('js/bootstrap-notify.js')}}"></script>

	<!-- Sweet Alert 2 plugin -->
	<script src="{{asset('js/sweetalert2.js')}}"></script>

	<!-- Vector Map plugin -->
	<script src="{{asset('js/jquery-jvectormap.js')}}"></script>

	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

	<!-- Wizard Plugin    -->
	<script src="{{asset('js/jquery.bootstrap.wizard.min.js')}}"></script>

	<!--  Bootstrap Table Plugin    -->
	<script src="{{asset('js/bootstrap-table.js')}}"></script>

	<!--  Plugin for DataTables.net  -->
	<script src="{{asset('js/jquery.datatables.js')}}"></script>

	<!--  Full Calendar Plugin    -->
	<script src="{{asset('js/fullcalendar.min.js')}}"></script>

	<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
	<script src="{{asset('js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
	<script src="{{asset('js/demo.js')}}"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
			demo.initOverviewDashboard();
			demo.initCirclePercentage();

    	});
	</script>

</html>
