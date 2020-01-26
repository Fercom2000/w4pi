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
	<?php

		$Id=$_GET['p'];
		$servername = "srv01779.soton.ac.uk";
		$username = "wppi";
		$password = "zyfrmmSA0tHzIXmN";
		$dbname = "wppi";

		if($Id=="1"){
	      $SID=406;
	      $IdArr="1080,1440,1672,653,1062,638,1910,1241,1931";
	    }elseif ($Id=="2") {
	      $SID=411;
	      $IdArr="627,359,393,420,384,662,670,357,661";
	    }
	    elseif ($Id=="3") {
	      $SID=416;
	      $IdArr="161,219,192,146,286,278,314,275,143";
	    }
	    elseif ($Id=="4") {
	      $SID=418;
	      $IdArr="1399,1489,1381,1098,1654,1081,602,1818,1355";
	    }
	    elseif ($Id=="5") {
	      $SID=433;
	      $IdArr="663,443,628,355,658,641,421,664,361";
	    }
	    elseif ($Id=="6") {
	      $SID=450;
	      $IdArr="1500,1382,1893,1273,1655,1186,1604,1246,1314";
	    }
	    elseif ($Id=="7") {
	      $SID=455;
	      $IdArr="610,607,604,383,415,418,588,545,406";
	    }
	    elseif ($Id=="8") {
	      $SID=470;
	      $IdArr="287,106,167,185,147,109,318,144,111";
	    }elseif ($Id=="9") {
	      $SID=472;
	      $IdArr="596,379,350,372,411,543,587,552,414";
	    }
		$next=intval($Id)+1;
	?>

<div class="logo">
</div>
	<nav class="menu">
		<ul class="menuLi">
				<li class="menuLi "><a href="index.html">Home</a></li>
				<li class="menuLi active"><a href="join.html">Start the task</a></li>
				<li class="contact"><span>Created by Fernando Santos, <a class="emailMenu" href="mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact">fss1g15@soton.ac.uk</a>&nbsp;2018.</li>
			</ul>
	</nav>
<form name=cform action="./S6L4R.php?p=<?php echo $Id; ?>" method="post">
<div class="content">
		<h3>Bellow is a phrase that is too hard to understand. On the right there are some options on how to reword it. Please, give the options a value from 1-9 where 1 is your first option to replace the sentence and 9 your least favorite option. If you believe one of the options should not be used please choose -1.</h3>
		
			<input type="submit" value="Continue to the Next Sentnce">	(Please use the Amazon Mechanical Turk Id you registered at the start)
			<input type="text" name="flag" id="flag" size="15" class="hidden" value="6419"></input>
			<input type="text" name="gIds" id="gIds" size="15" class="hidden" value="6419"></input>
			<input type="text" name="lIds" readonly="readonly" rows="3" size="10" class="hidden" value="4"></input>
			<input type="text" name="sIds" readonly="readonly" rows="3" size="10" class="hidden" value="<?php echo $SID; ?>"></input>
			<input type="text" name="next" readonly="readonly" rows="3" size="10" class="hidden" value="<?php echo $next; ?>"></input>
			<section class="instructions unselectable fixed">			
				<div class="paragraphS hidden" id="s1">
					A growing number of people are living for many years after cancer treatment but we don't yet know all the ways to support them to ensure the best possible recovey.
				</div>
				
				
			</section>
		
	<div class="mainWindowA containerStyle pil" id="leafletText" style="width: 35%;max-width: 35%;font-size: 16px;">
		<p class="yellowT">Original Sentence Fragment (in color)</p><br>	
		
		<?php

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT section,sentence FROM orgSentence WHERE SID=".$SID;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo "<input type='text' name='crwRevision' readonly='readonly' rows='3' size='10' value='".$SID."'></input>";
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

			$sql = "SELECT * FROM S6Revision WHERE idSentence=".$SID." AND RID IN (".$IdArr.")";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  echo "<table class='a alignTab' style='max-height: 90%;overflow: scroll;'>";
			  $i=0;
			  $j=explode(",", $IdArr);
			  //echo $sql;
			  while($row = $result->fetch_assoc()) {			  	
			  	echo "";
			    echo "<tr>";  
			    echo "<td>
			      <select class='revSent' name='revSent".$row["RID"]."'>
			        <option value=''>".$row["RID"]."</option>
			        <option value='".$i."1'>1</option>
			        <option value='".$i."2'>2</option>
			        <option value='".$i."3'>3</option>
			        <option value='".$i."4'>4</option>
			        <option value='".$i."5'>5</option>
			        <option value='".$i."6'>6</option>
			        <option value='".$i."7'>7</option>
			        <option value='".$i."8'>8</option>
			        <option value='".$i."9'>9</option>
			        <option value='-".$i."1'>-1</option>
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