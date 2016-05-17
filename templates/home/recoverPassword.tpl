{$modules.head}

<h1 class="light-blue-text"> {$name}'S PASSWORD CHANGE: <span class="red-text text-lighten-1">{$title_ending}<span></h1>

<h2 class=></h2>

<form>
	<div class="row">
		<div class="input-field col s12">
			<input id="password" type="password" name="password" class="validate password-meter" required length="10" maxlength="10" minlength="6">
			<label for="password">New Password</label>

		</div>
	</div>

	<div class="modal-footer">
		<input class="deep-orange lighten-1 btn waves-effect waves-ripple"
			   type="submit" id ="submit" name="submit" value="SEND">
	</div>
</form>

<div class="space-50" style="height: 250px"></div>



{$modules.footer}