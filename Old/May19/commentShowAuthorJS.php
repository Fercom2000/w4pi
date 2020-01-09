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

$sql = "SELECT id, idReviewer, idLeaflet, idParagraph, assocText, nltkLab, comment FROM comment where idLeaflet='ES01' order by nltkLab";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px;}
        </style>
        <table  class='commentWindow'>
            <tr><th class='commentWindow'> Id </th>
                <th class='commentWindow'>Paragraph</th>
                <th class='commentWindow'>Reviewer</th>
                <th class='commentWindow'>Original text</th>
                <th class='commentWindow'>Comment</th>
                <th class='commentWindow'>Comment Sentiment</th>
            </tr>");
    echo "<tbody class='pDiv' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
        $pIds= explode(",",$row["idParagraph"]);
        if($cDiv< (int) $pIds[0]){
            echo "</tbody><tbody class='pDiv' id='pCom".$pIds[0]."'>";
            $cDiv=(int) $pIds[0];
        }
		echo ("<tr><td class='commentWindow' style='text-align: center'>"
              . $row["id"]."</td><td class='commentWindow'>"
              . $row["idParagraph"]."</td><td class='commentWindow'>"
              . $row["idReviewer"]."</td><td class='commentWindow'>"
              . $row["assocText"]."</td><td class='commentWindow'>"
              . $row["comment"]."</td><td class='commentWindow'>"
              . $row["nltkLab"]."</td></tr>");
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 