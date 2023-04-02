<?php

function pdo(PDO $pdo, string $sql, array $arguments = null)
{
    if (!$arguments) {                   
        return $pdo->query($sql);        
    }
    $statement = $pdo->prepare($sql);    
    $statement->execute($arguments);     
    return $statement;                   
}

function html_escape($text): string
{
    $text = $text ?? ''; 
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); 
}
// check if the email is already registered or not
function checkExist($email, $pdo){
		$sql = "SELECT * FROM students WHERE email= '$email';";
		$result = pdo($pdo, $sql)->fetch();
			
		if( !empty($result)) {
			return true;
		}
		else {
			return false;
		}
	}
//check if number of student in a program is 10 or not
function checkProgram($program, $pdo){
		$sql = "SELECT count(*) as total FROM students WHERE program= '$program';";
		$result = pdo($pdo, $sql)->fetch();
			
		if( $result['total']>=10) {
			return true;
		}
		else {
			return false;
		}
	}
// insert student to database
function insertStudent($pdo, $fname,$lname, $email, $birthDate, $phoneNumber, $lang, $campus, $program, $password){
        
		$sql = "
			INSERT INTO students (firstName, lastName, birthday, email, phoneNumber, language, campus, program, password) VALUES ('$fname', '$lname','$birthDate', '$email', '$phoneNumber','$lang','$campus', '$program','$password');";

        $result = pdo($pdo, $sql);
        return $result;
            
    }	
//display program list	
function displayProgramType($pdo){
	
		$sql = "SELECT DISTINCT programType FROM programs;";
		$result = pdo($pdo, $sql);
		return $result;
}
//check if login information is ok
function login($pdo, $email, $password){
		$sql = "SELECT * FROM students WHERE email= '$email' AND password= '$password';";
		$result = pdo($pdo, $sql)->fetch();
			
		if(!empty($result)) {
			
			return true;
		}
		else {
			return false;
		}
	}
//search student by email
function displayStudentByEmail($pdo, $email){
    
    $sql = "SELECT * FROM students WHERE email= '$email';";
	$result = pdo($pdo, $sql)-> fetch();     
    return $result;
    }
//search student by id	
function displayStudentById($pdo, $id){
    
    $sql = "SELECT * FROM students WHERE id= '$id';";
	$result = pdo($pdo, $sql)-> fetch();     
    return $result;
    }
//update student by id
function Update($pdo,$id, $fName,$lName, $email, $birthDate, $phoneNumber, $lang, $campus, $program){
    $sql = "update students set firstName = '$fName', lastName='$lName', birthday = '$birthDate', email='$email', phoneNumber='$phoneNumber', language='$lang', campus='$campus', program='$program' where id = '$id'";
    $result = pdo($pdo, $sql);
    return $result;      
    }	
//display student list
function displayAllStudents($pdo){
	
    $sql = "select * from students";
	$result = pdo($pdo, $sql);
	$studentArray = [];   
    foreach ($result as $row) { 
            
		echo "<tr id=".$row["id"].", name=".$row["id"].">";
        echo "<td>".$row["id"]."</td>";  
		echo "<td>".$row["firstName"]."</td>";
		echo "<td>".$row["lastName"]."</td>";
		echo "<td>".$row["birthday"]."</td>";
		echo "<td>".$row["email"]."</td>";
		echo "<td>".$row["phoneNumber"]."</td>";
		echo "<td>".$row["language"]."</td>";
		echo "<td>".$row["campus"]."</td>";
		echo "<td>".$row["program"]."</td>";
        echo "<tr>";
     
    }
}
//display program list
function displayAllPrograms($pdo){
    
    $sql = "select * from programs";
	$result = pdo($pdo, $sql);
	$studentArray = [];   
    foreach ($result as $row) { 
            
		echo "<tr id=".$row["id"].">";
        echo "<td>".$row["id"]."</td>";  
		echo "<td>".$row["programType"]."</td>";
		echo "<td>".$row["programName"]."</td>";
        echo "<tr>";
     
    }
}
//delete student by id
function deleteStudenById($pdo, $id){   
    $sql = "Delete from students where id = '$id' ";
	$result = pdo($pdo, $sql);
    return true;
}
//delete program
function deleteProgram($pdo, $pID){   
    
	$sql = "Delete from programs where id = '$pID' ";
	$result = pdo($pdo, $sql);
	return true;	
}
//get program name
function getProgramName($pdo, $pId){
	$sql = "select programName from programs where id = '$pId' ";
	$result = pdo($pdo, $sql)-> fetch();
	return $result;
}

function deleteStudentInProgram($pdo, $pName){
	$sql = "update students set program=null where program like '%$pName%'; ";
	$result = pdo($pdo, $sql);
    return true;
}

function insertProgram($pdo, $pType,$pName){    
	$sql = "
		INSERT INTO programs (programType, programName) VALUES ('$pType', '$pName');";
    $result = pdo($pdo, $sql);
    return true;
}           

?>