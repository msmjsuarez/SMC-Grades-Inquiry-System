<!-- Login Page -->
    	<div data-role="page" data-theme="e" id="login">
    		<div data-role="header" data-theme="e" data-fullscreen="false">
    			<h1><img src="<?php echo base_url();?>images/header.png" /></h1>   	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="<?php echo base_url();?>" data-icon="home" id="home" data-transition="slide">Home</a></li>
	    				<li><a href="<?php echo base_url();?>index.php/home/about" data-icon="info" id="about" 
                        	data-transition="slide">About Us</a></li>
	    				<li><a href="<?php echo base_url();?>index.php/home/contact" data-icon="info" id="contact" 
                        	data-transition="slide">Contact Us</a></li>
	    				<li><a href="#" data-icon="arrow-r" id="login" class="ui-btn-active ui-state-persist" 
                        	data-transition="slide">Login</a></li>
	    			</ul>
	    			</nav>	   
    		</div>
   		  <div data-role="content" data-theme="e">  
			<fieldset>
                <?php
					//$_SESSION['judge_un'] = $this->input->post('judge_un');
					
                    echo validation_errors('<p class="error">');
                    echo form_open('home/validate_credentials');	
                    
                    echo form_label('ID Number: ', 'judge_un');			   
                           echo '<p>'.form_input(array(
                            'name' => 'judge_un',
                            'value' => '',
                            'placeholder' => 'ID Number',
                            'class' => 'text',
                            'id' => 'judge_un'
                           )).'</p>';
                           
                    echo form_label('Password (format: IDNumber-FirstLetterOfFirstName-FirstLetterOfLastName): ', 'password') ;			   
                           echo '<p>'.form_password(array(
                            'name' => 'password',
                            'value' => '',
                            'placeholder' => 'Password ',
                            'class' => 'text',
                            'id' => 'password'
                          )).'</p>';
						  
						  echo form_submit('mysubmit', 'Login');			   				   	
                ?>
                    </form>       
                </fieldset>					
            </div>