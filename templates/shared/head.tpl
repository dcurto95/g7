<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="title" content="" />
	<meta name="robots" content="all" />
	<meta name="expires" content="never" />
	<meta name="distribution" content="world" />
	<title>Salle's framework</title>

	<!-- ICONS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- STYLE -->
	<!-- link rel="stylesheet" href="{$url.global}/css/bootstrap.min.css" -->
	<link rel="stylesheet" href="{$url.global}/css/materialize.min.css">
	<link rel="stylesheet" href="{$url.global}/css/style.css">

	<script src="{$url.global}/js/jquery.min.js"></script>

	<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>

</head>
<body>
	<header>
		<div class="navbar-fixed">
			<!-- Dropdown -->

			<ul id="dropdown1" class="dropdown-content" style="margin-top: 4.5%;">
				<li><a href="{$url.global}/myComments" class="light-blue-text darken-3">Comments</a></li>
				<li><a href="{$url.global}/listEditProduct" class="light-blue-text darken-3">Edit Prod.</a></li>
				<li class="divider"></li>
				<li>
					<a href="{$url.global}/logout" class="white-text blue-grey darken-2">Log out</a>
					<!-- input class="" type="submit" id ="submit" name="submit" value="Log out" -->
				</li>
			</ul>

			<!-- END Dropdown -->

			<nav>
				<div class="nav-wrapper deep-orange lighten-1">
					<a href="{$url.global}" class="brand-logo">BARRETS.com</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 5%;">

						<!-- LOGIN -->
						{if $isLogged eq true}
							<li><img id="profile_image" style="margin-top: 12%; width: 50px; height: 50px"
									 class="responsive-img circle" src="{$user_image}" alt="your image" /></li>
							<li>
								<a class="dropdown-button" href="#!" data-activates="dropdown1">
									{$username}<i class="material-icons right">arrow_drop_down</i>
								</a>
							</li>
							<li><a href="{$url.global}/insertcoin"><span class="coin badge">{$user_coins}</span></a></li>
						{/if}

						{if $isLogged eq false}
							<li>
								<!-- Modal Trigger -->
								<a class="modal-trigger" href="#modal1">Log in</a>
							</li>
						{/if}
						<!-- END LOGIN -->

						<li><a href="{$url.global}/addProduct">ADD</a></li>
						<li><a href="{$url.global}/mv"><i class="material-icons">list</i></a></li>

						<!-- Buscador -->
						<li>
							<a href = "{$url.global}/search"> <i class="material-icons">search</i></a>
						</li>

					</ul>
				</div>
			</nav>
		</div>
	</header>

	<div class="container">

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<form>
				<div class="modal-content">
					<h4 class="deep-orange-text text-lighten-1">Log in</h4>
					<div class="row">
						<div class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input id="username" name="username" type="text" class="validate" required>
									<label for="username" class="light-blue-text text-lighten-1">Username</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="password" name="password" type="password" class="validate" required>
									<label for="password">Password</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<span>Don't have an account?</span>
						</div>
						<div class="col s6">
							<a href="{$url.global}/register">Register</a>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<a href="{$url.global}/forgotPassword">Forgot your password?</a>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input class="modal-action modal-close btn-flat waves-effect waves-ripple"
						   type="submit" id ="submit" name="login" value="Log in">
				</div>
			</form>
		</div>

		<div class="space-50" style="height: 30px"></div>

