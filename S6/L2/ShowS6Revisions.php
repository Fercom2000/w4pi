<form name=cform action="./ShowS6Revisions.php" method="post">
  Reviewer ID*: <input type="text" name="idReviser">
  Flag: <input type="text" name="flag" id="flag" size="15"></input>
  Group: <input type="text" name="gIds" id="gIds" size="15"></input>
  Leaflet: <input type="text" name="lIds" rows="3" size="10"></input>
  Sentence: <input type="text" name="sIds" rows="3" size="10"></input>
  RID: <input type="text" name="RID" rows="3" size="10"></input>
  Random: <input type="text" name="ran" rows="3" size="10"></input>
  Limit: <input type="text" name="lim" rows="3" size="10"></input>
  Date (yyyy-mm-dd): <input type="text" name="dateT" rows="3" size="10"></input>
  Query: <input type="text" name="query" rows="3" size="10"></input>
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
$query=htmlspecialchars($_POST['query']);//'mysql_unbuffered_query(query)']);
$flag=htmlspecialchars($_POST['flag']);
$idGroup=htmlspecialchars($_POST['gIds']);
$ran=htmlspecialchars($_POST['ran']);
$lim=htmlspecialchars($_POST['lim']);
$dateT=htmlspecialchars($_POST['dateT']);
$RID=htmlspecialchars($_POST['RID']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($query==""){
  $j=0;
  $query="SELECT * FROM S6Revision";
  if($idReviser!="" || $idLeaflet!="" ||$idSentence!="" ||$flag!="" ||$idGroup!="" ||$RID!="" ||$dateT!=""){
    $query=$query." WHERE ";
    $j=1;
  }
  if($idReviser!=""){
    $query=$query."idReviser='".$idReviser."' AND ";
  }
  if($idLeaflet!=""){
    $query=$query."idLeaflet='".$idLeaflet."' AND ";
  }
  if($idSentence!=""){
    $query=$query."idSentence='".$idSentence."' AND ";
  }
  if($flag!=""){
    $query=$query."flag='".$flag."' AND ";
  }
  if($idGroup!=""){
    $query=$query."g='".$idGroup."' AND ";
  }
  if($RID!=""){
    $query=$query."RID='".$RID."' AND ";
  }
  if($dateT!=""){
    $query=$query."dateT>'".$dateT."' AND ";
  }
  if($j!=""){
    $query=substr($query, 0, -4);
  }
  if($ran!=""){echo "RAND";
    $query=$query." ORDER BY RAND() ";
  }
  if($lim!=""){
    $query=$query." LIMIT ".$lim;
  }
  $query=$query.";";
}else{

  $query="SELECT * FROM S6Revision Where dateT>'2019-11-1' ORDER BY g,idReviser,dateT;";
}
echo $query;
$sql = $query;//"SELECT * FROM S6Revision WHERE idSentence=".$SID." ORDER BY RAND() LIMIT 9";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table class='a alignTab' style='max-height: 90%;overflow: scroll;'>";
  echo ("<tr>
            <th>Line</t>
            <th>Group</th>
            <th>flag</th>
            <th>Sentence</th>
            <th>Reviser</th>
            <th>Date</th>
            <th>RID</th>
            <th>idRevision</th>
            <th>Revision</th>
          </tr>");
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr>";      
    echo ("<td>". $i."</td>");
    echo ("<td>". $row["g"]."</td>");
    echo ("<td>". $row["flag"]."</td>");
    echo ("<td>". $row["idSentence"]."</td>");
    echo ("<td>". $row["idReviser"]."</td>");
    echo ("<td>". $row["dateT"]."</td>"); 
    echo ("<td>". $row["RID"]."</td>");
    echo ("<td>". $row["idRevision"]."</td>");
    echo ("<td>". $row["crwRevision"]."</td>");  
    echo "</tr>";
    $i=$i+1;
  }
  echo "</table>";
} else {
    echo "<h2> There are no revisions for this sentence please continue to the following page</h2>";
}
$conn->close();
?> 