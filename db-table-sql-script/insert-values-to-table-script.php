<?php

include 'header.php';


mysql_query("INSERT INTO department (department_name) VALUES('College of Engineering and Information Technology')") or die(mysql_error()); 




mysql_query("INSERT INTO school_year (fschool_year) VALUES('2011-2012')") or die(mysql_error()); 

mysql_query("INSERT INTO school_year (fschool_year) VALUES('2012-2013')") or die(mysql_error()); 

mysql_query("INSERT INTO school_year (fschool_year) VALUES('2013-2014')") or die(mysql_error()); 




mysql_query("INSERT INTO semester (semester_name) VALUES('First')") or die(mysql_error()); 

mysql_query("INSERT INTO semester (semester_name) VALUES('Second')") or die(mysql_error());

mysql_query("INSERT INTO semester (semester_name) VALUES('Summer')") or die(mysql_error());


 



mysql_query("INSERT INTO term (term_name) VALUES('Prelim')") or die(mysql_error()); 

mysql_query("INSERT INTO term (term_name) VALUES('Midterm')") or die(mysql_error());

mysql_query("INSERT INTO term (term_name) VALUES('Semifinal')") or die(mysql_error());

mysql_query("INSERT INTO term (term_name) VALUES('Final')") or die(mysql_error());





mysql_query("INSERT INTO student (student_id, first_name, last_name, age, email, year_of_enrollment, department_id) VALUES('C11-0395','Kevin','Cutab', 20, 'kevincutab@gmail.com', '2011-2012', 1)") or die(mysql_error()); 

mysql_query("INSERT INTO student (student_id, first_name, last_name, age, email, year_of_enrollment, department_id) VALUES('C12-0355','Kennelyn Mae','Obatay', 19, 'kennelymaeobatay@gmail.com', '2012-2013', 1)") or die(mysql_error());

mysql_query("INSERT INTO student (student_id, first_name, last_name, age, email, year_of_enrollment, department_id) VALUES('C13-0573','Ben Bryan','Abijay', 17, 'benbryanabijay@gmail.com', '2013-2014', 1)") or die(mysql_error());






mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('1', '2011-2012', 'C11-0395')") or die(mysql_error());
mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('2', '2012-2013', 'C11-0395')") or die(mysql_error());
mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('3', '2013-2014', 'C11-0395')") or die(mysql_error());
mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('2', '2011-2012', 'C12-0355')") or die(mysql_error());
mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('3', '2013-2014', 'C12-0355')") or die(mysql_error());
mysql_query("INSERT INTO enrolled_year (school_year_id, fschool_year, student_id) VALUES('3', '2013-2014', 'C13-0573')") or die(mysql_error());






mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-101', 'IT Fundamentals', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Math-111', 'College Algebra', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Eng-1', 'Study and Thinking Skills', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Fil-1', 'Sining nang Pakikipagtalastasan', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Socsc-1', 'Philippines History: Roots and Development', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('PE-1', 'Self-Testing Activities', '2.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('NSTP-1', 'National Service Training Program', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Fil-2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-102', 'Computer Programming 1', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Eng-2', 'Writing in the Discipline', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('RS-1', 'Basic Elements of Faith', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Math-112', 'Plane and Spherical Trigonometry', '3.0')") or die(mysql_error()); 

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-322', 'Presentation Skills in IT', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('NSTP-2', 'National Service Training Program', '3.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('PE-2', 'Rhythmic Activities', '2.0')") or die(mysql_error());

mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-103', '', '4.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Math-122', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('IT-201', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-222', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-104', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Socsc-2', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Eng-3', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('RS-2', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('PE-3', '', '2.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-211', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('IT-314', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Lit-1', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-105', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Phys-21', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Phys-21L', '', '2.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('RS-3', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('PE-4', '', '2.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Phys-22', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Math-213', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('ITE-212', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('NatSc-3', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('RS-4', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('IT-204', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('IT-203', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('Phys-22L', '', '1.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('SocSc-5', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('SocSc-6', '', '3.0')") or die(mysql_error());
mysql_query("INSERT INTO subject (subject_code, subject_name, credit) VALUES('IT-202', '', '3.0')") or die(mysql_error());







//Cutab, First Sem, 2011-2012, Prelim
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.25, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.75, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-1', 1.75, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.25, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-1', 1.00, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-1', 1.75, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-1', 1.25, 1, 1, 1, 'C11-0395')") or die(mysql_error()); 



//Cutab, First Sem, 2011-2012, Midterm
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.25, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.0, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-1', 1.75, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.25, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-1', 1.00, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-1', 1.25, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-1', 1.5, 2, 1, 1, 'C11-0395')") or die(mysql_error()); 



//Cutab, First Sem, 2011-2012, SemiFinal
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.0, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.0, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-1', 1.5, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.25, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-1', 1.00, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-1', 1.0, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-1', 1.5, 3, 1, 1, 'C11-0395')") or die(mysql_error()); 



//Cutab, First Sem, 2011-2012, Final
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.5, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.0, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-1', 1.25, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.0, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-1', 1.25, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-1', 1.0, 4, 1, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-1', 1.5, 4, 1, 1, 'C11-0395')") or die(mysql_error());



//Cutab, Second Sem, 2011-2012, Prelim
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) 
										VALUES('Fil-2', 1.0, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-130', 1.0, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.20, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.25, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 1.06, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.6, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-2', 1.0, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-2', 1.0, 1, 2, 1, 'C11-0395')") or die(mysql_error()); 



//Cutab, Second Sem, 2011-2012, Midterm
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.08, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-130', 1.30, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.30, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.08, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 1.10, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.3, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-2', 1.25, 2, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-2', 1.0, 2, 2, 1, 'C11-0395')") or die(mysql_error());



//Cutab, Second Sem, 2011-2012, SemiFinal
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.04, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-130', 1.06, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.10, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.10, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 1.08, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.10, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-2', 1.5, 3, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-2', 1.08, 3, 2, 1, 'C11-0395')") or die(mysql_error());



//Cutab, Second Sem, 2011-2012, Final
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.02, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-130', 1.20, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.08, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.10, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 1.02, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.08, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NSTP-2', 1.50, 4, 2, 1, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-2', 1.02, 4, 2, 1, 'C11-0395')") or die(mysql_error());



//Cutab, First Sem, 2012-2013, Prelim
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-103', 1.0, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.08, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.90, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 1.10, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-104', 1.6, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.6, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-3', 1.20, 1, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.06, 1, 1, 2, 'C11-0395')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.0, 1, 1, 2, 'C11-0395')") or die(mysql_error());



//Cutab, First Sem, 2012-2013, Midterm
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-103', 1.0, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.04, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.80, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 2.30, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-104', 1.3, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 2.10, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-3', 1.10, 2, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.08, 2, 1, 2, 'C11-0395')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.0, 2, 1, 2, 'C11-0395')") or die(mysql_error());



//Cutab, SemiFinal, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-103', 1.04, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.1, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.80, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 1.8, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-104', 1.1, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 2.20, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-3', 1.08, 3, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.06, 3, 1, 2, 'C11-0395')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.0, 3, 1, 2, 'C11-0395')") or die(mysql_error());



//Cutab, Final, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-103', 1.06, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.08, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.60, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 1.8, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-104', 1.1, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.80, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-3', 1.02, 4, 1, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.06, 3, 1, 2, 'C11-0395')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.0, 3, 1, 2, 'C11-0395')") or die(mysql_error());



//Cutab, Prelim, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 1.08, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.5, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.08, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.20, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.7, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 2.10, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.40, 1, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-4', 1.04, 1, 2, 2, 'C11-0395')") or die(mysql_error());



//Cutab, Midterm, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 1.3, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.4, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.4, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.90, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.4, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.3, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.70, 2, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-4', 1.06, 2, 2, 2, 'C11-0395')") or die(mysql_error());



//Cutab, SemiFinal, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 1.4, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.9, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.3, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.80, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.06, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.06, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.40, 3, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-4', 1.02, 3, 2, 2, 'C11-0395')") or die(mysql_error());



//Cutab, Final, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 1.4, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.9, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.7, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.60, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.4, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.08, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.50, 4, 2, 2, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-4', 1.0, 4, 2, 2, 'C11-0395')") or die(mysql_error());



//Cutab, Prelim, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22', 2.0, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-213', 1.0, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-212', 1.50, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.10, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-4', 1.8, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-204', 2.3, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-203', 2.20, 1, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22L', 1.0, 1, 1, 3, 'C11-0395')") or die(mysql_error());



//Cutab, Midterm, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22', 2.0, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-213', 1.06, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-212', 1.08, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.20, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-4', 1.8, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-204', 2.6, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-203', 2.20, 2, 1, 3, 'C11-0395')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22L', 1.02, 2, 1, 3, 'C11-0395')") or die(mysql_error());



//Abijay, Prelim, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.5, 1, 1, 3, 'C13-0573')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 2.9, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.40, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.10, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-102', 1.4, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-5', 2.2, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 2.30, 1, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 2.0, 1, 1, 3, 'C13-057')") or die(mysql_error());



//Abijay, Midterm, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-111', 1.8, 2, 1, 3, 'C13-0573')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 2.1, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.60, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-1', 1.40, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-102', 1.3, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-5', 1.9, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-112', 2.0, 2, 1, 3, 'C13-057')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 2.9, 2, 1, 3, 'C13-057')") or die(mysql_error());



//Obatay, Prelim, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.02, 1, 1, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.5, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.1, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.5, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.04, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.5, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.2, 1, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.7, 1, 1, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Midterm, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.04, 2, 1, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.08, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.04, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.2, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.06, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.3, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.08, 2, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.5, 2, 1, 2, 'C12-0355')") or die(mysql_error());



//Obatay, SemiFinal, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.02, 3, 1, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.30, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.02, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.4, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.04, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.06, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.06, 3, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.3, 3, 1, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Final, First Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-101', 1.04, 4, 1, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('NatSc-3', 1.08, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-1', 1.06, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-201', 1.1, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Fil-2', 1.0, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Eng-2', 1.0, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-122', 1.0, 4, 1, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Socsc-2', 1.3, 4, 1, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Prelim, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 2.2, 1, 2, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-6', 1.5, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.04, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.4, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.1, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.06, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.08, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.7, 1, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.5, 1, 2, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Midterm, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 2.4, 2, 2, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-6', 1.6, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.02, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.1, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.1, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.08, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.02, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.08, 2, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.2, 2, 2, 2, 'C12-0355')") or die(mysql_error());



//Obatay, SemiFinal, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 2.0, 3, 2, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-6', 1.1, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.0, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.2, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.04, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.08, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.4, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.04, 3, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.08, 3, 2, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Final, Second Sem, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-211', 1.7, 4, 2, 2, 'C12-0355')") or die(mysql_error()); 

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-6', 1.08, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-322', 1.0, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-314', 1.2, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('PE-3', 1.02, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Lit-1', 1.4, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21', 1.4, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.06, 4, 2, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-2', 1.08, 4, 2, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Midterm, Summer, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 1.1, 2, 3, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22', 1.5, 2, 3, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.08, 2, 3, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Final, Summer, 2012-2013
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-222', 1.04, 4, 3, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-22', 1.4, 4, 3, 2, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-3', 1.04, 4, 3, 2, 'C12-0355')") or die(mysql_error());



//Obatay, Prelim, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-4', 1.2, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-213', 1.0, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.0, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-202', 2.2, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-203', 2.1, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-204', 2.1, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.06, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-212', 1.02, 1, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-3', 1.02, 1, 1, 3, 'C12-0355')") or die(mysql_error());



//Obatay, Midterm, First Sem, 2013-2014
mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('RS-4', 1.2, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Math-213', 1.0, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('Phys-21L', 1.02, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-202', 2.2, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-203', 2.1, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('IT-204', 2.0, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-105', 1.02, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('ITE-212', 1.06, 2, 1, 3, 'C12-0355')") or die(mysql_error());

mysql_query("INSERT INTO grading_sheets (subject_code, fgrades, term_id, semester_id, school_year_id, student_id) VALUES('SocSc-3', 1.04, 2, 1, 3, 'C12-0355')") or die(mysql_error());











include 'footer.php';
?>