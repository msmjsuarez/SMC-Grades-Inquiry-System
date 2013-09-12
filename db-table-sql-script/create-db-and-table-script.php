<?php
include 'header.php';

	echo "<p class='note'>Note: The database tables created for smc-grading-system server (dummy) are those use in the study only.</p>";


	if(!mysql_select_db('smcgradingsystem'))
	{
		$sql = "CREATE DATABASE smcgradingsystem";
		mysql_query($sql);
	}
	else
	{	

		$sql="SELECT * FROM student";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE student(student_id varchar(8) NOT NULL PRIMARY KEY, first_name char(30),last_name char(30), age int(2), email varchar(30), year_of_enrollment varchar(9), department_id int(2))") or die(mysql_error());  
		echo "<p>Table student created successfully.</p>";
		}



		$sql="SELECT * FROM department";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE department(department_id int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT, department_name char(100))") or die(mysql_error());  
		echo "<p>Table department created successfully.</p>";
		}	

		
			
		$sql="SELECT * FROM semester";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE semester(semester_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, semester_name char(5))") or die(mysql_error());  
		echo "<p>Table semester created successfully.</p>";
		}
			
			
				
		$sql="SELECT * FROM term";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE term(term_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, term_name varchar(10))") or die(mysql_error());  
		echo "<p>Table term created successfully.</p>";
		}


		
		$sql="SELECT * FROM school_year";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE school_year(school_year_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, fschool_year varchar(9))") or die(mysql_error());  
		echo "<p>Table school_year created successfully.</p>";
		}

		
		
		$sql="SELECT * FROM subject";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE subject(subject_code varchar(11) NOT NULL PRIMARY KEY, subject_name varchar(100), credit int(2) )") or die(mysql_error());  
		echo "<p>Table subject created successfully.</p>";
		}
		
		
			
		$sql="SELECT * FROM grading_sheets";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE grading_sheets (grading_sheets_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, subject_code varchar(11), fgrades double, term_id int(11), semester_id int(11), school_year_id int(11), student_id varchar(8))") or die(mysql_error());  
		echo "<p>Table grading_sheets created successfully.</p>";
		}

		
		

		

		


		/*$sql="SELECT * FROM instructor";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE instructor(instructor_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, instructor_name char(50))") or die(mysql_error());  
		echo "<p>Table instructor created successfully.</p>";
		}*/
		
		
		

		/*$sql="SELECT * FROM subject_offered";
		$result=@mysql_query($sql);
		if (!$result)
		{
		mysql_query("CREATE TABLE subject_offered(subject_offered_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, subject_code varchar(11), instructor_id int(11))") or die(mysql_error());  
		echo "<p>Table subject_offered created successfully.</p>";
		}*/

		
		
		
			

	} //end else

include 'footer.php';
?>