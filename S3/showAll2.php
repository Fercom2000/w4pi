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

$sql ="SELECT mtkCrwRevision.idCrwRevision,mtkCrwRevision.idReviser,
mtkCrwRevision.idLeaflet,mtkCrwRevision.idSentence,mtkCrwRevision.crwRevision,mtkCrwRevision.dateT,mtkCrwRevision.idGroup,mtkCrwRevision.flag,mtkClozeWords.idClozeW,mtkClozeWords.clozeField1,mtkClozeWords.clozeField2,mtkClozeWords.clozeField3,mtkClozeWords.clozeField4,mtkClozeWords.clozeField5,mtkClozeWords.clozeField6,mtkClozeWords.clozeField7,mtkClozeWords.clozeField8,mtkClozeWords.clozeField9,mtkClozeWords.clozeField10,mtkClozeWords.dateT as cDate,mtkClozeWords.idReviser as cReviser,mtkClozeWords.idLeaflet as cLeaflet,mtkClozeWords.idSentence as cSentence,mtkClozeWords.idGroup as cGroup, mtkClozeWords.flag as cFlag from mtkCrwRevision, mtkClozeWords WHERE mtkClozeWords.idReviser=mtkCrwRevision.idReviser AND mtkClozeWords.idSentence=mtkCrwRevision.idSentence";

 /*"SELECT mtkClozeWords.*,mtkCrwRevision.idCrwRevision,mtkCrwRevision.idReviser,mtkCrwRevision.idLeaflet,mtkCrwRevision.idSentence,mtkCrwRevision.crwRevision,mtkCrwRevision.dateT,mtkCrwRevision.idGroup,mtkCrwRevision.flag, FROM mtkCrwRevision LEFT JOIN mtkClozeWords ON mtkCrwRevision.idReviser=mtkClozeWords.idReviser AND mtkCrwRevision.idSentence=mtkClozeWords.idSentence AND mtkClozeWords.flag='123'";*/
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Id</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Revised Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow small'>Id</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>W1</th>
                <th class='commentWindow big'>W2</th>
                <th class='commentWindow big'>W3</th>
                <th class='commentWindow big'>W4</th>
                <th class='commentWindow big'>W5</th>
                <th class='commentWindow big'>W6</th>
                <th class='commentWindow big'>W7</th>
                <th class='commentWindow big'>W8</th>
                <th class='commentWindow big'>W9</th>
                <th class='commentWindow big'>W10</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
		echo ("<tr class='cRow'><td class='commentWindow small'>"
              . $row["idCrwRevision"]."</td><td class='commentWindow'>"
              . $row["idReviser"]."</td><td class='commentWindow'>"
              . $row["idLeaflet"]."</td><td class='commentWindow'>"
              . $row["idSentence"]."</td><td class='commentWindow'>"
              . $row["crwRevision"]."</td><td class='commentWindow'>"
              . $row["dateT"]."</td><td class='commentWindow'>"
              . $row["idGroup"]."</td><td class='commentWindow'>"
              . $row["flag"]."</td><td class='commentWindow'>"
              . $row["idClozeW"]."</td><td class='commentWindow'>"
              . $row["cReviser"]."</td><td class='commentWindow'>"
              . $row["cLeaflet"]."</td><td class='commentWindow'>"
              . $row["cSentence"]."</td><td class='commentWindow'>"
              . $row["clozeField1"]."</td><td class='commentWindow'>"
              . $row["clozeField2"]."</td><td class='commentWindow'>"
              . $row["clozeField3"]."</td><td class='commentWindow'>"
              . $row["clozeField4"]."</td><td class='commentWindow'>"
              . $row["clozeField5"]."</td><td class='commentWindow'>"
              . $row["clozeField6"]."</td><td class='commentWindow'>"
              . $row["clozeField7"]."</td><td class='commentWindow'>"
              . $row["clozeField8"]."</td><td class='commentWindow'>"
              . $row["clozeField9"]."</td><td class='commentWindow'>"
              . $row["clozeField10"]."</td><td class='commentWindow'>"
              . $row["cDate"]."</td><td class='commentWindow'>"
              . $row["cGroup"]."</td><td class='commentWindow'>"
              . $row["cFlag"]."</td></tr>");        
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 