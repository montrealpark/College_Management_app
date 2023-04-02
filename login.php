<?php 
session_start();


require 'Db_connection.php';
require 'function.php';
require 'adminConfig.php';

if(isset($_SESSION['userId'])) {
	header('Location: home.php'); 
}

	$nameError= "";
	$username    = '';                             
	$password  = ''; 
	
	if(isset($_SESSION['errorHome'])||isset($_SESSION['errorAccount'])){
		echo "<script>alert('Please log in to access this page')</script>";
		$_SESSION = [];
	}
	
	if(isset($_POST['submit'])) {     
		
		$email = html_escape($_POST["username"]);
		$password = html_escape($_POST["password"]);
		
		if (empty($_POST["username"]) || empty($_POST["password"]) ) {
			$nameError = " * User name and password is required";	
		}
		
		if($email == $adminEmail && $password == $adminPassword) {
			$_SESSION["admin"] = $email;	
			echo "<script>
			alert('You have been logged in successfully admin');
			window.location = './adminAccount.php';
			</script>";
		}
		
		$login = login($pdo, $email, $password);
		
		if($login) {
			$_SESSION["username"] = $email;	
			echo "<script>
			alert('You have been logged in successfully');
			window.location = './home.php';
			</script>";
		}
		else {
			echo "<script>alert('Incorrect email and/or password')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="./css/logincss.css">
		<link rel="Shortcut Icon" href="./img/logo.png" type="image/x-icon">		
	</head>
	
 <header>
        <div id="showcase">
            <div class="header-container">
                <div id="branding">
                    <a href="./home.php"><img src="./img/logo1.png" width="20%" ></a>
				</div>
                <nav>
					<ul>
						<li><a href='register.php' target="_blank">Register</a></li>
						<li><a href='home.php'>Home</a></li>
					</ul>
				</nav>
			</div>
				
        </div>
    </header>
	<body>	
		<div id="box">
		<div class="infoForm">
		
		<form method="POST" action="login.php">
			<h1>Login</h1>
			<div class="txt">
                <label>Email</label>
				<br><br>
                <input type="text" name="username" placeholder="Your Email address"id="name" ></p>
                <br>
                <label>Password</label><span class="error"> 
				<br><br>
                <input type="password" name="password" id="password" placeholder="Password"></p>  
				
				<span class="error"> <?php echo $nameError;?></span>
			</div> 
            
			<button name="submit" type="submit" class="btn">Login</button>
			<br><br>
            
				<div id="bottom-text">
					<p>Don't have an account?<a href='register.php' target="_blank"><b>  Register here!</b></a></p>
				</div>
			</div>                 			  
        </form>
		</div>
		<div id="img">
			<img src="./img/jump_002.png" >
		</div>
		
		

		
		
		<div class="footer">
		<div class="lci">
			<img src="./img/logo-LciEducation-en.png" id="logo">
		</div>
        <a href="https://www.lasallecollege.com/" target="_blank"><img src="./img/website.png" width="25px"></a>
        <a href="https://www.facebook.com/collegelasalle" target="_blank"><img src="./img/facebook.png" width="25px"></a>
        <a href="https://www.instagram.com/collegelasalle/" target="_blank"><img src="./img/instagram.png" width="25px"></a>
        <a href="https://www.youtube.com/user/LaSalleCollege" target="_blank"><img src="./img/youtube.png" width="25px"></a> 
		<br>
			<img src="./img/copyright-002.png" id="logo" width="220px">
		
    </div> 
	</body>
	
</html>