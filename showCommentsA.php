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

$sql = "SELECT idComment, idReviewer, idLeaflet, assocText, comment, idParagraph FROM rComment where idLeaflet = ".$lId." order by LENGTH(idParagraph), idParagraph";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr><th class='commentWindow'> Id Leaflet</th>
                <th class='commentWindow'>idParagraph</th>
                <th class='commentWindow'>idReviewer</th>
                <th class='commentWindow'>Original text</th>
                <th class='commentWindow'>Comment</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
        $pIds= explode(",",$row["idParagraph"]);
        if($cDiv< (int) substr($pIds[0], 1)){
            echo "</tbody><tbody class='pDiv hidden' id='pCom".substr($pIds[0], 1)."'>";
            $cDiv=(int) substr($pIds[0], 1);
        }
		echo ("<tr><td class='commentWindow' style='text-align: center'>"
              . $row["idLeaflet"]."</td><td class='commentWindow'>"
              . $row["idParagraph"]."</td><td class='commentWindow'>"
              . $row["idReviewer"]."</td><td class='commentWindow'>"
              . $row["assocText"]."</td><td class='commentWindow'>"
              . $row["comment"]."</td></tr>");
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 