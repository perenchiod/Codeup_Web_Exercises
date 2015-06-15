<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>My first HTML form</title>
	</head>

	<body>
		<section class="Login form">
			<h2>User login</h2>	
			<form method="POST" action="/my_first_form.php">
    			<p>
        			<label for="username">Username</label>
        			<input id="username" name="username" type="text" placeholder="username" required>
    			</p>
    			<p>
        			<label for="password">Password</label>
        			<input id="password" name="password" type="password" placeholder="password" required>
    			</p>
    			<p>
        			<button>Login!</button>
   	 			</p>
			</form>
		</section>
		<section class="Email form">	
			<h2>Compose an email</h2>
			<form method="POST" action ="/my_first_form.php">
				<p>
					<section>
						<label for="To">To</label>
						<input name="To" type="Text" placeholder="To" id="To">
	
						<label for="From">From</label>
						<input name="From" type="Text" placeholder="From" id="From">
	
						<label for="Subject">From</label>
						<input name="Subject" type="Text" placeholder="Subject" id="Subject">
	
						<br> <textarea id="email_body" name="email_body" rows="8" cols="60" placeholder="Body"></textarea> 

						<br> <label for="Save_copy">Would you like to save a copy of this email to your sent folder?</label>
						<input type="checkbox" name="Save_copy" id="yes" checked>
						<button>Send email</button>
					</section>
				</form>
				
				<section class="Questions form">
					<form method ="POST" action="/my_first_form.php">
						<h2>Multiple choice test</h2>
						<p>1) What color will you pick?</p>
						<label>
							<input type="radio" name="q1" value="red">
							Red
						</label>

						<label>
							<input type="radio" name="q1" value="blue">
							Blue
						</label>

						<label>
							<input type="radio" name="q1" value="green">
							Green
						</label>

						<label>
							<input type="radio" name="q1" value="purple">
							Purple
						</label>

						<p>2) What number am I thinking??</p>
						<label>
							<input type="radio" name="q2" value="1">
							1
						</label>

						<label>
							<input type="radio" name="q2" value="10">
							10
						</label>

						<label>
							<input type="radio" name="q2" value="25">
							25
						</label>

						<label>
							<input type="radio" name="q2" value="0">
							0
						</label>
	
						<p>3) Select what appeals to you</p> 	
						<label><input type="checkbox" id="a1" value="Shopping" name="q3[]">Shopping</label>
						<label><input type="checkbox" id="a2" value="Fising" name="q3[]">Fishing</label>
						<label><input type="checkbox" id="a3" value="Video games" name="q3[]">Video games</label>
						<label><input type="checkbox" id="a4" value="Sleeping" name="q3[]">Sleeping</label>

						<p> <label for="drink">4) Which drink/drinks do you like? (hold ctr or the command key to select multiple options)</label> </p>
						<select id="drink" name="drinks[]" multiple>
							<option value="water">Water</option>
							<option value="Gatorade">Gatorade</option>
							<option value="Coffee">Coffee</option>
							<option value="Tea">Tea</option>
						</select>
				
						<button>Answer!</button>
					</section>
				</p>
			</form>
		<section class="Questions">
			<form method="POST" action="/my_first_form.php">
				<h2>Select testing</h2>
				<label name="Car">Do you have a car?</label>
				<select id="Car" name="Car_owned">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
				<button>Submit</button>
			</form>

		</section>
	</body>
</html>