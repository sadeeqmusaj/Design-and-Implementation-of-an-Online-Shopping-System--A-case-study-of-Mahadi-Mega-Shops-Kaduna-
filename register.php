 <?php
 	include("conn/conn.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>MMS | Login</title>
	<style>
		body {
			<!-- background: url(../images/google.png); background-repeat: no-repeat; 	background-position: center center; 	background-attachment: fixed;	background-size: 100%;  -->
		}
		#header_name {
			display: none;
		}
		form {
			padding: 15px; background: rgba(250,250,250,0.65); width: 350px;  margin: 75px auto;
		} 
		.login_input {
			padding: 10px;
			width: calc(100% - 20px);
			margin-bottom: 20px;
		}
		 .login_input[type="submit"], .login_input[type="button"]{
			width: calc(100% + 5px);
			background: rgb(0,45,90);
			border: 1px solid silver;
			color: white;
			font-size: 20px;
			padding: 8px;
			cursor: pointer;
		} .login_input[type="button"]{ background: green }
		

		}
		
	</style>
</head>

<body>

		<div id="wrapper">
			<form class="" action="register.php?trial=<?php if(isset($_GET["trial"])){ echo $_GET["trial"] + 1; }else { echo 8; }?>" method="post">
<?php
			if(isset($_POST["register"])){
			   $email = mysql_real_escape_string($_POST['email']);
			   $fullname = mysql_real_escape_string($_POST['fullname']);
			   $password = mysql_real_escape_string(sha1($_POST['password']));
			  
			   $find = 'insert into users values("","'.$fullname.'","'.$email.'","'.$password.'","u")';			 
			  
			  if($query = mysql_query($find)){
				echo '<h3 style="color: green ;">Account Created <a href="login.php">Login now</a></h3>';
			  }else {
				echo '<h3 style="color: red;">Invalid Login details</h3>';
			  }
			
			}


?>
				<label for="email">Fullname:</label>
				<p><input type="text" placeholder="Enter your email address" id="email" class="login_input"  name="fullname" required /></p>
				
				<label for="email">Email:</label>
				<p><input type="text" placeholder="Enter your email address" id="email" class="login_input"  name="email" required /></p>
				
				<label for="password">Password:</label>
				<p><input type="password" placeholder="Enter password" id="password" class="login_input"  name="password" required /></p>
				
				<p><input type="submit" value="Register" class="login_input login_button"  name="register" /></p>
				Allready have an Account?<br/>
				<p><a href="login.php"><input type="button" value="Login Now" class="login_input login_button"  /></a></p>
				
			</form>
		</div>
	
</body>
 
</html> 