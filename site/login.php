<?php

	$username= $_POST["username"];
	$password= $_POST["password"];

	$db_server="localhost";
	$db_port="3306";
	$db_name="dt_database";
	$db_user="dt_database";
	$db_pass="dt_database";

	$con=mysqli_connect($db_server,$db_name,$db_pass);

	if(!$con)
	{
		die("Connection failed!" . mysqli_connect_error());
	}

	/*print "Connected successfully";*/

	mysqli_select_db($con, $db_name) or die(mysqli_connect_error());

	/*print "Database connected successfully";*/

	$q= sprintf("SELECT * FROM dt_users WHERE u_username = '%s' AND u_password = MD5('%s')", $username,$password);
	$res= mysqli_query($con,$q) or die(mysqli_error($con));
?>

<html>
	<?php
		if(mysqli_num_rows($res)>0)
		{?>
	<head>
		<meta http-equiv="refresh" content="0; url='try.php'" />
	</head>
	<?php
		}
		else
		{?>
			<head>
				<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
				<title>Doina Timișului - Acasa</title>
				<link rel="Icon" type="image/png" href="img/dt.png" />
			
				<link href="css/bootstrap.min.css" rel="stylesheet" />
				<link rel="stylesheet" href="css/font-awesome.min.css" />
				<link rel="stylesheet" href="css/animate.css" />
				<link href="css/animate.min.css" rel="stylesheet" /> 
				<link href="css/style.css" rel="stylesheet" />
			</head>
			<body class="body-index">
				<h1>Unser not loged in</h1>
			</body>
		<?php } ?>
</html>