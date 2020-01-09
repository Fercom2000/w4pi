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

	$sql = "SELECT class, text, idInternal  FROM paragraph where paragraph.idLeaflet = ".$lId;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table>";
		$n=0;
		$neu=0;
		$p=0;
		while($row = $result->fetch_assoc()) {
			if($row["idInternal"]=="3" or $row["idInternal"]=="7" or $row["idInternal"]=="8" or $row["idInternal"]=="29" or $row["idInternal"]=="35" or $row["idInternal"]=="56" or $row["idInternal"]=="68" or $row["idInternal"]=="106"){
				echo "<tbody class='paragraphA pGreen' id='p".$row["idInternal"]."' value='pCom".$row["idInternal"]."'><tr>
						<td class='pIdA'>P".$row["idInternal"].":</td>
						<td class='pMainA'>".$row["text"]."</td>
						<td class='pDesA hidden'>Neg:".$n."<br>Neu:".$neu."<br>Pos:".$p."</td></tr></tbody>";
				//echo "<div class='paragraph ". $row["class"]."' id='p".$row["idInternal"]."'>". $row["text"]."</div>";
			}else{
				echo "<tbody class='paragraphA' id='p".$row["idInternal"]."' value='pCom".$row["idInternal"]."'><tr>
					<td class='pIdA'>P".$row["idInternal"].":</td>
					<td class='pMainA'>".$row["text"]."</td>
					<td class='pDesA hidden'>Neg:".$n."<br>Neu:".$neu."<br>Pos:".$p."</td></tr></tbody>";
			}
		}
	} else {
		echo "Sorry an Error has occurred, we could not find the PIL you asked for";
	}
	echo "</table>";
	$conn->close();
?> 