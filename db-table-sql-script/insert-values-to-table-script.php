<?php
include 'header.php';


mysql_query("INSERT INTO department (department_name) VALUES('College of Engineering and Information Technology')") or die(mysql_error()); 
mysql_query("INSERT INTO department (department_name) VALUES('College of Criminology')") or die(mysql_error()); 



mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.10, 1, 1)") or die(mysql_error()); 
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.10, 1, 2)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.0, 2, 3)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.80, 2, 4)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.70, 3, 5)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(3.0, 4, 6)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(5.0, 1, 7)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.90, 1, 8)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.60, 2, 9)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.70, 2, 10)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.00, 3, 11)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.10, 4, 12)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.10, 1, 13)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.40, 2, 14)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(2.50, 3, 15)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.20, 4, 16)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(3.0, 5, 17)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(5.0, 6, 18)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(3.0, 7, 19)") or die(mysql_error());
mysql_query("INSERT INTO grading_sheets (fgrades, term_id, subject_enrolled_id) VALUES(1.10, 1, 20)") or die(mysql_error());



mysql_query("INSERT INTO instructor (instructor_name) VALUES('Leonie Abilay')") or die(mysql_error()); 
mysql_query("INSERT INTO instructor (instructor_name) VALUES('Jasper Laput')") or die(mysql_error()); 



mysql_query("INSERT INTO school_year (fschool_year) VALUES('2012-2013')") or die(mysql_error()); 
mysql_query("INSERT INTO school_year (fschool_year) VALUES('2013-2014')") or die(mysql_error()); 



mysql_query("INSERT INTO semester (semester_name, school_year_id) VALUES('1', 1)") or die(mysql_error()); 
mysql_query("INSERT INTO semester (semester_name, school_year_id) VALUES('2', 1)") or die(mysql_error());
mysql_query("INSERT INTO semester (semester_name, school_year_id)  VALUES('S', 1)") or die(mysql_error());
mysql_query("INSERT INTO semester (semester_name, school_year_id) VALUES('1', 2)") or die(mysql_error());  



mysql_query("INSERT INTO student (student_id, first_name, last_name, age, email, year_of_enrollment, department_id) VALUES('C13-1018','John','Perez', 17, 'johnperez@gmail.com', '2013-2014', 1)") or die(mysql_error()); 
mysql_query("INSERT INTO student (student_id, first_name, last_name, age, email, year_of_enrollment, department_id) VALUES('C12-1010','Aiana','Padilla', 20, 'aianapadilla@gmail.com', '2012-2013', 1)") or die(mysql_error());




mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('Eng-1', 'Study and Thinking Skills')") or die(mysql_error()); 
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('IT-101', 'Computer Fundamentals and Concepts')") or die(mysql_error()); 
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('Eng-2', 'Writing in Discipline')") or die(mysql_error()); 
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('IT-102', 'Software Applications')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('ITE-221', 'Data Structures')") or die(mysql_error()); 
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('Phys-21', 'College Physics 1')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('Math-212', 'Discrete Mathematics 1')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('Math-223', 'Discrete Mathematics 2')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('ITE-205', 'Software Engineering')") or die(mysql_error());  
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('ITE-222', 'Logic Design')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name) VALUES('ITE-321', 'Computer Architecture')") or die(mysql_error());




mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('Eng-1', 1, 'C13-1018')") or die(mysql_error()); 
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('IT-101', 1, 'C13-1018')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('Eng-2', 1, 'C13-1018')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('IT-102', 1, 'C13-1018')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('ITE-221', 1, 'C13-1018')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('ITE-321', 2, 'C11-1010')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('ITE-222', 2, 'C11-1010')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('ITE-205', 2, 'C11-1010')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('Math-223', 2, 'C11-1010')") or die(mysql_error());
mysql_query("INSERT INTO subject_offered (subject_code, instructor_id, student_id) VALUES('Math-212', 1, 'C11-1010')") or die(mysql_error());




mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Prelim', 1)") or die(mysql_error()); 
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Midterm', 1)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Semifinal', 1)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Final', 1)") or die(mysql_error());

mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Prelim', 2)") or die(mysql_error()); 
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Midterm', 2)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Semifinal', 2)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Final', 2)") or die(mysql_error());

mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Prelim', 3)") or die(mysql_error()); 
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Midterm', 3)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Semifinal', 3)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Final', 3)") or die(mysql_error());

mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Prelim', 4)") or die(mysql_error()); 
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Midterm', 4)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Semifinal', 4)") or die(mysql_error());
mysql_query("INSERT INTO term (term_name, semester_id) VALUES('Final', 4)") or die(mysql_error());




include 'footer.php';

?>