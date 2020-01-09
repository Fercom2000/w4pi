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

$sql = "SELECT *  FROM reviewer where idReviewer<28 and idReviewer>4 and idReviewer!=11 and idReviewer!=18";
$result = $conn->query($sql);
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
if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>Reviewer List</h2><br>
        <style>.commentWindow readabilitySug {    
            border: 1px solid black;
            padding:15px;}
        </style>
        <table  class='commentWindow readabilitySug'>
            <tr><th class='commentWindow readabilitySug'> Id </th>
                <th class='commentWindow readabilitySug'>Reviewer</th>
                <th class='commentWindow readabilitySug'>Interest</th>
                <th class='commentWindow readabilitySug'>Health</th>
                <th class='commentWindow readabilitySug'>Age</th>
                <th class='commentWindow readabilitySug'>Education</th>
            </tr>");
	
    echo "<tbody class='pDiv' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
		echo ("<tr><td class='commentWindow readabilitySug' style='text-align: center'>"
              . $row["idReviewer"]."</td><td class='commentWindow readabilitySug'>"
              . $row["rEmail"]."</td><td class='commentWindow readabilitySug'>"
              . $row["rInterest"]."</td><td class='commentWindow readabilitySug'>"
              . $row["rHealth"]."</td><td class='commentWindow readabilitySug'>"
              . $row["rAge"]."</td><td class='commentWindow readabilitySug'>"
              . $row["rEducation"]."</td></tr>");
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 