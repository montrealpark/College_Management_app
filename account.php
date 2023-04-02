<?php 
session_start();

require 'Db_connection.php';
require 'function.php';
	
if(isset($_SESSION["username"])){
	
	$email = $_SESSION['username'];
	$row = displayStudentByEmail($pdo, $email);
	$studentInfor = [];

	if($row){	
		$studentInfor['fName'] = $row["firstName"];
		$studentInfor['lName'] = $row["lastName"];
		$studentInfor['email'] = $row["email"];
		$studentInfor['birthDate'] = $row["birthday"];
		$studentInfor['phoneNumber'] = $row["phoneNumber"];
		$studentInfor['lang'] = $row["language"];
		$studentInfor['campus'] = $row["campus"];
		$studentInfor['program'] = $row["program"];
	} else {
		echo 'There is a error!';
	}
}
else{
	$_SESSION['errorHome'] = "Error";
	header('Location: login.php');       
	exit;}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Account</title>
    <link rel="stylesheet" href="./css/styles.css">
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
						<li><a href='logout.php'>Log Out</a></li>
						<li class="current"><a href='account.php'>My Profile</a></li>
						<li><a href='home.php'>Home</a></li>
					</ul>
				</nav>
			</div>
				<img src="./img/student-life1.jpg" width="100%" >
        </div>
    </header>
	
	<section id="account-info">
		<div>
			<label>First Name:</label>
			<p id="info"><?php echo $studentInfor['fName']?></p>
			<br><br>
			<label>Last Name:</label>
			<p id="info"><?php echo $studentInfor['lName']?></p>
			<br><br>
			<label>DOB:</label>
			<p id="info"><?php echo $studentInfor['birthDate']?></p>
			<br><br>
			<label>Email:</label>
			<p id="info"><?php echo $studentInfor['email']?></p>
			<br><br>
			<label>Phone number:</label>
			<p id="info"><?php echo $studentInfor['phoneNumber']?></p>
			<br><br>
			<label>Language:</label>
			<p id="info"><?php echo $studentInfor['lang']?></p>
			<br><br>
			<label>Program name:</label>
			<p id="info"><?php echo $studentInfor['program']?></p>
		</div>
	</section>
	
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
	
  
  <body>
 </html>
