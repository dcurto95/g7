{$modules.head}

<h1 class="light-blue-text"> WRONG LOG IN </h1>

<form>
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

	<div class="modal-footer">
		<input class="deep-orange lighten-1 btn waves-effect waves-ripple"
			   type="submit" id ="submit" name="submit" value="Log in">
	</div>
</form>

<div class="space-50" style="height: 220px"></div>



{$modules.footer}