{$modules.head}

<h1 class="light-blue-text"> {$register_title} </h1>

<div class="row">
	<form class="col-md-12" method="post" action="" enctype = "multipart/form-data">
		<div class="row">
			<div class="input-field col s6">
				<input placeholder="Your name" pattern="{$username_regex}" name="username" id="username" type="text" class="validate" required value="{$username}">
				<label for="username" data-error="Wrong, minimum 6 characters" data-success="Ok!">Username</label>
			</div>
			<div class="input-field col s6">
				<input id="email" name="email" type="email" class="validate" required value="{$email}">
				<label for="email" data-error="Wrong email" data-success="Ok!">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input id="password" type="password" name="password" class="validate password-meter" required length="10" maxlength="10" minlength="6" value="{$password}">
				<label for="password">Password</label>

			</div>
			<div class="input-field col s6">
				<input placeholder="@name" pattern="{$twitter_regex}" name="twitter" id="twitter" type="text" class="validate" value="{$twitter}">
				<label for="twitter" data-error="Wrong twitter account" data-success="Ok!">Twitter</label>
			</div>
		</div>

		<div class = "row">

			<div class="file-field input-field col s8">
				<div class="btn waves-effect waves-light deep-orange lighten-2 col s4">
					<span>Profile image</span>
					<input type="file" name = "inputFile" id="inputFile">
				</div>
				<div class="file-path-wrapper col s8">
					<input class="file-path validate" name="img_path" type="text">
				</div>
			</div>
			<div class="file-field input-field col s4">
				<img id="image_upload_preview" class="img-circle" src="http://placehold.it/100x100" alt="your image" />
			</div>

		</div>
		<input class="btn waves-effect waves-light light-blue lighten-1" type="submit" id ="submit" name="submit" value="Register">
	</form>
</div>


<div class="space-50" style="height: 220px"></div>



{$modules.footer}