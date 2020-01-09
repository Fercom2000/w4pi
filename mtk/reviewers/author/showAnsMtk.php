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

$sql = "SELECT *  FROM Qs where Qs.idLeaflet = ".$lId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cDiv=1;
    // output data of each row
	echo ("<br><h2>EQIP Answers MTK</h2><br><html><head>
        <style>
          .commentWindow{    
            border: 1px solid black;
            padding:15px;
          }
          .wide{width:15vw;min-width:15vw;}
        </style></head><body>
        <table  class='commentWindow readabilitySug'>
            <tr><th class='commentWindow readabilitySug'> Id </th>
                <th class='commentWindow readabilitySug'>PIL</th>
                <th class='commentWindow readabilitySug'>Reviewer</th>
                <th class='commentWindow readabilitySug wide' colspan='3'>Description</th>
                <th class='commentWindow readabilitySug' colspan='3'>Concerns</th>
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
              . $row["idReviewer"]."</td><td class='commentWindow readabilitySug' colspan='3'>"
              . $row["Q33"]."</td><td class='commentWindow readabilitySug' colspan='3'>"
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