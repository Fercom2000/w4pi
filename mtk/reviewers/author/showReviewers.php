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

$sql = "SELECT *  FROM reviewer";
$result = $conn->query($sql);

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