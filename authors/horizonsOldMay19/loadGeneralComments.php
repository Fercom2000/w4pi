 <?php
 	$lId=$_GET['p'];
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

	$revArr=array("sre35"=>"s.g.gallimore@soton.ac.uk,3,2,3,3",
        "sre37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sr37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sre38"=>"bmt1g13@soton.ac.uk,2,1,1,4",
        "sre39"=>"ken.pattinson@hotmail.com,1,2,6,4",
        "sre310"=>"c.ogbu@cindellogistics.co.uk,2,1,3,3",
        "sre312"=>"carolina012299@gmail.com,1,1,1,3",
        "sre313"=>"fjn1g13@soton.ac.uk,3,2,1,4",
        "sre314"=>"c.j.maidens@soton.ac.uk,2,2,6,4",
        "sre315"=>"haurora_13@hotmail.com,1,1,1,3",
        "sre316"=>"valeriadz11@gmail.com,1,2,2,4",
        "sre317"=>"sk1n15@soton.ac.uk,3,2,2,4",
        "sre319"=>"sh7g13@soton.ac.uk,3,1,1,4",
        "sre320"=>"bmt1g13@soton.ac.uk,2,2,1,4");

	$sql = "SELECT idReviewer, idLeaflet, Q33, Q34 FROM Qs where idLeaflet = ".$lId;
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table class='clozeWordsTable'>
				<tr class='cRow'>
					<th colspan='2'>General Comments</th>
				</tr>";
		$n=0;
		$neu=0;
		$p=0;
		$i=1;
		while($row = $result->fetch_assoc()) {
      		if($revArr[$row['idReviewer']]){
				echo "<tr class='cRow'>
						<td class='pIdA'>C".$i."</td>
						<td class='pMainA'>".$row["Q33"]."</td>
					</tr>";
					$i+=1;
				//echo "<div class='paragraph ". $row["class"]."' id='p".$row["idInternal"]."'>". $row["text"]."</div>";
			}
		}
	} else {
		echo "Sorry an Error has occurred, we could not find the PIL you asked for";
	}
	echo "</table>";
	$conn->close();
?> 