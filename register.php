<!--Yulia Samoilovich
	Hau Vu
	Hyemi Park-->

<?php 

session_start();

require 'Db_connection.php';
require 'function.php';


	$fName = "";
	$lName = "";
	$fNameError ="";
	$lNameError ="";
	
	$dob = "";
	$error ="";
	$email = "";
	$phone = "";
	$password = "";
	$emailError = '';
	$phoneError = '';
	$passwordError = '';
	
	
	$lang="";
	$campus="";
	$type="";
	$programId="";
	$campusError="";
	$langError="";
	$typeError="";
	$programError="";
	
	if(isset($_POST['submit'])){
		
		$fName = html_escape($_POST["fName"]);
		$lName = html_escape($_POST["lName"]);
		$dob = html_escape($_POST["dob"]);
		$email = html_escape($_POST["email"]);
		$phone = html_escape($_POST["phone"]);
		$campus=html_escape($_POST["campus"]);
		$type= html_escape($_POST["type"]);
		$programId= html_escape($_POST["programId"]);
		$password = html_escape($_POST["password"]);
		
		$anyError = false;
		
		if (empty($_POST["fName"])) {
			$fNameError = " * First name is required";
			$anyError = true;	
		} else if (!preg_match("/^[A-Z][a-z]{0,14}$/", $fName)) {
			$fNameError = " * Only 15 letters allowed/first letter must be capitalized";
			$anyError = true;
		}

		if (empty($_POST["lName"])) {
			$lNameError = " * Last name is required";	
			$anyError = true;	
		} else if (!preg_match("/^[A-Z][a-z]{0,19}$/", $lName)) {
			$lNameError = " * Only 20 letters allowed/first letter must be capitalized"; 
			$anyError = true;
		}
		
		if(empty($_POST["dob"])){
			$error = " * Required field";
			$anyError = true;
		}else if(!preg_match("/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}$/", $dob)){
			$error = " * Please enter the format dd-mm-yyyy";
			$anyError = true;
		}
		
		if(empty($_POST["email"])){
			$emailError = " * Required field";
			$anyError = true;
		}
		
		if(empty($_POST["phone"])){
			$phoneError = " *  Required field";
			$anyError = true;
		}
		
		if(empty($_POST["lang1"]) && empty($_POST["lang2"])){
			$langError = " * Required field";
			$anyError = true;
		} else if (empty($_POST["lang1"])){
			$lang="French";
		} else{
			$lang="English";
		}
		if(empty($_POST["type"])){
			$typeError = " * Required field";
			$anyError = true;
		}
		
		if(empty($_POST["campus"])){
			$campusError = " * Required field";
			$anyError = true;
		}
		if(empty($_POST["programId"])){
			$programError = " * Required field";
			$anyError = true;
		}
		
		if(empty($_POST["password"])){
			$passwordError = " *  Required field";
			$anyError = true;
		}
		
		
		if($anyError===false) {
			
			
			$emailExist = checkExist($email, $pdo);
			
			$programStudent = checkProgram($programId, $pdo);
			
			
			if($emailExist){
				echo "<script>alert('There is already a user with this email');</script>";
			}	elseif ($programStudent){
				echo "<script>alert('Program has enough student, cannot proceed!');</script>";
			} else{
				echo $fName;
				echo$lName;
				insertStudent($pdo, $fName, $lName, $email, $dob, $phone, $lang, $campus, $programId, $password) ;
				
				echo "<script>
				alert('You have successfully registered. Thank you!')
				window.location = './login.php';
				</script>";
			}				
		}
		else {
			echo "<script>alert('There is an error');</script>";
		}
	}	
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" href="./css/registercss.css">
	<link rel="Shortcut Icon" href="./img/logo.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script>
	function getProgram(val){
			$.ajax({
				type: "POST",
				url: "getProgram.php",
				data: 'programSelected='+val,
				cache: false,
				success: function(data){
					$("#programName").html(data); 	  
				}
			});
		}
	</script>
  </head>
  
  <body>
    <div class="myForm">
        <div class="infoForm">
            <h1><a href="https://www.lasallecollege.com/" target="_blank"><img src="./img/stu_5.png" alt="logo" id="myLogo"></h1></a>
            <br><br><br>
            <div class="Bimage">
                <img src="./img/background.jpg" alt="image" id="Bimage">
            </div>
        </div>
        <div class="regi_form" >		    
            <div>
                <h2><b>Registration Form</b></h2>
            </div>
            <form method="POST">
              <div class="txtb">
                  <label>First name : </label><span class="error"> <?php echo $fNameError;?></span>  
                  <input type="text" name="fName" class="name"></p>
                  
                  <label>Last name : </label><span class="error"> <?php echo $lNameError;?></span>  
                  <input type="text" name="lName" class="name"></p>
             
                  <label>Enter your date of birth : </label><span class="error"> <?php echo $error;?></span>  
                  <input type="text" placeholder="dd-mm-yyyy" name="dob">
                  
                  <label>Enter your phone number : </label><span class="error"> <?php echo $phoneError;?></span>
                  <input type="tel" name="phone">
				  
				  <label>Enter your email : </label><span class="error"> <?php echo $emailError;?></span>  
                  <input type="email" name="email">
                  
                    
				  <label>Enter your password : </label><span class="error"><?php echo $passwordError;?> </span>  
                  <input type="password" name="password">
              </div>

              <div>
                <p>
                    Select language : &nbsp&nbsp&nbsp&nbsp&nbsp English <input type="radio" name="lang1" class="language">  &nbsp&nbsp French <input type="radio" name="lang2" class="language">
					<span class="error"> <?php echo $langError;?></span>
                </p>
              </div>
              <br>

              <div>
                <p>Choose campus : &nbsp&nbsp&nbsp&nbsp&nbsp
                  <select style="width: 100px;", class="select", name="campus">
                      <option checked></option>
                      <option>Montreal</option>
                      <option>Laval</option>
                  </select>
				  <span class="error"> <?php echo $campusError;?></span>
                </p>
              </div>
              <br>
              <div>
                  <p>Select program type :
                      <select id="abc" style="width: 100px;", class="select", name="type", onChange="getProgram(this.value);">
							<option value="" checked></option>
							
							<?php
							$result = displayProgramType($pdo);
							foreach($result as $row) {
								echo '<option value="'.$row['programType'].'" id="'.$row['programType'].'">'.$row['programType'].'</option>';
							}							
							?>
                      </select>
					  <span class="error"> <?php echo $typeError;?></span>
                    </p>
              </div>
              <br>
              <div>
                  <p>List of programs :</p><br>
                      <select style="height: 25px;", class="program", name="programId", id="programName" >
                          <option checked></option>
                    </select> 
						<span class="error"> <?php echo $programError;?></span>
              </div>        
			<br><br><br><br>
				<div class="buttons">
				  <button name="submit" type="submit" class="btn_submit">Submit</button>
				  <button name="reset" type="reset" class="btn_clear">Clear</button>
				  <button name="comeback" type="submit" class="btn_back"><a href='login.php' target="_blank">Comeback to Log-in</a></button>
				</div>
            </form>
            
        </div>
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