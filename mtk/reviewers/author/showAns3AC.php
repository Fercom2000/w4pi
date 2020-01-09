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

$sql = "SELECT *  FROM Qs where Qs.idLeaflet = ".$lId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>EQIP Answers 3AC</h2><br>
        <style>
          .commentWindow{    
            border: 1px solid black;
            padding:15px;
          }
          .wide{width:15vw;min-width:15vw;}
        </style>
        <table  class='commentWindow readabilitySug'>
            <tr><th class='commentWindow readabilitySug'> Id </th>
                <th class='commentWindow readabilitySug'>PIL</th>
                <th class='commentWindow readabilitySug'>Reviewer</th>
                <th class='commentWindow readabilitySug wide'>Description</th>
                <th class='commentWindow readabilitySug wide'>Concerns</th>
                <th class='commentWindow readabilitySug'>Grade</th>
                <th class='commentWindow readabilitySug'>Is fit for purpose?</th>
                <th class='commentWindow readabilitySug'>Q1</th>
                <th class='commentWindow readabilitySug'>Q2</th>
                <th class='commentWindow readabilitySug'>Q3</th>
                <th class='commentWindow readabilitySug'>Q4</th>
                <th class='commentWindow readabilitySug'>Q5</th>
                <th class='commentWindow readabilitySug'>Q6</th>
                <th class='commentWindow readabilitySug'>Q7</th>
                <th class='commentWindow readabilitySug'>Q8</th>
                <th class='commentWindow readabilitySug'>Q9</th>
                <th class='commentWindow readabilitySug'>Q10</th>
                <th class='commentWindow readabilitySug'>Q11</th>
                <th class='commentWindow readabilitySug'>Q12</th>
                <th class='commentWindow readabilitySug'>Q13</th>
                <th class='commentWindow readabilitySug'>Q14</th>
                <th class='commentWindow readabilitySug'>Q15</th>
                <th class='commentWindow readabilitySug'>Q16</th>
                <th class='commentWindow readabilitySug'>Q17</th>
                <th class='commentWindow readabilitySug'>Q18</th>
                <th class='commentWindow readabilitySug'>Q19</th>
                <th class='commentWindow readabilitySug'>Q20</th>
                <th class='commentWindow readabilitySug'>Q21</th>
                <th class='commentWindow readabilitySug'>Q22</th>
                <th class='commentWindow readabilitySug'>Q23</th>
                <th class='commentWindow readabilitySug'>Q24</th>
                <th class='commentWindow readabilitySug'>Q25</th>
                <th class='commentWindow readabilitySug'>Q26</th>
                <th class='commentWindow readabilitySug'>Q27</th>
                <th class='commentWindow readabilitySug'>Q28</th>
                <th class='commentWindow readabilitySug'>Q29</th>
                <th class='commentWindow readabilitySug'>Q30</th>
                <th class='commentWindow readabilitySug'>Q31</th>
            </tr>");
	
    echo "<tbody class='pDiv' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
      if($revArr[$row['idReviewer']]){
		    echo ("<tr><td class='commentWindow readabilitySug' style='text-align: center'>"
              . $row["id"]."</td><td class='commentWindow readabilitySug'>"
              . $row["idLeaflet"]."</td><td class='commentWindow readabilitySug'>"
              . $row["idReviewer"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q33"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q34"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q32"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q31"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q1"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q2"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q3"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q4"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q5"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q6"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q7"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q8"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q9"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q10"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q11"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q12"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q13"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q14"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q15"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q16"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q17"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q18"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q19"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q20"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q21"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q22"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q23"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q24"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q25"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q26"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q27"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q28"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q29"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q30"]."</td><td class='commentWindow readabilitySug'>"
              . $row["Q31"]."</td></tr>");
        //echo "id: " . $row["id"]. " - Commented Text: " . $row["assocText"]. " Comment: " . $row["comment"]. "<br>";
      }
    }
    echo "</tbody>";
	//echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> We could not find any answers for this leaflet please contact the principal investigator at fss1g15@soton.ac.uk</h3><br>";
}
$conn->close();
?> 