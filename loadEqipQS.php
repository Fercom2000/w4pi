 <?php
 	$page=$_GET['p'];
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

	$sql = "SELECT question, idEqip  FROM eqip";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<form name=eform action='./submitQuestionnaire.php' method='post'><textarea name='ElIds' id='ElIds' readonly='readonly' rows='3' cols='30' class='hidden' value='".$page."'>".$page."</textarea>";
		while($row = $result->fetch_assoc()) {
			echo "<div class='eqipQS' id='q".$row["idEqip"]."'>".$row["idEqip"].".- " .$row["question"]."<br><input type='radio' value='Yes' class='AlignTab' id='eqip".$row["idEqip"]."' name='eqipQ".$row["idEqip"]."'><label for='eqip".$row["idEqip"]."'>Yes</label>"."<br><input type='radio' value='No' class='AlignTab' id='eqip".$row["idEqip"]."' name='eqipQ".$row["idEqip"]."'><label for='eqip".$row["idEqip"]."'>No</label>"."<br><input type='radio' value='Partly' class='AlignTab' id='eqip".$row["idEqip"]."' name='eqipQ".$row["idEqip"]."'><label for='eqip".$row["idEqip"]."'>Partly</label>"."<br><input type='radio' value='N/A' class='AlignTab' id='eqip".$row["idEqip"]."' name='eqipQ".$row["idEqip"]."'><label for='eqip".$row["idEqip"]."'>Doesn't apply</label>"."</div>";
		}
		echo "<div class='fAssess'>31.- Is this leaflet fit to be used?<br><input type='radio' value='Yes' class='AlignTab' id='eqip31' name='eqipQ31'><label for='eqip31'>Yes</label><br><input type='radio' value='Minor corrections' class='AlignTab' id='eqip31' name='eqipQ31'><label for='eqip31'>Minor corrections are needed before use</label><br><input type='radio' value='No' class='AlignTab' id='eqip31' name='eqipQ31'><label for='eqip31'>No, it must be redone</label></div>";
		echo "<div class='fAssess'>32.- How would you grade the leaflet quality on a scale of 1-10?(1-Extreme lack of quality, 10-Excellent quality)<br><input type='text' class='AlignTab' id='eqip32' name='eqipQ32'></div>";
		echo "<div class='fAssess'>33.- How would you describe this leaflet<br><textarea name='eqipQ33' rows='3' cols='30' class='AlignTab'></textarea></div>";
		echo "<div class='fAssess'>34.- Is there any other concerns you want to mention?<br><textarea name='eqipQ34' rows='3' cols='30' class='AlignTab'></textarea></div>";
		echo "<div class='fAssess'>35.- <b>Reviewer ID*:</b> <input type='text' name='ErIds' id='ErIds' required><input type='submit' value='Upload Questionnaire'></div></form>";

	} else {
		echo "Sorry an Error has occurred, we could not find the PIL you asked for";
	}
	$conn->close();
?> 