<div class="row">
	<form action="/password/doCreate" method="post" class="col-6">
		<div class="form-group">
	  	<input id="title" name="title" type="text" class="form-control" placeholder="Title" value="<?=$password->title;?>">
		</div>
		<div class="form-group">
	  	<input id="uname" name="uname" type="text" class="form-control" value="<?=$password->username;?>" placeholder="Username">
		</div>
		<div class="form-group">
	  	<input id="password" name="password" type="password" class="form-control" placeholder="Password" value="<?=$password->password;?>">
          <input type="checkbox" onclick="myFunction()">Show Password
		</div>
		<div class="form-group">
	  	<input id="email" name="email" type="email" class="form-control" placeholder="Email" value="<?=$password->email;?>">
		</div>
		<div class="form-group">
	  	<textarea id="notes" name="notes" maxlength="1000" class="form-control" placeholder="Notes" value="<?=$password->notes;?>"></textarea>
		</div>
		<button type="submit" name="send" class="btn btn-primary">Submit</button>
	</form>
</div>