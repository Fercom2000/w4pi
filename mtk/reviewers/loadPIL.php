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
		echo "	<section class='instructions unselectable fixed'>
					<h2>Instructions: Read the following leaflet, if you find a mistake or something that is unclear please select it, click the 'make a comment' button that will appear and use the bottom section to submit your comment.<br><br></h2>
				</section>";
		while($row = $result->fetch_assoc()) {
			echo "<div class='paragraph ". $row["class"]."' id='p".$row["idInternal"]."'>". $row["text"]."</div>";
		}
	} else {
		echo "Sorry an Error has occurred, we could not find the PIL you asked for";
	}
	$conn->close();
?> 