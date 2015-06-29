<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prescrições Médicas</title>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</head>
	<body>
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button> -->
					<span class="navbar-brand">Prescrições Médicas</span>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						@if(Auth::check())
							<li><a href="{{ route('home') }}">Selecionar Unidade</a></li>
                            <li><a href="{{ route('sessions') }}">Acessos</a></li>
							<li><a>{{ Auth::user()->nome }}</a></li>
							<li><a href="{{ route('logout') }}">Sair</a></li>
						@endif
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- Begin page content -->
		<div class="container">
			@yield('content')
		</div>

<!--
		<footer class="footer">
			<div class="container">
				<p class="text-muted">Place sticky footer content here.</p>
			</div>
		</footer>
-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/all.js') }}"></script>
	</body>
</html>
