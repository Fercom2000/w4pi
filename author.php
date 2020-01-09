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
				<li class="menuL active"><span class="menuL"><a class="menuL" href="index.html">Home</a></span></li>
				<li class="menuL"><span class="menuL"><a class="menuL" href="clozepil1.html">1st Leaflet</a></span></li>
				<li class="menuL"><span class="menuL"><a class="menuL" href="clozepil2.html">2nd Leaflet</a></span></li>				
				<li class="menuL"><span class="menuL"><a class="menuL" href="clozepil3.html">3rd Leaflet</a></span></li>
				<li class="menuL"><span class="menuL"><a class="menuL" href="clozepil4.html">4th Leaflet</a></span></li>
				<li class="contact"></li>
			</ul>
		</nav>
		<div class="content">
			<div class="pil70" id="pil">
				<h1 class="mainCenterT">What is W4Pi?</h1>

				<h2 class="mainCenterT">A Novel Web Platform for Public Involvement Groups</h2>

				<p>W4Pi is a Computer Assisted Reviewer Platform for Public Involvement that I'm currently developing as part of my PhD. I am a highly committed PhD researcher focused on giving support to clinical trialist who want to develop good sources of information for patients in the UK.  I am collaborating with Prof Jeremy Wyatt from the Wessex Institute and Prof Thanassis Tiropanis from the University of Southampton WAIS group to develop a Web model to classify, rank and follow the effects of comments of Patient and Public Involvement (PPI) groups on the quality (readability and understandability) of your documents. We want to ascertain the capacity of your documents to inform essential aspects of your trial and to give you access to the knowledge base we have acquired from our previous research as an accessible Web application.</p>
			</div>
			<div class="eqip70" id="eqip">
				<div class="formCont commentForm containerStyle" id="formCont">
					<?php
					 	$page=$_GET['e'];
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
								echo "<h2>THANK YOU FOR REGISTERING YOUR ID IS:</h2> <h1><center>sre3".$row["idReviewer"]."</center></h1>";
								echo "<h3>You can now start reviewing our PILs, please store your reviewer id as it will be needed for each PIL</h3>";
							}
						} else {
							echo "Sorry an Error has occurred, please contact the principal researcher at fss1g15@soton.ac.uk with your reviewer id";
						}
						$conn->close();
					?> 
			</div>
			</div>
		</div>
		<div class="commentWin10">
		<footer class="footer">
			<span>Proudly created with the sponsorship of <a href="https://www.conacyt.gob.mx/" target="_blank" data-content="https://www.conacyt.gob.mx/" data-type="external" rel="nofollow">CONACYT&nbsp;</a> and <a href="https://www.southampton.ac.uk/" target="_blank" data-content="https://www.southampton.ac.uk/" data-type="external" rel="nofollow">The University of Southampton&nbsp;</a><span style="display:none;">&nbsp;</span> by Fernando Santos, <a class="emailPI" href="mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact">fss1g15@soton.ac.uk</a>&nbsp;2018.</span>
		</footer>
		</div>
	</body>
</html>