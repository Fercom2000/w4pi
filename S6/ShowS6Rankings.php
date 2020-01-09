<form name=cform action="./ShowS6Rankings.php" method="post">
  Reviewer ID*: <input type="text" name="idReviser">
  Flag: <input type="text" name="flag" id="flag" size="15"></input>
  Group: <input type="text" name="gIds" id="gIds" size="15"></input>
  Leaflet: <input type="text" name="lIds" rows="3" size="10"></input>
  Leaflet: <input type="text" name="RID" rows="3" size="10"></input>
  Sentence: <input type="text" name="sIds" rows="3" size="10"></input>
  Random: <input type="text" name="ran" rows="3" size="10"></input>
  Limit: <input type="text" name="lim" rows="3" size="10"></input>
  Date (yyyy-mm-dd): <input type="text" name="dateT" rows="3" size="10"></input>
  Query: <textarea name="query" cols="75" rows="5"></textarea>
  <input type="submit" value="Continue to the Next Sentnce">
</form>

<?php
$lId=$_GET['p'];
$servername = "srv01779.soton.ac.uk";
$username = "wppi";
$password = "zyfrmmSA0tHzIXmN";
$dbname = "wppi";

$idReviser=htmlspecialchars($_POST['idReviser']);
$idLeaflet=htmlspecialchars($_POST['lIds']);
$idSentence = htmlspecialchars($_POST['sIds']);
//$query=htmlspecialchars($_POST['mysql_unbuffered_query(query)']);
$flag=htmlspecialchars($_POST['flag']);
$idGroup=htmlspecialchars($_POST['gIds']);
$ran=htmlspecialchars($_POST['ran']);
$lim=htmlspecialchars($_POST['lim']);
$dateT=htmlspecialchars($_POST['dateT']);
$RID=htmlspecialchars($_POST['RID']);
$query=htmlspecialchars($_POST['query']);
//echo "QUERY: ".$query."<br>";
//echo "QUERY: ".$_POST['query']."<br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($query==""){
  $j=0;
  $query="SELECT * FROM S6Ranking";
  if($idReviser!="" || $idLeaflet!="" ||$idSentence!="" ||$flag!="" ||$idGroup!="" ||$dateT!=""||$RID!=""){
    $query=$query." WHERE ";
    $j=1;
  }
  if($idReviser!=""){
    $query=$query."idReviser".$idReviser." AND ";
  }
  if($idLeaflet!=""){
    $query=$query."idLeaflet".$idLeaflet." AND ";
  }
  if($idSentence!=""){
    $query=$query."idSentence".$idSentence." AND ";
  }
  if($RID!=""){
    $query=$query."RID".$RID." AND ";
  }
  if($flag!=""){
    $query=$query."flag".$flag." AND ";
  }
  if($idGroup!=""){
    $query=$query."idGroup".$idGroup." AND ";
  }
  if($dateT!=""){
    $query=$query."dateT".$dateT." AND ";
  }
  if($j!=""){
    $query=substr($query, 0, -4);
  }
  /*if($j!=""){
    $query=$query." AND idCrwRevision>'1716';";
  }else{
    $query=$query." WHERE idCrwRevision>'1716';";
  }*/
  if($ran!=""){echo "RAND";
    $query=$query." ORDER BY RAND() ";
  }
  if($lim!=""){
    $query=$query." LIMIT ".$lim;
  }
}
echo $query;
$sql = "SELECT * FROM S6Ranking ORDER BY flag,idReviser,dateT;";//$query;//"SELECT * FROM S6Revision WHERE idSentence=".$SID." ORDER BY RAND() LIMIT 9";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow small'>Id Ranking</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Option 1 Ranking</th>
                <th class='commentWindow big'>Option 2 Ranking</th>
                <th class='commentWindow big'>Option 3 Ranking</th>
                <th class='commentWindow big'>Option 4 Ranking</th>
                <th class='commentWindow big'>Option 5 Ranking</th>
                <th class='commentWindow big'>Option 6 Ranking</th>
                <th class='commentWindow big'>Option 7 Ranking</th>
                <th class='commentWindow big'>Option 8 Ranking</th>
                <th class='commentWindow big'>Option 9 Ranking</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow big'>RID</th>
                <th class='commentWindow big'>Revised Sentence</th>
                <th class='commentWindow big'>Group</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;
    while($row = $result->fetch_assoc()) {
      echo ("<tr class='cRow'>".
              "<td class='commentWindow small'>"
                . $i              
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["idRanking"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["idReviser"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["idLeaflet"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["idSentence"]
              ."</td>"
              ."<td class='commentWindow'>"  
                . $row["revSent1"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent2"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent3"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent4"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent5"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent6"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent7"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent8"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["revSent9"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["dateT"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["flag"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["RID"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["crwRevision"]
              ."</td>"
              ."<td class='commentWindow'>"
                . $row["idGroup"]
              ."</td>"
              ."</tr>");
      $i=$i+1;      
    }
    echo "</tbody>";
  echo "</table>";
} else {
    echo "<h2> There are no revisions for this sentence please continue to the following page</h2>";
}
$conn->close();
?> 