<?php 
session_start();

require 'function.php';
require 'Db_connection.php';

if(!($_SESSION['admin'])) {
	header('Location: login.php'); 
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" href="./css/styles.css">
	<link rel="Shortcut Icon" href="./img/logo.png" type="image/x-icon">
	<style>
	table, th, td {
	  border: 1px solid;
	}
	</style>
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
						<li><a href='studentList.php'  target="_blank">Manage Student</a></li>
						<li><a href='programList.php'  target="_blank">Manage Program</a></li>
						<li class="current"><a href='adminAccount.php'>Myadmin</a></li>
					</ul>
				</nav>
			</div>
				<img src="./img/school.jpg" width="100%" >
        </div>
    </header>
	
	<section id="account-info">
		<div>
			<h1>Welcome to Admin Page</h1>
			<br>
		</div>
	</section>
	
	<section id="program-info">
		
		<button name="submit" type="submit" class="btn"><a href = "programList.php"  target="_blank">Go to Program Management System</a></button>
	</section>
	<section id="student-info">
		<br>
		<button name="submit" type="submit" class="btn"><a href = "studentList.php"  target="_blank">Go to Student Management System</a></button>
	</section>
	<br><br>
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
