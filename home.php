<?php 

session_start();

if(!($_SESSION['username'])) {
	header('Location: login.php'); 
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
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
						<li><a href='account.php'>My Profile</a></li>	
						<li class="current"><a href='home.php'>Home</a></li>
					</ul>
				</nav>
			</div>
				<section class="video-section">
	<div class="video-container ">
      <iframe src="./img/school.mp4" title="video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div> 
	</section>
        </div>
    </header>
	
	
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
