<!-- Login Page -->
    	<div data-role="page" data-theme="e" id="login">
    		<div data-role="header" data-theme="e" data-fullscreen="false">
    			<h1><img src="<?php echo base_url();?>images/header.png" /></h1>   	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="<?php echo base_url();?>" data-icon="home" data-transition="slide">Home</a></li>
	    				<li><a href="<?php echo base_url();?>index.php/home/about" data-icon="star" id="about" 
                        	data-transition="slide">About Us</a></li>
	    				<li><a href="<?php echo base_url();?>index.php/home/contact" data-icon="info" id="contact" 
                        	data-transition="slide">Contact Us</a></li>
	    				<li><a href="#" data-icon="arrow-r" id="login" class="ui-btn-active ui-state-persist" 
                        	data-transition="slide">Login</a></li>
	    			</ul>
	    			</nav>	   
    		</div>
   		  <div data-role="content" data-theme="e">  
			<div data-role="controlgroup">
                <?php
					echo ("<script language='javascript'>
        					window.alert('Invalid ID Number and/or Password')
       					 </script>");
					
                    echo validation_errors('<p class="error">');
                    echo form_open('home/validate_credentials');	
                    
                    echo form_label('ID Number: ', 'student_id');			   
                           echo '<p>'.form_input(array(
                            'name' => 'student_id',
                            'value' => '',
                            'placeholder' => 'ID Number',
                            'id' => 'student_id'
                           )).'</p>';
                           
                    echo form_label('Password <span class="error">(format: IDNumber-FirstLetterOfFirstName-FirstLetterOfLastName)</error>: ', 'password') ;			   
                           echo '<p>'.form_password(array(
                            'name' => 'password',
                            'value' => '',
                            'placeholder' => 'Password',
                            'id' => 'password'
                          )).'</p>';
						  
						  echo form_submit('login', 'Login');			   				   	
                ?>      
                </div>					
            </div>