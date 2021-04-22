

<div class="box form">
	
	<h1 style="text-align: center;">Login</h1>
	<hr>
	<form action="/login/doLogin" method="post">
		<div class="form-group">
			<input id="uname" name="uname" type="text" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
			<input id="password" name="password" type="password" class="form-control" placeholder="Password">
			<input type="checkbox" onclick="myFunction()">Show Password
		</div>
		<button type="submit" name="send" class="btn btn-outline-success">Submit</button>
	</form>
</div>