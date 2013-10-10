<!-- Search Grades per School Year Page -->
    	<div data-role="page" data-theme="e" id="search_grade_sy">
    		<div data-role="header" data-position="fixed" data-theme="e">
    			<h1><img src="<?php echo base_url();?>images/header.png" /></h1>  	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="<?php echo base_url();?>index.php/gradesinquiry/profile" data-icon="home" id="profile" data-transition="none">Dashboard</a></li>
	    				<li><a href="../home/logout" data-icon="delete" data-transition="none">Logout</a></li>
	    			</ul>
	    			</nav>	
    		</div>
    		<div data-role="content" data-theme="e"> 
                <div data-role="fieldcontain">
                    <?php
                        foreach($query as $row){
                            $_SESSION['first_name'] = $row->first_name;
                            $_SESSION['last_name'] = $row->last_name;
                            $_SESSION['year_of_enrollment'] = $row->year_of_enrollment;
                            $_SESSION['year_level'] = $row->year_of_enrollment[0].$row->year_of_enrollment[1].
                                                      $row->year_of_enrollment[2].$row->year_of_enrollment[3];
                            $_SESSION['year_levelf'] = date("Y") - $_SESSION['year_level'] + 1;
                            $_SESSION['department_name'] = $row->department_name;
                        }
                    ?>
                </div>
            
				 <fieldset class="ui-grid-a">
					<div class="ui-block-a">
						<p><strong>ID Number:</strong> <?php echo $_SESSION['student_id']; ?></p>	 
						<p><strong>Full Name:</strong> <?php echo $_SESSION['first_name'].' 
														'.$_SESSION['last_name']; ?></p>
					</div>	
					<div class="ui-block-b">
						<p><strong>Course:</strong> <?php echo $_SESSION['department_name']; ?></p>	 
						<p><strong>Year Level:</strong> <?php echo $_SESSION['year_levelf']; ?></p>
					</div>
				</fieldset>
                
                <?php
					echo validation_errors('<p class="error">');
					echo form_open('gradesinquiry/search_grade_sy');
				?>
                <div data-role="fieldcontain" style="padding: 10px;">
                    <label for="select-choice-2" class="select">School Year: </label>
                    <select name="school_year_id" style="width:200px;" data-native-menu="false">
                        <option value="">Please select school year</option>
                            <?php
                                $query = $this->db->query('SELECT * FROM enrolled_year 
                                         where student_id = "'.$_SESSION['student_id'].'" ORDER by fschool_year ASC');
                                    if ($query->num_rows() > 0) {			
                                        foreach ($query->result_array() as $row) {
                                            echo "<option value=$row[school_year_id]>". $row['fschool_year']."</option>";
                                        }
                                    }
                            ?>
                    </select>
                </div>
                <div data-role="fieldcontain" style="width:200px; margin:0 auto;">   
                	<input type="submit" value="Search" name="submit" />
                </div>
               </form>
               
               <div data-role="fieldcontain" style="margin:0 auto; width:100%; max-width: 550px;"> 
               <p>&nbsp;</p>
               <?php
			   	echo '<div style="width:100%; max-width: 550px; margin: 0 auto;">';
			   		if(isset($_POST['submit'])) {
						$school_year_id = $this->input->post('school_year_id');
						
						$query = $this->db->query('SELECT * FROM school_year 
									WHERE school_year_id="'.$school_year_id.'" ');
										if ($query->num_rows() > 0) {
											foreach ($query->result_array() as $row) {
												$school_year_id = $row['school_year_id'];
												$fschool_year = $row['fschool_year'];
											}
											
										echo '<p>You search for School Year: '.$fschool_year.'</p>';
										}
						
						
						
						
						
						$query = $this->db->query('SELECT * FROM grading_sheets 
									where school_year_id="'.$school_year_id.'" 
									and student_id = "'.$_SESSION['student_id'].'" ');
										if ($query->num_rows() > 0) {
										}
										else {
											echo '<script>alert("Invalid input, please try again!")</script>';
										}
										
									
										
						//First Sem				
						$query = $this->db->query('SELECT * FROM grading_sheets 
									where school_year_id="'.$school_year_id.'" 
									and student_id = "'.$_SESSION['student_id'].'"
									and semester_id = 1 ');
										if ($query->num_rows() > 0) {
											echo '<p>&nbsp;</p><p><strong>First Semester</strong></p>';
										}	
								
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 1
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 100px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Course No.</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$subject_code. '</p>';
											}
											echo '<strong>GPA</strong>';
											echo '</div>';
										}
						
						
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 1
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 1 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Prelim</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
												
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
										
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 1
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
											border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Midterm</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 1
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 3
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>SemiFinal</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 1
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 4
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Final</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets, subject WHERE
									 semester_id = 1
									 and grading_sheets.subject_code = subject.subject_code
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject.subject_code ASC');
									 
										$totalcredit = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 60px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Credit</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												$credit = $row['credit'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$credit. '</p>';
											
												$totalcredit += $credit;
											}
											echo '<strong>'.$totalcredit.'</strong>';
											echo '</div>';
										}
							echo '<div style="clear: both;"></div>';	
							
							
							
							
							
							
							
							
							
							
							
						//Second Sem			
						$query = $this->db->query('SELECT * FROM grading_sheets 
									where school_year_id="'.$school_year_id.'" 
									and student_id = "'.$_SESSION['student_id'].'"
									and semester_id = 2 ');
										if ($query->num_rows() > 0) {
											echo '<p>&nbsp;</p><p><strong>Second Semester</strong></p>';
										}	
								
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 2
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 100px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Course No.</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$subject_code. '</p>';
											}
											echo '<strong>GPA</strong>';
											echo '</div>';
										}
						
						
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 2
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 1 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Prelim</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
												
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
										
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 2
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
											border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Midterm</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 2
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 3
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>SemiFinal</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 2
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 4
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Final</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets, subject WHERE
									 semester_id = 2
									 and grading_sheets.subject_code = subject.subject_code
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject.subject_code ASC');
									 
										$totalcredit = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 60px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Credit</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												$credit = $row['credit'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$credit. '</p>';
											
												$totalcredit += $credit;
											}
											echo '<strong>'.$totalcredit.'</strong>';
											echo '</div>';
										}
							echo '<div style="clear: both;"></div>';
							
							
							
							
							
							
							
						//Summer			
						$query = $this->db->query('SELECT * FROM grading_sheets 
									where school_year_id="'.$school_year_id.'" 
									and student_id = "'.$_SESSION['student_id'].'"
									and semester_id = 3 ');
										if ($query->num_rows() > 0) {
											echo '<p>&nbsp;</p><p><strong>Summer</strong></p>';
										}	
								
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 3
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 100px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Course No.</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$subject_code. '</p>';
											}
											echo '<strong>GPA</strong>';
											echo '</div>';
										}
						
						
			   			$query2 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 3
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 1 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query2->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Prelim</h4>';
											foreach ($query2->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
												
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
										
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 3
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2 
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
											border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Midterm</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 3
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 3
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>SemiFinal</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
							
						$query3 = $this->db->query('SELECT * FROM grading_sheets WHERE
									 semester_id = 3
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 4
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject_code ASC');
									 
									 	$average = 0;
										$totalaverage = 0;
										$counter = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 85px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Final</h4>';	
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$fgrades. '</p>';
											
												$counter++;
												$average += $fgrades;
											}
											$totalaverage = $average / $counter;
											echo '<strong>'.sprintf("%0.2f", $totalaverage).'</strong>';
											echo '</div>';
										}
						
								
						$query3 = $this->db->query('SELECT * FROM grading_sheets, subject WHERE
									 semester_id = 3
									 and grading_sheets.subject_code = subject.subject_code
									 and school_year_id="'.$school_year_id.'"
									 and term_id = 2
									 and student_id = "'.$_SESSION['student_id'].'" 
									 order by subject.subject_code ASC');
									 
										$totalcredit = 0;
										if ($query3->num_rows() > 0) {
											echo '<div style="width:100%; max-width: 60px; float:left; 
												border: 1px #f4c63f dotted; text-align: center;">';
											echo '<h4>Credit</h4>';
											foreach ($query3->result_array() as $row) {
												$grading_sheets_id = $row['grading_sheets_id'];
												$subject_code = $row['subject_code'];
												$fgrades = $row['fgrades'];
												$term_id = $row['term_id'];
												$semester_id = $row['semester_id'];
												$school_year_id = $row['school_year_id'];
												$student_id = $row['student_id'];
												$credit = $row['credit'];
												
												echo '<p style="border-top: 1px #f4c63f dotted; 
												border-bottom: 1px #f4c63f dotted;">'.$credit. '</p>';
											
												$totalcredit += $credit;
											}
											echo '<strong>'.$totalcredit.'</strong>';
											echo '</div>';
										}
							echo '<div style="clear: both;"></div>';
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
								
								
								
								
								
								
								
								
								
														
					} // end main if
				echo '</div>';		
                ?> 
               </div> <!-- end fieldcontain -->
               
               
               
               
               
               
                
            <div style="clear:both;"><p>&nbsp;</p></div>    
    		</div> <!-- end content -->
            
	<div data-role="footer" data-theme="e" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_sm_sy" data-role="button" data-icon="arrow-r" data-transition="none">Search Grades per Semester and School Year</a></li>
				<li><a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_sy" data-role="button" data-icon="arrow-r" class="ui-btn-active ui-state-persist" data-transition="none">Search Grades per School Year</a></li>
				<li><a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_subj" data-role="button" data-icon="arrow-r" data-transition="none">Search Grades per Subject</a></li>
			</ul>
		</div>