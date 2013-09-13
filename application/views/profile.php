<!-- Profile Page -->
    	<div data-role="page" data-theme="e" id="profile">
    		<div data-role="header" data-position="fixed" data-theme="e">
    			<h1><img src="<?php echo base_url();?>images/header.png" /></h1>  	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="<?php echo base_url();?>index.php/gradesinquiry/profile" data-icon="home" id="profile" class="ui-btn-active ui-state-persist" data-transition="none">Profile</a></li>
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
                    
                    $_SESSION['year_level'] = $row->year_of_enrollment[0].$row->year_of_enrollment[1].$row->year_of_enrollment[2].$row->year_of_enrollment[3];
                    $_SESSION['year_levelf'] = date("Y") - $_SESSION['year_level'] + 1;
                    
                    $_SESSION['department_name'] = $row->department_name;
                    
                }
                
                ?>
            </div>
            
				 <fieldset class="ui-grid-a">
					<div class="ui-block-a">
						<p><strong>ID Number:</strong> <?php echo $_SESSION['student_id']; ?></p>	 
						<p><strong>Full Name:</strong> <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></p>
					</div>	
					<div class="ui-block-b">
						<p><strong>Course:</strong> <?php echo $_SESSION['department_name']; ?></p>	 
						<p><strong>Year Level:</strong> <?php echo $_SESSION['year_levelf']; ?></p>
					</div>
				</fieldset>
                
				<div><p></p></div>
				
				<div data-role="controlgroup" align="center" data-type="vertical">
					<a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_sm_sy" data-role="button" data-icon="arrow-r">Search Grades per Semester and School Year</a>
                    <a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_sm_sy" data-role="button" data-icon="arrow-r">Search Grades per School Year</a>
                    <a href="<?php echo base_url();?>index.php/gradesinquiry/search_grade_sm_sy" data-role="button" data-icon="arrow-r">Search Grades per Subject</a>
				</div>   
    		</div>


