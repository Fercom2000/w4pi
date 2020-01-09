<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="./css/reviewer.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<title>Web Platform for Public Involvement in Leaflet Design</title>
	</head>
	<body>
		<div class="logo"></div>
		<nav class="Menu">
			<ul class="menuL">
				<li class="menuL "><span class="menuL"><a class="menuL" href="index.html">Home</a></span></li>
				<li class="menuL"><span class="menuL"><a class="menuL" name="revCPIL1.html">1st Leaflet</a></span></li>
				<li class="contact"></li>
			</ul>
		</nav>
		<div class="content">
			<div class="mainC70" id="mainC70">
				<br><h1><center>Thank you for participating in this study</center></h1><br><br>
				<?php
					 	$page=$_GET['reviewerEmail'];
						$servername = "srv01779.soton.ac.uk";
						$username = "wppi";
						$password = "zyfrmmSA0tHzIXmN";
						$dbname = "wppi";
						/*$servername = "localhost";
						$username = "root";
						$password = "Fercom6621";
						$dbname = "w4PI";*/

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT idReviewer  FROM reviewer r where r.rEmail='".$page."'";
						//echo $sql;
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<h2><center>Your Survey Code is: W4PI-MTK-S01-SRE3".$row["idReviewer"]."</center></h2>";
							}
						} else {
							echo "Sorry an Error has occurred, please contact the principal researcher at fss1g15@soton.ac.uk with your reviewer id";
						}
						$conn->close();
					?>
			</div>
			<div class="commentWin10">
				Proudly created with the sponsorship of CONACYT  and The University of Southampton  by Fernando Santos, fss1g15@soton.ac.uk 2018.
			</div>
		</div>
	</body>
</html>