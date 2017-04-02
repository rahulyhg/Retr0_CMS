<html>
<head>
	<meta charset="utf-8">
	<title>Ado: Bienvenidos a Ado</title>
	<link rel="stylesheet" type="text/css" href="web/css/animate.css">
	<link rel="stylesheet" type="text/css" href="web/css/alerts.css">
	<link type="text/css" href="web/css/style.css" rel="stylesheet">
	<link type="text/css" href="web/css/frontpage.css" rel="stylesheet">  
	<link rel="stylesheet" type="text/css" href="/styles/css/alerts.css">   
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="web/js/materialize.js"></script>
	<script>
		$(document).ready(function() {
			$('.modal').modal();
			$('.joinNow').click(function() {
				$('#registerModal').modal('open');
			});
			$('.signIn').click(function() {
				$('#loginModal').modal('open');
			});
			$('.loginButton').click(function() {
				$('#loginForm').submit();
			});
		});
	</script>
</head>
<body>
	<div id="registerModal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Join Habbo Community</h4>
			<p>
				<input type="text" name="" placeholder="test" class="input-field">
			</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Done</a>
		</div>
	</div>
	<div id="loginModal" class="modal" style="width:350px;">
		<form id="myForm" action="" method="POST">
			<div class="modal-content">
				<h4>Iniciar Sesi&oacute;n</h4>
				<p>Inicia sesi&oacute;n con tu contrase&ntilde;a y usuario.</p>

				<div class="input-field">
					<input id="Username" tabindex="1" name="Username" type="text" class="validate">
					<label for="username">Usuario</label>
				</div>
				<div class="input-field">
					<input id="Password" tabindex="2" name="Password" type="password" class="validate">
					<label for="password">Contrase&ntilde;a</label>
				</div>
				<p style="margin-left:10px;">
					<input type="checkbox" class="filled-in" id="filled-in-box" />
					<label for="filled-in-box">Mantener conectado </label>
				</p>
			</div>
			<div class="modal-footer">
				<div id="submit" type="submit" class="modal-action waves-effect waves-green btn loginButton">Entrar</div>
			</div>
		</form>

	</div>
	<div id="ack"></div>
	<div id="front-header" class="z-depth-3">
		<div class="container_24">
			<div class="logo"></div>
			<div class="onlineBox">
				<b></b> Ado en ligne
			</div>
			<div class="waves-effect waves-light btn joinNow animated infinite pulse 5s">Registro</div>
			<div class="waves-effect waves-teal btn-flat signIn">Iniciar Sesi&oacute;n</div>
		</div>
	</div>
	<div id="front-header-content">
		<div class="container_24">
			<div class="hotel"></div>
			<div class="grid_12">
				<h2>Bienvneue sur Ado,</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco lab
				</div>
			</div>
		</div>
		<div class="container_24">
			<h4 class="light">Actualité</h4>
			<div class="grid_8">
				<div class="card animated flash 0.5s">
					<div class="card-image waves-effect waves-block waves-light" style="background:url('http://habbo-ressource.eu/act/web_promo_023.png') center right;height:180px;"></div>
					<div class="card-content" style="height:150px;padding-top:0;padding-left:15px;">
						<br>
						<span class="card-title activator grey-text text-darken-4">Lorem ipsum dolor si</span>
						<br><br>
						<p><a href="#!">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </a></p>
						</div>
						<div class="card-action" style="height:55px;">
							<a href="#" class="right">Lire +</a>
						</div>
					</div>
				</div>

			</div>
			<div class="container_24">

				<div id="contentBox"  style="height:145px;background:transparent;box-shadow:0px;">
					<div class="title"  style="text-transform:uppercase;text-align:center;">Les derniers inscrits</div>
					<div id="registerusers"   class="animated rollIn 5s" data-toggle="tooltip" data-placement="top" title="<?php echo $a['username']?>"  style="background:url(http://www.habbo.nl/habbo-imaging/avatarimage?figure=&direction=2&head_direction=2&gesture=sml&action=&size=) 37% 28%;background-color:#3a993e;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>          

</body>
</html>


