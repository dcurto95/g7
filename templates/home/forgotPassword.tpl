{$modules.head}

<h1 class="light-blue-text"> PASSWORD RECOVERY: <span class="red-text text-lighten-1">{$title_ending}<span></h1>

<h2 class=></h2>

<form>
	<div class="row">
		<div class="input-field col s12">
			<input id="email" name="email" type="email" class="validate" required value="{$email}">
			<label for="email" data-error="Wrong email" data-success="Ok!">Introduce your email</label>
		</div>
	</div>

	<div class="modal-footer">
		<input class="deep-orange lighten-1 btn waves-effect waves-ripple"
			   type="submit" id ="submit" name="submit" value="SEND">
	</div>
</form>

<div class="space-50" style="height: 250px"></div>



{$modules.footer}