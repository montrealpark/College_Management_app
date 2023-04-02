<?php 
session_start();

require 'function.php';
require 'Db_connection.php';

if(!($_SESSION['admin'])) {
	header('Location: login.php'); 
}

if(isset($_POST['submit'])){
	if($_POST['submit']=="add"){
		if (empty($_POST["pType"]) || empty($_POST["pName"])) {
		echo "<script> alert('Program type and name is required!')</script>";	
		} else {
		$pType = html_escape($_POST["pType"]);
		$pName = html_escape($_POST["pName"]);
		$add = insertProgram($pdo, $pType,$pName);
		if ($add) {
			echo "<script>
			alert('The new program is successfully added')
			</script>";
		} else {
		echo "<script>
			alert('Error cannot proceed!')
			</script>";
			
			}
		}
	}
	
	if($_POST['submit']=="delete"){
		if(!empty($_POST["id"])){
		$pdo-> beginTransaction();		
			try{
				$pId = $_POST["id"];
				$result = getProgramName($pdo, $pId);
				
				if($result){
					$pName = $result['programName'];
				}			
				$delStudent = deleteStudentInProgram($pdo, $pName);
				$delete= deleteProgram($pdo, $pId);
				$pdo->commit();
				
				if($delete && $delStudent){
					echo "<script>
				alert('The program has been deleted and change has made for student in the prorgam!')
				</script>";
				}
			}catch(PDOException $exception){
				$pdo->rollback();
				echo $exception->getMessage();                 
			}
		} else{
			echo "<script>
				alert('ID is required to delete')
				</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manage Program</title>
    <link rel="stylesheet" href="./css/styles.css">
	<link rel="Shortcut Icon" href="./img/logo.png" type="image/x-icon">
	<style>
	table, th, td {
	  border: 1px solid;
	}
	</style>
	<script src="./js/programList.js"></script>
  </head>
  
  <header>
        <div id="showcase">
            <div class="header-container">
                <div id="branding">
                    <a href="./home.php"><img src="./img/logo1.png" width="20%" ></a>
				</div>
                <nav>
					<ul>
						<li><a href='studentList.php' target="_blank">Manage Student</a></li>
						<li class="current"><a href='programList.php'>Manage Program</a></li>
						<li><a href='adminAccount.php' target="_blank">Myadmin</a></li>
					</ul>
				</nav>
			</div>
				<img src="./img/promana1.jpg" width="100%" >
        </div>
    </header>
	
	<section id="account-info">
		<div>
			<h1>Program Management System</h1>
			<br>
		</div>
	</section>
	<table>
		<tr><th>ID</th><th>Program Type</th><th>Program Name</th></tr>
		<?php 
		displayAllPrograms($pdo);
		?>
		</table>
	
	<br><br>
	<center><button id="addProgram" >Click here to Add program</button></center>
	<br>
	<div id='addArea' hidden>
		
		<form method="POST" >
			<div class="txtb">
				<label>Program Type : </label>
				<input type="text" name="pType" id="pType" placeholder="Enter Program Type"></p>
				<br>	
				<label>Program Name : </label>
				<input type="text" name="pName" id="pName" placeholder="Enter Program Name"></p> 
				<br>	
				<button name="submit" type="submit" class="btn_submit" value="add">Add</button>

			</div>
		</form>
		<br><br>
	</div>
	
	<center><button id="del" >Click here to Delete program</button></center>
	<br>
	<div id='deleteArea' hidden>
		
		<form method="POST" >
			<div class="txtb">
				<label>Program ID : </label>
				<input type="text" name="id" id="id" placeholder="Enter Program ID to delete"></p>            
				<br>	  			
				<button name="submit" type="submit" class="btn_submit" value="delete">Delete</button>

			</div>
		</form>
	<br>	
	</div>
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
