<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USC Tools App</title>

	<link href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/projects.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	@include('partials.nav')
    @include('partials.hero')
    @include('partials.errors')
    <div class="container">
        <div class="col-md-6 col-md-offset-3 text-center">
            @include('flash::message')
        </div>
    </div>

    @yield('content')
	    
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="{{ asset('/js/project-todos-datatable.js')  }}"></script>
	<script src="{{ asset('/js/bootstrap-datepicker.js')  }}"></script>
	<script>
	    $('.datepicker').datepicker({
	        format: 'mm/dd/yyyy',
//            startDate: '-3d'
	    })
	</script>

</body>
</html>
