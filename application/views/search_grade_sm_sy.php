<!-- Search Grades per Semester and School Year Page -->
    	<div data-role="page" data-theme="e" id="search_grade_sm_sy">
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
                
            
           
             
                <div data-role="fieldcontain">
                
                <div style="width:80%; margin:0 auto; max-width:610px;"> 
                
                <form name='search' action="<?php echo $_SERVER['PHP_SELF'];?>?page=1&find&find1" method='post'>
                
                 <!--<label for="select-choice-1" class="select">Search Sch. Year: </label>
                <input type="search" name="search-2"  id="search-2" value="" />-->
                
               
               <p>
			   <label for="select-choice-1" class="select">Y.Semester:</label>
			   <?php
								$query = mysql_query("SELECT * FROM semester ORDER by semester_id ASC");
								echo "<select name='find' id='find' data-native-menu=\"false\">";
								echo "<option value=>Please select semester</option>";
								while ($row=mysql_fetch_array($query)) {
								echo "<option value=$row[semester_id]>". $row['semester_name']."</option>";
								}
								echo "</select>";
								?>
                                
                                </p> 
               
               
               <p>
			   <label for="select-choice-2" class="select">School Year:</label>
			   <?php
								$query = mysql_query("SELECT * FROM enrolled_year where student_id = '".$_SESSION['student_id']."' ORDER by fschool_year ASC");
								echo "<select name='find1' id='find1' data-native-menu=\"false\">";
								echo "<option value=>Please select school year</option>";
								while ($row=mysql_fetch_array($query)) {
								echo "<option value=$row[school_year_id]>". $row['fschool_year']."</option>";
								}
								echo "</select>";
								?>
                                
                                </p> 
                                <p>     
                			<input type="submit" value="Search" />   </p>
               </form> 
            </div>
 
				<div><p></p></div>	
                
                
                
                
                
<?php
if(isset($_POST['submit']) and $_POST['scname'] == 'scname')
{
	echo "<h1>Search Results:</h1><p>";
	$find = $_POST['find'];
	$city = $_POST['city'];
	$cname = $_POST['cname'];
	
	if($city == 'Please type the City')
		{
			$city = '';
		}
	
	if($cname == 'Please type the Contractor\'s Name')
		{
			$cname = '';
		}	
	
	

	if (($find == '') and ($city == '') and ($cname == ''))
		{ 
			echo "<p>Search empty!"; 
			exit; 
		}
		
	$find = strtoupper($find); 
    $find = strip_tags($find); 
    $find = trim ($find); 
	
	$city = strtoupper($city); 
    $city = strip_tags($city); 
    $city = trim ($city);
	
	$cname = strtoupper($cname); 
    $cname = strip_tags($cname); 
    $cname = trim ($cname);
 
 	$tableName = "contractor_job";
	$tableName1 = "contractor";	
	$tableName2 = "trade_type";
	$targetpage = base_url()."index.php/site/c_search_jobs_trade_name"; 	
	$limit = 10; 
	
	
	if(($find != '') and ($city == '') and ($cname == ''))
	{	
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.trade_id = '$find'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.trade_id = '$find' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trde Type: <strong>'.$trade_name1.'</strong></p>';
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
			echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];	
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
				
	} /* end if */
	
	
	
	
	else if(($find != '') and ($city != '') and ($cname == ''))
	{
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.trade_id = '$find' and $tableName.city = '$city'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.trade_id = '$find' and $tableName.city = '$city' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
			echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
				
	} /* end else if */
	
	
	else if(($find != '') and ($city != '') and ($cname != ''))
	{
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		echo '<p>You search for Contractor\'s Name: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname'
		or $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' 
		or $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
			echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
				
	} /* end else if */
	
	
	
	else if(($find == '') and ($city != '') and ($cname == ''))
	{
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.city = '$city'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.city = '$city' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
				
	
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
			echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];	
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
				
	} /* end else if */
	
	
	
	
	//search for contractor - 1
	else if(($find == '') and ($city == '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	
	//search for trade type, contractor - 1
	else if(($find != '') and ($city == '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	
	//search for city, contractor - 1
	else if(($find == '') and ($city != '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	

}





else {
	echo "<h1>Search Results:</h1><p>";
	$find = $_GET['id'];
	$city = $_GET['city'];
	$cname = $_GET['cname'];
	
	if($city == 'Please type the City')
		{
			$city = '';
		}
	
	if($cname == 'Please type the Contractor\'s Name')
		{
			$cname = '';
		}	
	
	

	if (($find == '') and ($city == '') and ($cname == ''))
			{
				exit; 
			} 
			
	$find = strtoupper($find); 
    $find = strip_tags($find); 
    $find = trim ($find); 
	
	$city = strtoupper($city); 
    $city = strip_tags($city); 
    $city = trim ($city);
	
	$cname = strtoupper($cname); 
    $cname = strip_tags($cname); 
    $cname = trim ($cname);
 
 	$tableName = "contractor_job";
	$tableName1 = "contractor";	
	$tableName2 = "trade_type";	
	$targetpage = base_url()."index.php/site/c_search_jobs_trade_name"; 	
	$limit = 10; 
	
	
	
	//trade type - 1
	if(($find != '') and ($city == '') and ($cname == ''))
	{ 	
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.trade_id = '$find'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 

			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.trade_id = '$find' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end if */	
	
	
	//trade type, city - 1
	else if(($find != '') and ($city != '') and ($cname == ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.trade_id = '$find' and $tableName.city = '$city'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.trade_id = '$find' and $tableName.city = '$city' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	//trade type, city, contractor's name - 1
	else if(($find != '') and ($city != '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		echo '<p>You search for Contractor\'s Name: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' 
		or $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' 
		or $tableName.trade_id = '$find' and $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	//search for city - 2
	else if(($find == '') and ($city != '') and ($cname == ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName where $tableName.city = '$city'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName where $tableName.city = '$city' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	
	
	//search for contractor - 2
	else if(($find == '') and ($city == '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	
	//search for trade type, contractor - 2
	else if(($find != '') and ($city == '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.trade_id = '$find' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		$query2 = mysql_query("SELECT * FROM $tableName2 where trade_id = $find");
						while ($row=mysql_fetch_array($query2)) {
							$trade_name1 = $row['trade_name'];
						}
		echo '<p>You search for Trade Type: <strong>'.$trade_name1.'</strong></p>';
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */	
	
	
	
		//search for city, contractor - 2
	else if(($find == '') and ($city != '') and ($cname != ''))
	{ 	
		echo '<p>You search for City/Area: <strong>'.$city.'</strong></p>';
		echo '<p>You search for City/Area: <strong>'.$cname.'</strong></p>';
		
		$query = "SELECT COUNT(*) as num FROM $tableName, $tableName1 where $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname'";
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages['num'];
		
		$stages = 3;
		$page = mysql_real_escape_string($_GET['page']);
		if($page)
			{
				$start = ($page - 1) * $limit; 
			}
		else{
				$start = 0;	
			}	
		
		$query1 = "SELECT * FROM $tableName, $tableName1 where $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.fn = '$cname' or $tableName.city = '$city' and $tableName1.email = $tableName.email and $tableName1.ln = '$cname' LIMIT $start, $limit";
		$result = mysql_query($query1);
		
		if ($page == 0){$page = 1;}
		$prev = $page - 1;	
		$next = $page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		$paginate = '';
		if($lastpage > 1)
		{	
			$paginate .= "<div class='paginate'>";
			// Previous
			if ($page > 1)
			{
				$paginate.= "<a href='$targetpage?page=$prev&id=$find&city=$city&cname=$cname'>previous</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>previous</span>";	
			}
						
			// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$paginate.= "<span class='current'>$counter</span>";
					}
					else
					{
						$paginate.= "<a href='$targetpage?page=$counter&id=$find&city=$city&cname=$cname'>$counter</a>";
					}					
				}
			}
			elseif($lastpage > 5 + ($stages * 2))
			{
				// Beginning only hide later pages
				if($page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
					$paginate.= "...";
					$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
					$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage?page=1'>1</a>";
					$paginate.= "<a href='$targetpage?page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$paginate.= "<span class='current'>$counter</span>";
						}
						else
						{
							$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";
						}					
					}
				}
			}
						
			// Next
			if ($page < $counter - 1)
			{ 
				$paginate.= "<a href='$targetpage?page=$next&id=$find&city=$city&cname=$cname'>next</a>";
			}
			else
			{
				$paginate.= "<span class='disabled'>next</span>";	
			}
				
			$paginate.= "</div>";			
		}
		
		echo '<p>There are <strong>'.$total_pages.'</strong> job/s listed.</p>';
		echo $paginate;
	
		   echo '<table class="table2"><tr>
				   <th class="table2th">Trade Type</th>
				   <th class="table2th">Date Available</th>
				   <th class="table2th">No. of Sub-Contractor\'s Needed</th>
				   <th class="table2th">Pay Rates</th>
				   <th class="table2th">Area/City</th>
				   <th class="table2th">View Details</th>
				   </tr>';
		
				while($row = mysql_fetch_array($result))
				{
					$contractor_job_id = $row['contractor_job_id'];		
					$date_avail_from = $row['date_avail_from'];
					$no_of_subc = $row['no_of_subc'];
					$pay_rates = $row['pay_rates'];
					$trade_id = $row['trade_id'];
					$city = $row['city'];
					
					$query1 = mysql_query("SELECT * FROM $tableName2 where trade_id = $trade_id");
						while ($row=mysql_fetch_array($query1)) {
							echo '<tr><td class="table2"><p>'.$row['trade_name'].'</p></td>';
						}
						
					echo '<td class="table2"><p>'.$date_avail_from.'</p></td>';	
					echo '<td class="table2"><p>'.$no_of_subc.'</p></td>';	
					echo '<td class="table2"><p>'.$pay_rates.'</p></td>';	
					echo '<td class="table2"><p>'.$city.'</p></td>';
					echo '<td class="table2"><a href="c_exp_cert_view_search?id='.$contractor_job_id.'"><span id="view"></span></a></td></tr>';
				}  
			echo '</table>';
		
	} /* end else if */
	
	
	
			
}
?>                   
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
    		</div> <!-- end content -->


