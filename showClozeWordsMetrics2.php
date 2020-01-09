 <?php
$servername = "srv01779.soton.ac.uk";
$username = "wppi";
$password = "zyfrmmSA0tHzIXmN";
$dbname = "wppi";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$sql = "SELECT *  FROM clozeWords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pWarr=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    $a=array();
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
            <tbody class='pDiv' id='pCom0'>");	

    while($row = $result->fetch_assoc()) {
    	if(intval($row["flag"]<1)){
    		$nRev+=1;
    		$a[]=$row;
    		for($i=1;$i<=31;$i+=1){
    			
    			if($row["cAns".$i]==$row["clozeField".$i]){
    				$pWarr[$i-1]=$pWarr[$i-1]+1;
    			}
    		}
			
		}
    }
    for($i=0;$i<31;$i+=1){
    	$pWarr[$i]=intval($pWarr[$i]/$nRev*100);
    }    
    echo "	
			<tr>
				<th colspan='3'></th>
                <td class='commentWindow readabilitySug'>Percentage of Correct Answers</td>
				<td class='commentWindow readabilitySug'>".$pWarr[0]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[1]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[2]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[3]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[4]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[5]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[6]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[7]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[8]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[9]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[10]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[11]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[12]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[13]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[14]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[15]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[16]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[17]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[18]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[19]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[20]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[21]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[22]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[23]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[24]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[25]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[26]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[27]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[28]."%</td>
				<td class='commentWindow readabilitySug'>".$pWarr[29]."%</td>
			</tr></tbody>";
	foreach ($a as $key => $row) {
    	echo ("<tr>
				<th colspan='3'></th>
                <td class='commentWindow readabilitySug'>Original Words</td>
				<td class='commentWindow readabilitySug'>".$row["cAns1"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns2"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns3"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns4"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns5"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns6"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns7"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns8"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns9"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns10"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns11"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns12"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns13"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns14"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns15"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns16"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns17"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns18"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns19"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns20"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns21"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns22"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns23"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns24"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns25"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns26"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns27"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns28"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns29"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns30"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns31"]."</td>
				<td class='commentWindow readabilitySug'>".$row["cAns32"]."</td>
			</tr>
				<tr><td class='commentWindow readabilitySug' style='text-align: center'>"
	              .$row["id"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["idReviewer"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["idLeaflet"]."</td><td class='commentWindow readabilitySug'>Suggested Words</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField1"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField2"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField3"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField4"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField5"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField6"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField7"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField8"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField9"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField10"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField11"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField12"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField13"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField14"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField15"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField16"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField17"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField18"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField19"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField20"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField21"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField22"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField23"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField24"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField25"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField26"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField27"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField28"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField29"]."</td><td class='commentWindow readabilitySug'>"
	              .$row["clozeField30"]."</td></tr>");
    }
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
	
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 