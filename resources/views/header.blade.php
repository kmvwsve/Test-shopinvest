<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="fr" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="fr" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="fr">
<!--<![endif]-->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TEST TECHNIQUE</title>
		<meta name="description" content="Description TEST TECHNIQUE" />
		<meta name="keywords" content= "TEST TECHNIQUE" />

		<!-- script -->
    <script src="<?php echo HTTP_SERVER; ?>js/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="<?php echo HTTP_SERVER; ?>js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- link -->
    <link href="<?php echo HTTP_SERVER; ?>js/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="<?php echo HTTP_SERVER; ?>css/app.css" rel="stylesheet" media="screen" />

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?php echo HTTP_SERVER; ?>js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  </head>

  <body>
   <!--  nav -->
    <header id="header">
			<nav class="navbar navbar-default">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">LOGO</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">

			        <li class="dropdown" id="cart">
			        	<?php echo $cart; ?>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
    </header>