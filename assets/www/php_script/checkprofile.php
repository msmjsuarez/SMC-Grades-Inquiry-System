<?php
session_start();
if (!(isset($_SESSION['student_id'])))
  {
echo "Not login";   
  }
else
  {       
	$student_id =  $_SESSION['student_id'];
	$first_name = $_SESSION['first_name']; 
  }

					include 'connect.php';
					
					 $info = mysql_query("SELECT * FROM student where student_id = '$student_id'") 
					 or die(mysql_error()); 
					 
					 				

									echo "<table border='1' >
									<tr>
									<td align=center> <b>Student ID</b></td>";
									
									while($data = mysql_fetch_array($info))
									{   
									    echo "<tr>";
									    echo "<td align=center>$data[0]</td>";
									    echo "</tr>";
									}
									echo "</table>";
									?>	     