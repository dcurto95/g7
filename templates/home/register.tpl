{$modules.head}

<h1 class="light-blue-text"> REGISTER </h1>

<div class="row">
	<form class="col-md-12">
		<div class="row">
			<div class="input-field col-md-6">
				<input placeholder="Your name" pattern="{$username_regex}" id="username" type="text" class="validate" required>
				<label for="username" data-error="Wrong, minimum 6 characters" data-success="Ok!">Username</label>
			</div>
			<div class="input-field col-md-6">
				<input id="email" type="email" class="validate" required>
				<label for="email" data-error="Wrong email" data-success="Ok!">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col-md-6">
				<input id="password" type="password" class="validate" required length="10" maxlength="10" minlength="10">
				<label for="password">Password</label>

			</div>
			<div class="input-field col-md-6">
				<input placeholder="@name" pattern="{$twitter_regex}" id="twitter" type="text" class="validate">
				<label for="twitter" data-error="Wrong twitter account" data-success="Ok!">Twitter</label>
			</div>
		</div>

		<div class = "row">

			<div class="file-field input-field col-md-8">
				<div class="btn col-md-4">
					<span>Profile image</span>
					<input type="file" id="inputFile">
				</div>
				<div class="file-path-wrapper col-md-8">
					<input class="file-path validate" type="text">
				</div>
			</div>
			<div class="file-field input-field col-md-4">
				<img id="image_upload_preview" class="img-circle" src="http://placehold.it/100x100" alt="your image" />
			</div>

		</div>
		<button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="action">Register
			<i class="material-icons right">perm_identity</i>
		</button>
	</form>
</div>


<div class="space-50" style="height: 220px"></div>



{$modules.footer}