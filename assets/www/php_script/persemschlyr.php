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
    		
    	
<!-- Search Grades per Semester and School Year Page -->
    	<div data-role="page" data-theme="e" id="profile">
    		<div data-role="header" data-position="fixed" data-theme="e">
    			<h1>Grades Inquiry</h1>   	
	    			<nav data-role="navbar">
	    			<ul>
	    				<li><a href="profile.php" data-icon="home" id="profile" data-transition="none">Profile</a></li>
	    				<li><a href="javascript:logout()" data-icon="delete" id="logout" onclick='logout();' data-transition="none">Logout</a></li>
	    			</ul>
	    			</nav>	
    		</div>
    		<div data-role="content" data-theme="e">
    		<h2 align="center">Search Grades per Semester and School Year</h2> 
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
				
				<form method="post" action="">
				<table><tr><td>
					<fieldset data-role="fieldcontain">
					<label for="semester">Select Semester: </label></td>
					<td><select name="" id="" data-native-menu="false">
						<option>Choose one:</option>
						<option value="first">First Semester</option>
						<option value="second">Second Semester</option>
						<option value="summer">Summer</option>
					</select>	
					</fieldset></td></tr>
					<tr><td>
					<fieldset data-role="fieldcontain">
					<label for="semester">Select School Year: </label></td>
					<td><select name="" id="" data-native-menu="false">
						<option>Choose one:</option>
						<option value="2011-2012">2011-2012</option>
						<option value="2012-2013">2012-2013</option>
						<option value="2013-2014">2013-2014</option>
					</select>	
					</fieldset></td></tr>
					</table>		
				</form> 
				
				<p>Results:</p>
					<table>
						<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Savings</th>
						</tr>
						<tr>
						<td>Peter</td>
						<td>Griffin</td>
						<td>$100</td>
						</tr>
						<tr>
						<td>Lois</td>
						<td>Griffin</td>
						<td>$150</td>
						</tr>
						<tr>
						<td>Joe</td>
						<td>Swanson</td>
						<td>$300</td>
						</tr>
						<tr>
						<td>Cleveland</td>
						<td>Brown</td>
						<td>$250</td>
						</tr>
					</table>
				
    		</div>
    		<div data-role="footer" data-theme="e" data-type="horizontal" data-position="fixed">
			<div data-role="navbar">
				<ul>
					<li><a href="#" data-role="button" data-icon="check" data-transition="none">Search Grades per School Year</a></li>
					<li><a href="#" data-role="button"  data-icon="check" data-transition="none">Search Grades per Subject</a></li>
				</ul>	
			</div>	
		</div>
    	</div>
<!-- End of Search Grades per Semester and School Year Page -->
    	
 
    </body>
</html>

