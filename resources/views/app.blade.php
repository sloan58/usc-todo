<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USC Todo App</title>

	<link href="{{elixir('css/app.css')}}" rel="stylesheet">
    <link href="{{elixir('css/custom.css')}}" rel="stylesheet">
    <link href="{{elixir('css/datepicker.css')}}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body ng-app="todoApp">

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
	<script src="{{ asset('js/vendor/jquery.js')  }}"></script>
	<script src="{{ asset('js/vendor/angular.js')  }}"></script>
	<script src="{{ asset('js/vendor/bootstrap.js')  }}"></script>
	<script src="{{ asset('js/vendor/datatables.js')  }}"></script>
	<script src="{{ asset('js/vendor/datatables-bootstrap3.js')  }}"></script>
	<script src="{{ asset('js/app.js')  }}"></script>
	<script src="{{ asset('assets/site/js/custom-datatable.js')  }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap-datepicker.js')  }}"></script>
    <script src="{{ asset('assets/site/js/todo-datepicker.js')  }}"></script>

</body>
</html>
