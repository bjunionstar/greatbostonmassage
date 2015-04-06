<?php
	//User name and password for authentication
	$username = 'dave';
	$password = 'dave123456';
	
	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||($_SERVER['PHP_AUTH_USER'] != $username)||($_SERVER['PHP_AUTH_PW'] != $password)){
		//The user name/password are incorrect so send the authentication headers.
		header ('HTTP/1.1 401 Unauthorized');
		header ('WWW-Authenticate:Basic realm="Great Boston Massage"');
		exit('<h2>Great Boston Massage</h2> Sorry, you must enter a valid user name and password to ' . 'access this page.');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Great Boston Massage!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<meta name="keywords" content="Boston massage,Swedish Massage,Relaxing Massage,Deep Tissue,Sports Massage" />
	<meta name="description" content="Boston massage" />
	<link rel="stylesheet" type="text/css" href="reset-fonts-grids.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Javascript goes in the document HEAD -->
	<script type="text/javascript">
	function altRows(id){
		if(document.getElementsByTagName){  
		
			var table = document.getElementById(id);  
			var rows = table.getElementsByTagName("tr"); 
		 
			for(i = 0; i < rows.length; i++){          
				if(i % 2 == 0){
					rows[i].className = "evenrowcolor";
				}else{
					rows[i].className = "oddrowcolor";
				}      
			}
		}
	}

	window.onload=function(){
		altRows('alternatecolor');
	}
	</script>
</head>
<body class="yui-skin-sam">
	<h2>Great Boston Massage - Reservation Management</h2>
	<p>Below is a list of all Reservation.</p>
	<p>Use this page to arrange the Massage schedule.</p>
	<hr />
	<div id="doc2" class="yui-t2"> 
		<div id="hd" role="banner"><h1>Header</h1></div> 
		<div id="bd" role="main"> 
		<div id="yui-main"> 
		<div class="yui-b"><div class="yui-g"> 
		    Your task List:  
		    </div> 
		</div> 
	</div>
	<div class="yui-b">
	<?php
		//Connect to the database.
		$dbc = mysql_connect("localhost","bosmassagecom","unionstar87700917");
		mysql_select_db('bosmassagecom');
		
		//Select the reservation data from the database.
		$query = "SELECT * FROM reserve ORDER BY reserve_time DESC";
		$data = (mysql_query($query, $dbc));
		if($data){
			echo '<table class="altrowstable" id="alternatecolor">';
			echo '<tr><th>Client Name</th><th>Phone</th><th>address</th><th>Reserve Date</th><th>Reserve Time</th><th>Submit Time</th><th>Parking</th><th>Duration</th><th>Others</th></tr>';
			while($row = mysql_fetch_array($data)){
				//Show the reserve data here.
				echo '<tr><td>' . $row['clientname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['address'] . '</td><td>' . $row['reserve_time'] . '</td><td>' . $row['reserve_hour'] . '</td><td>' . $row['submit_time'] . '</td><td>' . $row['parking'] . '</td><td>' . $row['duration'] . '</td><td>' . $row['others'] . '</td></tr>';
			}
		}else{
			echo "Failed to insert the data.";
		}
		echo '</table>';
		mysql_close($dbc);
	?>
	<br/>
	<br/>
	<br/>
	<hr />
	</div> 
</div>
<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0" bgcolor="#EBE7E6">
  <tr>
    <td width="68">&nbsp;</td>
    <td width="100%" align="center">Copyright:Boston Massage Group Center. ©2015<br /><br />Technical Support: <a href="http://www.bjunionstar.net" target="_blank">Beijing UnionStar Tech. Limited Company</a></td>
    <td width="526">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>	
</div>
</body>
</html>