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

$revArr=array("sre35"=>"s.g.gallimore@soton.ac.uk,3,2,3,3",
        "sre37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sr37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sre38"=>"bmt1g13@soton.ac.uk,2,1,1,4",
        "sre39"=>"ken.pattinson@hotmail.com,1,2,6,4",
        "sre310"=>"c.ogbu@cindellogistics.co.uk,2,1,3,3",
        "sre312"=>"carolina012299@gmail.com,1,1,1,3",
        "sre313"=>"fjn1g13@soton.ac.uk,3,2,1,4",
        "sre314"=>"c.j.maidens@soton.ac.uk,2,2,6,4",
        "sre316"=>"valeriadz11@gmail.com,1,2,2,4",
        "sre317"=>"sk1n15@soton.ac.uk,3,2,2,4",
        "sre319"=>"sh7g13@soton.ac.uk,3,1,1,4",
        "sre320"=>"bmt1g13@soton.ac.uk,2,2,1,4");

$sql = "SELECT *  FROM clozeWords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>Jargon Words</h2><br>
        <style>.commentWindow readabilitySug {    
            border: 1px solid black;
            padding:15px;}
        </style>
        <table  class='commentWindow readabilitySug'>
            <tr><th class='commentWindow readabilitySug'> Id </th>
                <th class='commentWindow readabilitySug'>Reviewer</th>
                <th class='commentWindow readabilitySug'>Leaflet</th>
                <th class='commentWindow readabilitySug' colspan='31'>Results</th>
            </tr>
			<tr>
				<th colspan='3'></th>
                <td class='commentWindow readabilitySug'>Original Words</td>
				<td class='commentWindow readabilitySug'>". $row["cAns1"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns2"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns3"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns4"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns5"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns6"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns7"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns8"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns9"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns10"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns11"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns12"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns13"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns14"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns15"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns16"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns17"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns18"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns19"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns20"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns21"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns22"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns23"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns24"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns25"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns26"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns27"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns28"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns29"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns30"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns31"]."</td>
				<td class='commentWindow readabilitySug'>". $row["cAns32"]."</td>
			</tr>
			<tr>
				<th colspan='3'></th>
                <td class='commentWindow readabilitySug'>Percentage of Correct Answers</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>0%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>50%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>100%</td>
				<td class='commentWindow readabilitySug'>Day</td>
				<td class='commentWindow readabilitySug'>Day</td>
			</tr>");
	
    echo "<tbody class='pDiv' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
    	if(intval($row["flag"]<1) and $revArr[$row['idReviewer']]){
		echo ("<tr><td class='commentWindow readabilitySug' style='text-align: center'>"
              . $row["id"]."</td><td class='commentWindow readabilitySug'>"
              . $row["idReviewer"]."</td><td class='commentWindow readabilitySug'>"
              . $row["idLeaflet"]."</td><td class='commentWindow readabilitySug'>Suggested Words</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField1"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField2"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField3"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField4"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField5"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField6"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField7"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField8"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField9"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField10"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField11"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField12"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField13"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField14"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField15"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField16"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField17"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField18"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField19"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField20"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField21"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField22"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField23"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField24"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField25"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField26"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField27"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField28"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField29"]."</td><td class='commentWindow readabilitySug'>"
              . $row["clozeField30"]."</td></tr>");}
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 