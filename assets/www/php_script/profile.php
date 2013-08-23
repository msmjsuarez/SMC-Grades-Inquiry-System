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
?>
	
<!DOCTYPE html>
<html>
    <head>	
    	<title>SMC Grades Inquiry System</title>	
    	<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<script src="http://smcgrades.websitebuilderteam.com/www/js/jquery-1.9.1.min.js"></script>
		<script src="http://smcgrades.websitebuilderteam.com/www/js/jquery.ui.map.min.js"></script>
		<script src="http://smcgrades.websitebuilderteam.com/www/js/jquery.mobile-1.3.1.min.js"></script>
		<link rel="stylesheet" href="http://smcgrades.websitebuilderteam.com/www/css/jquery.mobile-1.3.1.min.css" />
		
        <link rel="stylesheet" type="text/css" href="http://smcgrades.websitebuilderteam.com/www/css/mystyle.css" />
        <script src="http://smcgrades.websitebuilderteam.com/www/js/plugin.js"></script>
        <script type="text/javascript" src="http://smcgrades.websitebuilderteam.com/www/cordova.js"></script>
        
        <script>
			    //onDeviceReady is called when PhoneGap is initial
			    function onDeviceReady() {        
				    $(document).ready(function() {     

				    });
			    }
			    document.addEventListener("deviceready", onDeviceReady);
		</script>   
		
		
		<script src="../js/ajax_framework.js" language="javascript"></script>
		
    </head>
    <body>   
    		
    	
<!-- Profile Page -->
    	<div data-role="page" data-theme="e" id="profile">
    		<div data-role="header" data-position="fixed" data-theme="e">
    			<h1>Grades Inquiry</h1>   	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="#" data-icon="home" id="profile" class="ui-btn-active ui-state-persist" data-transition="none">Profile</a></li>
	    				<li><a href="javascript:logout()" data-icon="delete" id="logout" onclick='logout();' data-transition="none">Logout</a></li>
	    			</ul>
	    			</nav>	
    		</div>
    		<div data-role="content" data-theme="e"> 
				<fieldset class="ui-grid-a">
					<div class="ui-block-a">
						<p>ID Number: </p>	 
						<p>Full Name: </p>
					</div>	
					<div class="ui-block-b">
						<p>Course: </p>	 
						<p>Year Level: </p>
					</div>
				</fieldset>	
				
				<div><p></p></div>
				
				<div data-role="controlgroup" align="center" data-type="vertical">
            				<input type="submit" name="sgss" id="sg_sm_sy" value="Search Grades per Semester and School Year" data-role="button" data-icon="check" />
            				<input type="submit" name="sgss" id="sg_sy" value="Search Grades per School Year" data-role="button" data-icon="check" />
            				<input type="submit" name="sgss" id="sg_sb" value="Search Grades per Subject" data-role="button" data-icon="check" />
				</div>   
    		</div>
    		<div data-role="footer" class="ui-bar" data-theme="e" data-position="fixed">
				<p class="copyright">&copy; SMC Grades Inquiry System 2013. All Rights Reserved.</p>	
    		</div>
    	</div>
<!-- End of Profile Page -->
    	
 
    </body>
</html>

