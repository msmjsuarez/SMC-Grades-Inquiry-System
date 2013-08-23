<!DOCTYPE html>
<html>
    <head>	
    	<title>SMC Grades Inquiry System</title>	
    	<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery.ui.map.min.js"></script>
		<script src="js/jquery.mobile-1.3.1.min.js"></script>
		<link rel="stylesheet" href="css/jquery.mobile-1.3.1.min.css" />
		
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
        <script src="js/plugin.js"></script>
        <script type="text/javascript" src="../cordova.js"></script>
        
        <script>
			    //onDeviceReady is called when PhoneGap is initial
			    function onDeviceReady() {        
				    $(document).ready(function() {            
				    //Call any jQuery functions here        
				    });
			    }
			    document.addEventListener("deviceready", onDeviceReady);
		</script>    
    </head>
    <body> 
    
    
    <!-- Test Page -->
    	<div data-role="page" data-theme="e" id="test">
    		<div data-role="header" data-position="fixed" data-theme="e">
    			<h1>Grades Inquiry</h1>   	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="../home.html" data-icon="home" id="home" data-transition="none">Home</a></li>
	    				<li><a href="../about.html" data-icon="info" id="about" data-transition="none">About Us</a></li>
	    				<li><a href="../contact.html" data-icon="info" id="contact" data-transition="none">Contact Us</a></li>
	    				<li><a href="../login.html" data-icon="arrow-r" id="login" data-transition="none">Login</a></li>
	    				<li><a href="http://smcgrades.websitebuilderteam.com/www/php_script/test.php" data-icon="arrow-r" class="ui-btn-active ui-state-persist" id="test" data-transition="none">Test</a></li>
	    			</ul>
	    			</nav>	
    		</div>
    		<div data-role="content" data-theme="e">  
    			<?php 
					include 'connect.php';
					
					 $data = mysql_query("SELECT * FROM ajax_example") 
					 or die(mysql_error()); 
					 
					 echo "<table border cellpadding=3>"; 
					 while($info = mysql_fetch_array( $data )) 
					 { 
					 echo "<tr>"; 
					 echo "<th>Name:</th> <td>".$info['ae_name'] . "</td> "; 
					 echo "<th>Age:</th> <td>".$info['ae_age'] . " </td></tr>"; 
					 } 
					 echo "</table>"; 
				?>	    		         
    		</div>
    		<div data-role="footer" class="ui-bar" data-theme="e" data-position="fixed">
				<p class="copyright">&copy; SMC Grades Inquiry System 2013. All Rights Reserved.</p>	
    		</div>
    	</div>
<!-- End of Home Page -->

     </body>
</html>