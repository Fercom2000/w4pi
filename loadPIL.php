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
		while($row = $result->fetch_assoc()) {
			echo "<div class='paragraph ". $row["class"]."' id='p".$row["idInternal"]."'>". $row["text"]."</div>";
		}
	} else {
		echo "Sorry an Error has occurred, we could not find the PIL you asked for";
	}
	$conn->close();
?> 