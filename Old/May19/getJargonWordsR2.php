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

$sql = "SELECT *  FROM clozeReviewer";
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
				<td class='commentWindow readabilitySug'>Day</td>
				<td class='commentWindow readabilitySug'>at</td>
				<td class='commentWindow readabilitySug'>trial</td>
				<td class='commentWindow readabilitySug'>the</td>
				<td class='commentWindow readabilitySug'>being</td>
				<td class='commentWindow readabilitySug'>in</td>
				<td class='commentWindow readabilitySug'>you</td>
				<td class='commentWindow readabilitySug'>for</td>
				<td class='commentWindow readabilitySug'>the</td>
				<td class='commentWindow readabilitySug'>and</td>
				<td class='commentWindow readabilitySug'>Please</td>
				<td class='commentWindow readabilitySug'>read</td>
				<td class='commentWindow readabilitySug'>discuss</td>
				<td class='commentWindow readabilitySug'>and</td>
				<td class='commentWindow readabilitySug'>wish</td>
				<td class='commentWindow readabilitySug'>is</td>
				<td class='commentWindow readabilitySug'>clear</td>
				<td class='commentWindow readabilitySug'>like</td>
				<td class='commentWindow readabilitySug'>to</td>
				<td class='commentWindow readabilitySug'>to</td>
				<td class='commentWindow readabilitySug'>Ethics</td>
				<td class='commentWindow readabilitySug'>a</td>
				<td class='commentWindow readabilitySug'>and</td>
				<td class='commentWindow readabilitySug'>more</td>
				<td class='commentWindow readabilitySug'>and</td>
				<td class='commentWindow readabilitySug'>you</td>
				<td class='commentWindow readabilitySug'>A</td>
				<td class='commentWindow readabilitySug'>from</td>
				<td class='commentWindow readabilitySug'>Day</td>
				<td class='commentWindow readabilitySug'>Day</td>
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
              . $row["clozeField0"]."</td><td class='commentWindow readabilitySug'>"
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
              . $row["clozeField30"]."</td></tr>");
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 