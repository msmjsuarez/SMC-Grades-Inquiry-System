<!-- Home Page -->
    	<div data-role="page" data-theme="e" id="home">
    		<div data-role="header" data-theme="e" data-fullscreen="false" data-position="fixed">  
    		</div>
   		  <div data-role="content">  
          	<img src="<?php echo base_url();?>images/logo.png" />
          
              <div data-role="controlgroup" data-theme="e">
                <a href="#" data-icon="home" data-transition="slide" data-role="button" data-theme="e">Home</a>
                <a href="<?php echo base_url();?>index.php/home/about" data-icon="star" data-transition="slide" 
                    data-role="button" data-theme="e">About Us</a>
                <a href="<?php echo base_url();?>index.php/home/contact" data-icon="arrow-r" data-transition="slide" 
                    data-role="button" data-theme="e">Contact Us</a> 
                <a href="<?php echo base_url();?>index.php/home/login" data-icon="arrow-r" data-transition="slide" 
                    data-role="button" data-theme="e">Login</a>      
              </div>
							
		</div>