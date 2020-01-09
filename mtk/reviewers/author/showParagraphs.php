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

$revArr=array("A23NIUKMYWIF8Y"=>"61",
        "A1M6R096JU7XRA"=>"38",
        "A143CSYPJV50HW"=>"41",
        "A3PIBGJHHSSYKF"=>"46",
        "A3CHJ1MNTFH6K3"=>" ",
        "A16QZJ5IDIHYUK"=>"50",
        "A2O7LF9FQI73ZY"=>"51",
        "A1X8UBJ3IA1T1"=>"56",
        "A33UFT5HSU412H"=>"59",
        "A3Q4QMSBUWLKCT"=>"61");

$sql = "SELECT * FROM paragraph where idLeaflet = ".$lId." order by LENGTH(idParagraph), idParagraph";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row<th class='commentWindow'>Leaflet</th>
                //<th class='commentWindow small'>Paragraph</th><td class='commentWindow small' style='text-align: center'>"
             // . $row["idLeaflet"]."</td><td class='commentWindow small'>"
              //. $row["idParagraph"]."</td>
	echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Id</th>
                <th class='commentWindow big'>PIL</th>
                <th class='commentWindow big'>PIL Id</th>
                <th class='commentWindow big'>Paragraph Id</th>
                <th class='commentWindow big'>Text</th>
                <th class='commentWindow big'>Classes</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
        if(true){//$revArr[$row['idReviewer']]){
            $pIds= explode(",",$row["idParagraph"]);
            if($cDiv< (int) substr($pIds[0], 1)){
                echo "</tbody><tbody class='pDiv hidden' id='pCom".substr($pIds[0], 1)."'>";
                $cDiv=(int) substr($pIds[0], 1);
            }
    		echo ("<tr class='cRow'><td class='commentWindow small'>"
                  . $row["idParagraph"]."</td><td class='commentWindow'>"
                  . $row["leafletAcronym"]."</td><td class='commentWindow'>"
                  . $row["idLeaflet"]."</td><td class='commentWindow'>"
                  . $row["idInternal"]."</td><td class='commentWindow'>"
                  . $row["text"]."</td><td class='commentWindow'>"
                  . $row["class"]."</td></tr>");
            //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
        }
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 