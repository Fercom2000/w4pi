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

$sql = "SELECT * FROM mtkClozeWords";
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
              . $row["idClozeW"]."</td><td class='commentWindow'>"
              . $row["idReviser"]."</td><td class='commentWindow'>"
              . $row["idLeaflet"]."</td><td class='commentWindow'>"
              . $row["idSentence"]."</td><td class='commentWindow'>"
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
              . $row["dateT"]."</td><td class='commentWindow'>"
              . $row["idGroup"]."</td><td class='commentWindow'>"
              . $row["flag"]."</td></tr>");        
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 