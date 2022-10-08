 <?php
 	include("conn/conn.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>MMS | Login</title>
    
	<style>
		body {
			 background: url(../new/login.jpg); background-repeat: no-repeat; 	background-position: center center; 	background-attachment: fixed;	background-size: 100%;  
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
		.login_input[type="submit"], 
		.login_input[type="button"]
		{
			width: calc(100% + 5px);
			background: rgb(0,45,90);
			border: 1px solid silver;
			color: white;
			font-size: 20px;
			padding: 8px;
			cursor: pointer;
		} 
		.login_input[type="button"]{ background: green }
		

		}
		
	</style>
</head>

<body>
     
		<div id="wrapper">
			<form class="" action="login.php?trial=<?php if(isset($_GET["trial"])){ echo $_GET["trial"] + 1; }else { echo 8; }?>" method="post">
<?php
			if(isset($_POST["login"])){
			   $email = mysql_real_escape_string($_POST['email']);
			   $password = mysql_real_escape_string(sha1($_POST['password']));
			  
			   $find = 'SELECT * FROM users where email = "'.$email.'" and password = "'.$password.'"';
			   $query = mysql_query($find);
			 
			  $row= mysql_fetch_assoc($query);
			  
			  if($row > 0){
				$_SESSION["user_id"] = $row["id"];
				$_SESSION["user_fullname"] = $row["fullname"];
				$_SESSION["user_email"] = $row["email"];
				$_SESSION["user_type"] = $row["user_type"];
				$_SESSION["user_city"] = 1;
				
				if($_SESSION["user_type"] == "a"){
					$_SESSION["user_currency"] = '&pound;';
					$_SESSION["user_curr"] = 'GBP;';
					header("Location:index.php");
				}else {
					header("Location:index.php");
				}
				
			  }else {
				echo '<h3 style="color: red;">Invalid Login details</h3>';
			  }
			
			}


?>
				<label for="email">Email:</label>
				<p><input type="text" placeholder="Enter your email address" id="email" class="login_input"  name="email" required /></p>

				<label for="password">Password:</label>
				<p><input type="password" placeholder="Enter password" id="password" class="login_input"  name="password" required /></p>
				<p><input type="submit" value="Login" class="login_input login_button"  name="login" /></p>
				Don't Have an Account yet?<br/>
				<p><a href="register.php"><input type="button" value="Register Now" class="login_input login_button"  /></a></p>
				
			</form>
		</div> 

    
</body>

</html> 