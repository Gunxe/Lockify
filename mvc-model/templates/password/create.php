

<div class="form-createPassword box">
	<h1 style="text-align: center;">Create Password</h1>
	<hr>
	
	<form action="/password/doCreate" method="post" class="col-6">
		<div class="form-group">
	  	<input id="title" name="title" type="text" class="form-control" placeholder="Title">
		</div>
		<div class="form-group">
	  	<input id="uname" name="uname" type="text" class="form-control" placeholder="Username">
		</div>

        <div class="form-group">
        <input id="range" type="range" min="8" max="16" value="12" oninput="this.nextElementSibling.value = this.value" > <output>12</output>
        </div>

			<div class="input-data">
        		<div class="display" >
          			<input type="text" class="randomPassword form-control">
          			<span class="far fa-copy" onclick="copy()"></span>
          			<span class="fas fa-copy" onclick="copy()"></span>
        		</div>
				<button  class="btn btn-outline-secondary">Generate Password</button>
      		</div>

		<div class="form-group">
	  	<input id="password" name="password" type="password" class="form-control" placeholder="Password">
          <input type="checkbox" onclick="myFunction()">Show Password
		</div>
		<div class="form-group">
	  	<input id="email" name="email" type="email" class="form-control" placeholder="Email">
		</div>
		<div class="form-group">
	  	<textarea id="notes" name="notes" maxlength="1000" class="form-control" placeholder="Notes"></textarea>
		</div>
		<button type="submit" name="send" class="btn btn-outline-success">Submit</button>
	</form>
</div>

<script>
	const display = document.querySelector("input.randomPassword"),
	button = document.querySelector("button"),
	copyBtn = document.querySelector("span.far"),
	copyActive = document.querySelector("span.fas");
	let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
	button.onclick = ()=>{
		let i,
		randomPassword = "";
		copyBtn.style.display = "block";
		copyActive.style.display = "none";
		for (i = 0; i < document.getElementById("range").value; i++) {
		randomPassword = randomPassword + chars.charAt(
			Math.floor(Math.random() * chars.length)
		);
		}
		display.value = randomPassword;
		return false;
	}
	function copy(){
		copyBtn.style.display = "none";
		copyActive.style.display = "block";
		display.select();
		document.execCommand("copy");
	}
</script>