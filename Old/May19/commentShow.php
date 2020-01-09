 <?php
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

$sql = "SELECT id, assocText, comment FROM comment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<br><h2>My Comments for this Leaflet</h2><br><style>.commentWindow {    border: 1px solid black;padding:15px}</style><table  class='commentWindow'><tr><th class='commentWindow'> Id </th><th class='commentWindow'>You commented this text</th><th class='commentWindow'>Your comment was</th></tr>";
    while($row = $result->fetch_assoc()) {
		echo "<tr><td class='commentWindow' style='text-align: center'>". $row["id"]."</td><td class='commentWindow'>". $row["assocText"]."</td><td class='commentWindow'>". $row["comment"]."</td></tr>";
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
	echo "<h3>If you wish to add another comment please select a section of text and click the 'Comment' button</h3><br>";
} else {
    echo "<h2>You haven't added any comments for this leaflet yet</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 