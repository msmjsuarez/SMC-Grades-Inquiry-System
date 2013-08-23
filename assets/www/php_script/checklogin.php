<?php 
session_start();
include 'connect.php';

if(isset($_GET['idnumber']) && isset($_GET['password'])){

	$idnumber=$_GET['idnumber'];  
	$password=$_GET['password'];

	// To protect MySQL injection (more detail about MySQL injection)
	$idnumber = stripslashes($idnumber);
	$password = stripslashes($password);
	$idnumber = mysql_real_escape_string($idnumber);
	$password = mysql_real_escape_string($password);
					 					 
	$sql="SELECT * FROM student WHERE student_id='$idnumber'";
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	while ($row = mysql_fetch_assoc($result)) 
		{
			$idnumber =$row['student_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
		 
		$passwordf = $idnumber.'-'.$first_name[0].'-'.$last_name[0];
		}
		
	mysql_free_result($result);
	
	if($count==1 and $password == $passwordf) {
		$_SESSION['student_id']= $student_id;
		$_SESSION['first_name'] = $first_name; 

		echo 'Welcome '.$_SESSION['first_name'];
	
		$sql="SELECT * FROM student WHERE student_id='".$_SESSION['student_id']."'";
			$result=mysql_query($sql);
		
			// Mysql_num_row is counting table row
			$count=mysql_num_rows($result);
			
			echo "<table border='1' >
									<tr>
									<td align=center> <b>Student ID</b></td>";
		
			while ($row = mysql_fetch_assoc($result)) 
				{
					$idnumber =$row['student_id'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					echo "<tr>";
					echo "<td align=center>'".$row['student_id']."'</td>";
					echo "<td align=center>'".$row['first_name']."'</td>";
					echo "<td align=center>'".$row['last_name']."'</td>";
					echo "</tr>";
				}	
				echo "</table>";
		
	}
	else {
		echo 0;
	}	
}				 				 
?>














<?php //include 'connect.php'; ?>

<?php
/*
if(isset($_GET['idnumber']) && isset($_GET['password'])){

$idnumber = $_GET['idnumber'];
$password = $_GET['password'];

$getUser_sql = "SELECT * FROM student WHERE student_id = '$idnumber'";
$getUser = mysql_query($getUser_sql);
//$getUser_result = mysql_fetch_assoc($getUser);


while ($getUser_result = mysql_fetch_assoc($getUser)) 
		{
			$idnumber =$row['student_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
		 
		$passwordf = $idnumber.'-'.$first_name[0].'-'.$last_name[0];
		}
		
		
$getUser_RecordCount = mysql_num_rows($getUser);

	if($getUser_RecordCount < 1){ 
		echo 0;} 
	else { 
		echo $first_name;
	}
}
*/

?>