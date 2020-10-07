<?php require 'config.php'; ?>
<!DOCTYPE html>
<head>
	<title>Classificados PraVocê</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css" />
	
</head>
<body>
	
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="./">Classificados ParaVocê</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	       <!-- <li class="active"><a href="#">Home</a></li> -->
	        <li class="dropdown">
	         <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a> -->
	          <ul class="dropdown-menu">
	            
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
			<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
				<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
				<li><a href="sair.php">Sair</a></li>
			<?php else: ?>
	        	<li><a href="cadastre-se.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
	        	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	        <?php endif; ?>
	      </ul>
	    </div>
	  </div>
	</nav>


<!--	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand">Classificados PraVocê</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php //if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
					<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
					<li><a href="sair.php">Sair</a></li>
				<?php //else: ?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
				<?php //endif; ?>
			</ul>
		</div>
	</nav> -->