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
<div class="content">
	<div class="mainCenter" id="leafletText" style="width: 80%;margin-left:10%;">
		<div>
			<form name=cform action="./crwRev.php" method="post">
			Reviewer ID*: <input type="text" name="idReviser" required>
			<input type="submit" value="Continue">	(Please use the Amazon Mechanical Turk Id you registered at the start)<br><br>
			<input type="text" name="flag" id="flag" size="15" class="hidden" value="6219"></input>
			<input type="text" name="gIds" id="gIds" size="15" class="hidden" value="6219"></input>
			<input type="text" name="lIds" readonly="readonly" rows="3" size="10" class="hidden" value="2"></input>
			<input type="text" name="sIds" readonly="readonly" rows="3" size="10" class="hidden" value="0"></input>
			<input type="text" name="next" readonly="readonly" rows="3" size="10" class="hidden" value="1"></input>
			</form>
		</div>
		<h3>Now, we will give you a set of options to replace 9 original sentences from an information leaflet for patients who join a clinical trial. Please order the sentences as you would prefer them to be used to replace the original sentence (in color at the left). Consider 1 your first option and 9 your least favorite option. If you believe an option should not be used mark it as -1. Also, the options may contain some incomplete, non-relevant or extrange sentences, please select -1 in this case. Failling to identify this non-relevant sentences may invalidate your task results. There is an Example below:</h3>
		<div class="mainWindowA containerStyle pil" id="leafletText" style="width: 35%;max-width: 35%;font-size: 16px;">
			<p class="yellowT">Original Sentence Fragment (in color)</p><br>

			<?php
				$Id=$_GET['p'];
				$servername = "srv01779.soton.ac.uk";
				$username = "wppi";
				$password = "zyfrmmSA0tHzIXmN";
				$dbname = "wppi";

				if($Id=="1"){
					$SID=222;
					$IdArr="234,281,269,228,119,92,187,252,179";
				}elseif ($Id=="2") {
					$SID=227;
					$IdArr="403,505,799,400,699,540,806,909,508";
				}
				elseif ($Id=="3") {
					$SID=232;
					$IdArr="1776,725,1713,1639,1264,1501,1563,529,837";
				}
				elseif ($Id=="4") {
					$SID=234;
					$IdArr="726,459,996,435,483,618,865,1021,546";
				}
				elseif ($Id=="5") {
					$SID=263;
					$IdArr="141,309,156,268,226,102,254,267,235";
				}
				elseif ($Id=="6") {
					$SID=264;
					$IdArr="91,1105,1326,1736,1191,1606,279,1160,1574";
				}
				elseif ($Id=="7") {
					$SID=283;
					$IdArr="735,926,469,990,707,499,866,376,1012";
				}
				elseif ($Id=="8") {
					$SID=2100;
					$IdArr="1192,1822,1330,1067,1587,1834,1916,1361,711";
				}else{
					$SID=2112;
					$IdArr="835,843,754,755,831,347,878,504,759";
				}
				$next=intval($Id)+1;
			?>	
			
			<?php

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT section,sentence FROM orgSentence WHERE SID=406";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
			  	echo $row["section"];
		  		echo "<input type='text' name='crwRevision' readonly='readonly' rows='3' size='10' class='hidden' value='".$row["sentence"]."'></input>";
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

				$sql = "SELECT * FROM S6Revision WHERE idSentence=406 AND RID IN (1742,1722,1762,1732)";
				$IdArr="-1,1,3,2";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  echo "<table class='a alignTab' style='max-height: 90%;overflow: scroll;'>";
				  $i=0;
				  $j=explode(",", $IdArr);
				  //echo $sql;
				  while($row = $result->fetch_assoc()) {			  	
				  	echo "<input type='text' name='RID' readonly='readonly' rows='3' size='10' class='hidden' value='".$row["RID"]."'></input>";
				    echo "<tr>";  
				    echo "<td><div class='customSelect'>
				      <select class='revSent' name='revSent".$row["RID"]."' required>
				        <option value=''>".$j[$i]."</option>
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
</div>
<div class="footer">
	<span>Created by Fernando Santos, <a class="emailPI" href="mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact">fss1g15@soton.ac.uk</a>&nbsp;2018. Proudly created with the sponsorship of <a href="https://www.conacyt.gob.mx/" target="_blank" data-content="https://www.conacyt.gob.mx/" data-type="external" rel="nofollow">CONACYT&nbsp;</a> and <a href="https://www.southampton.ac.uk/" target="_blank" data-content="https://www.southampton.ac.uk/" data-type="external" rel="nofollow">The University of Southampton&nbsp;</a><span style="display:none;">&nbsp;</span></span>
</div>
</body>
</html>