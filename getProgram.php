<?php
require 'Db_connection.php';
require 'function.php'; 

if (! empty($_POST['programSelected'])){ 
	$programSelected = $_POST['programSelected'];
	$sql = "
	SELECT programName
	FROM programs where programType = '$programSelected';
	";
	$result = pdo($pdo, $sql);
	
	?>
	<option value disabled selected>Select program name</option>
<?php
	foreach($result as $row) { ?>
		<option value=" <?php echo $row["programName"]; ?> "><?php echo $row["programName"]; ?> </option>;
<?php	}	
}					
?>
