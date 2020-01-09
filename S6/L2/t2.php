<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/author.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<style>
		body{
			font-size:14;
		}
		.mainWindowA {    
			width: 60%;}
		.commentWindowA {    
			width: 40%;}
		table.a td{
		  list-style-type: circle;
		  color: white;
		  padding-bottom: 10px; 
		}

		ul.b {
		  list-style-type: square;
		}

		ol.c {
		  list-style-type: upper-roman;
		}

		ol.d {
		  list-style-type: lower-alpha;
		}
		.revSent{
			font-size: 12px;
		}
		.s{
			font-size: 1.2em;
			font-weight:bold;
			color:#fff;
			margin-left: 1vw;
		}
		b{
			color:#0ff0b7;			
		}
	</style>
</head>
<body>
<div class="logo">
</div>
	<nav class="menu">
		<ul class="menuLi">
				<li class="menuLi "><a href="index.html">Home</a></li>
				<li class="menuLi active"><a href="join.html">Start the task</a></li>
				<li class="contact"><span>Created by Fernando Santos, <a class="emailMenu" href="mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact">fss1g15@soton.ac.uk</a>&nbsp;2018.</li>
			</ul>
	</nav>
<form name=cform action="./crwRev.php" method="post">
<div class="content">
		<h3>Bellow is a phrase that was too hard to understand. On the right there are some options on how to reword it. Please, give the options a value from 1-9 where 1 is your first option to replace the word and 9 your least favorite option. If you believe one of the options should not be used please choose -1.</h3>
		
			Reviewer ID*: <input type="text" name="idReviser" required>
			<input type="submit" value="Continue to the Next Sentnce">	(Please use the Amazon Mechanical Turk Id you registered at the start)
			<input type="text" name="flag" id="flag" size="15" class="hidden" value="123"></input>
			<input type="text" name="gIds" id="gIds" size="15" class="hidden" value="121"></input>
			<input type="text" name="lIds" readonly="readonly" rows="3" size="10" class="hidden" value="2"></input>
			<input type="text" name="sIds" readonly="readonly" rows="3" size="10" class="hidden" value="264"></input>
			<input type="text" name="next" readonly="readonly" rows="3" size="10" class="hidden" value="2"></input>
			<section class="instructions unselectable fixed">			
				<div class="paragraphS hidden" id="s1">
					A growing number of people are living for many years after cancer treatment but we don't yet know all the ways to support them to ensure the best possible recovey.
				</div>
				
				
			</section>
		
	<div class="mainWindowA containerStyle pil" id="leafletText" style="width: 35%;max-width: 35%;font-size: 16px;">
		<p class="yellowT">Original Sentence Fragment (in color)</p><br>	
		
		<?php
		$Id=$_GET['p'];
		$servername = "srv01779.soton.ac.uk";
		$username = "wppi";
		$password = "zyfrmmSA0tHzIXmN";
		$dbname = "wppi";

		if($Id=="1")
			$SID=222;
		elseif ($Id=="2") {
			$SID=227;
		}
		elseif ($Id=="3") {
			$SID=232;
		}
		elseif ($Id=="4") {
			$SID=234;
		}
		elseif ($Id=="5") {
			$SID=263;
		}
		elseif ($Id=="6") {
			$SID=264;
		}
		elseif ($Id=="7") {
			$SID=283;
		}
		elseif ($Id=="8") {
			$SID=2100;
		}else{
			$SID=2112;
		}

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT section FROM orgSentence WHERE SID=".$SID;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		  	echo $row["section"];
		} else {
		    echo "<h2> There are no revisions for this sentence please continue to the following page</h2>";
		}
		$conn->close();
		?> 
		
	</div>
	<div class="commentWindowA containerStyle pil" style="width: 65%;max-width: 65%;font-size: 16px;max-height: 60vh; overflow: scroll;">
		<p class="yellowT">Proposed Revisions</p>	
		 <?php
			$lId=$_GET['p'];
			$servername = "srv01779.soton.ac.uk";
			$username = "wppi";
			$password = "zyfrmmSA0tHzIXmN";
			$dbname = "wppi";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM S6Revision WHERE idSentence=".$SID." ORDER BY RAND() LIMIT 9";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  echo "<table class='a alignTab' style='max-height: 90%;overflow: scroll;'>";
			  $i=1;
			  while($row = $result->fetch_assoc()) {
			    echo "<tr>";  
			    echo "<td><div class='customSelect'>
			      <select class='revSent' id='revSent".$i."' required>
			        <option value=''>Select</option>
			        <option value='1'>1</option>
			        <option value='2'>2</option>
			        <option value='3'>3</option>
			        <option value='4'>4</option>
			        <option value='5'>5</option>
			        <option value='6'>6</option>
			        <option value='7'>7</option>
			        <option value='8'>8</option>
			        <option value='9'>9</option>
			        <option value='-1'>-1</option>
			      </selection>
			    </div></td>";    
			    echo ("<td>". $row["crwRevision"]."</td>");  
			    echo "</tr>";
			    $i=$i+1;
			  }
			  echo "</table>";
			} else {
			    echo "<h2> There are no revisions for this sentence please continue to the following page</h2>";
			}
			$conn->close();
			?> 
</div>	
</div>
</form>
<div class="footer">
	<span>Created by Fernando Santos, <a class="emailPI" href="mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact">fss1g15@soton.ac.uk</a>&nbsp;2018. Proudly created with the sponsorship of <a href="https://www.conacyt.gob.mx/" target="_blank" data-content="https://www.conacyt.gob.mx/" data-type="external" rel="nofollow">CONACYT&nbsp;</a> and <a href="https://www.southampton.ac.uk/" target="_blank" data-content="https://www.southampton.ac.uk/" data-type="external" rel="nofollow">The University of Southampton&nbsp;</a><span style="display:none;">&nbsp;</span></span>
</div>
</body>
</html>