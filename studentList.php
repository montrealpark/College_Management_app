<?php 
session_start();

require 'function.php';
require 'Db_connection.php';

if(!($_SESSION['admin'])) {
	header('Location: login.php'); 
}

$_SESSION['fName'] ="";
$_SESSION['lName'] ="";
$_SESSION['email'] ="";
$_SESSION['birthDate'] ="";
$_SESSION['phoneNumber'] ="";
$_SESSION['lang'] ="";
$_SESSION['campus'] ="";
$_SESSION['program'] ="";
$_SESSION['idSearch']="";

if(isset($_GET['submit'])){
	if($_GET['submit']=="Search"){
		$_SESSION['idSearch'] = $_GET["idSearch"];
		if (empty($_GET["idSearch"])) {
			echo "<script>
				alert('Student id is required to search!')
				</script>";	
		} else {
			$row = displayStudentById($pdo, $_SESSION['idSearch']);
			
			if($row){	
				$_SESSION['fName'] = $row["firstName"];
				$_SESSION['lName'] = $row["lastName"];
				$_SESSION['email'] = $row["email"];
				$_SESSION['birthDate'] = $row["birthday"];
				$_SESSION['phoneNumber'] = $row["phoneNumber"];
				$_SESSION['lang'] = $row["language"];
				$_SESSION['campus'] = $row["campus"];
				$_SESSION['program'] = $row["program"];
			
			} else {
			echo "<script>
				alert('Error cannot search!')
				</script>";
				
			}
		}
	} 
	
	if($_GET['submit']=="Update"){	
		
		$_SESSION['idSearch'] = $_GET['idSearch'];
		$_SESSION['fName']=$_GET['fName'];
		$_SESSION['lName'] = $_GET["lName"];
		$_SESSION['email'] = $_GET["email"];
		$_SESSION['birthDate'] = $_GET["BirthDate"];
		$_SESSION['phoneNumber'] = $_GET["phoneNumber"];
		$_SESSION['lang'] = $_GET["lang"];
		$_SESSION['campus'] = $_GET["campus"];
		$_SESSION['program'] = $_GET["program"];
		
		if (empty($_GET["idSearch"])) {
			echo "<script>
				alert('Student id is required to update!')
				</script>";	
		} else{
			$update = Update($pdo,$_SESSION['idSearch'], $_SESSION['fName'],$_SESSION['lName'], $_SESSION['email'], $_SESSION['birthDate'], $_SESSION['phoneNumber'], $_SESSION['lang'], $_SESSION['campus'], $_SESSION['program']);
			if ($update) {
				echo "<script>
				alert('The student information is updated')
				</script>";
			} else {
			echo "<script>
				alert('Error cannot proceed!')
				</script>";
				
			}
		}
	} 
	
	if($_GET['submit']=="Delete"){
		$id = html_escape($_GET["idSearch"]);
		if (empty($_GET["idSearch"])) {
			echo "<script>
				alert('Student id is required to delete!')
				</script>";	
		} else {
			$delete = deleteStudenById($pdo, $id);
			if ($delete) {
				echo "<script>
				alert('The student is deleted')
				</script>";
			} else {
			echo "<script>
				alert('Error cannot proceed!')
				</script>";
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manage Student</title>
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
						<li class="current"><a href='studentList.php'>Manage Student</a></li>
						<li><a href='programList.php'target="_blank">Manage Program</a></li>
						<li><a href='adminAccount.php'target="_blank">Myadmin</a></li>
					</ul>
				</nav>
			</div>
				<img src="./img/student1.jpg" width="100%" >
        </div>
    </header>
	
	<section id="account-info">
		<div>
			<h1>Student Management System</h1>
			<br>
		</div>
	</section>
	<section id="student-info">
		
		<table>
		<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th><th>Phone Number</th><th>Language</th><th>Campus</th><th>Program</th></tr>
		<?php 
		displayAllStudents($pdo);
		?>
		</table>
	</section>
	<br><br>
	
	
	
	<div id='updateArea'>
			<center><button id="stumodi" >Student Modification</button></center>
			<br><br>			
			<form action="#" method="GET">
			<div class="info">
        		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<label>Student ID : </label>
				<input type="text" name="idSearch" id="idSearch" placeholder="Enter Student ID" value=<?php echo $_SESSION['idSearch'] ?>>&nbsp&nbsp
				<button name="submit" type="submit" class="btn_search" value="Search">Search</button>
				<br><br>
        		<label>First Name : </label>
				<input type="text" name="fName" id="fName" <?php echo "value = '".$_SESSION['fName']."'"?>>
				<br><br>
        		<label>Last Name : </label>
				<input type="text" name="lName" id="lName" value= <?php echo $_SESSION['lName'] ?>>
				<br><br>
        		<label>Birthday : </label>
				<input type="text" name="BirthDate" id="BirthDate" value= <?php echo $_SESSION['birthDate'] ?>>
				<br><br>
				
			
        		<label>Email : </label>
				<input type="text" name="email" id="email" value= <?php echo $_SESSION['email'] ?>>
				<br><br>
        		<label>Phone : </label>
				<input type="text"  name="phoneNumber" id="phoneNumber" <?php echo "value = '".$_SESSION['phoneNumber']."'"?>>
				<br><br>
				<label>Language : </label>
				<input type="text"  name="lang" id="lang" value= <?php echo $_SESSION['lang'] ?>>
				<br><br>
				<label>Campus : </label>
				<input type="text"  name="campus" id="campus" value= <?php echo $_SESSION['campus']  ?>>
				<br><br>
				<label>Program : </label>
				<input type="text"  name="program" id="program" <?php echo "value = '".$_SESSION['program']."'"?>>
				<br><br>
        	</div>	
        	<br>
        	<div class="delup">
				&nbsp&nbsp&nbsp&nbsp<button name="submit" type="submit" class="btn_update" value="Update">Update</button>&nbsp&nbsp&nbsp&nbsp
				<button name="submit" type="submit" class="btn_delete" value="Delete">Delete</button>&nbsp&nbsp&nbsp&nbsp
        	</div>	
			</form>
	
			
	</div>
	
		<br><br>
	</div>
	<br>
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
