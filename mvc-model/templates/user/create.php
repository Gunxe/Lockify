<div class="row">
	<form action="/user/doCreate" method="post" class="col-6">
		<div class="form-group">
	  	<input id="uname" name="uname" type="text" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
	  	<input id="email" name="email" type="email" class="form-control" placeholder="E-Mail">
		</div>
		<div class="form-group">
	  	<input id="password" name="password" type="password" class="form-control" placeholder="Password">
		<input type="checkbox" onclick="myFunction()">Show Password
		</div>
		<button type="submit" name="send" class="btn btn-primary">Submit</button>
	</form>
</div>
