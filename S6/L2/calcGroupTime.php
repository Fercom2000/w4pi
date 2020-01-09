<form name=cform action="./calcGroupTime.php" method="post">
  Reviewer ID*: <input type="text" name="idReviser">
  Flag: <input type="text" name="flag" id="flag" size="15"></input>
  Group: <input type="text" name="gIds" id="gIds" size="15"></input>
  Leaflet: <input type="text" name="lIds" rows="3" size="10"></input>
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
$query=htmlspecialchars($_POST['mysql_unbuffered_query(query)']);
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
  if($idReviser!="" || $idLeaflet!="" ||$idSentence!="" ||$flag!="" ||$idGroup!="" ||$dateT!=""){
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
    $query=$query."idGroup='".$idGroup."' AND ";
  }
  if($dateT!=""){
    $query=$query."dateT>'".$dateT."' AND ";
  }
  if($j!=""){
    $query=substr($query, 0, -4);
  }
  if($ran==""){//echo "RAND";
    $query=$query." ORDER BY idGroup, idReviser ";
  }
  if($lim!=""){
    $query=$query." LIMIT ".$lim;
  }
  $query=$query.";";
}
echo $query;
$sql = "SELECT * FROM S6Revision ORDER BY idReviser,g";//$query;//"SELECT * FROM S6Revision WHERE idSentence=".$SID." ORDER BY RAND() LIMIT 9";
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
                <th class='commentWindow small'>Id</th>
                <th class='commentWindow big'>RID</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Revised Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Time Taken</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;
    $currentS;
    $pastS;
    $currentR;
    $pastR;
    $currentD;
    $pastD;
    $iS=0;
    //echo "<table class='a alignTab' style='max-height: 90%;overflow: scroll;'><tbody>";
    while($row = $result->fetch_assoc()) {
      /*echo "<tr>";      
      echo ("<td>". $i."</td>");
      echo ("<td>". $row["idRevision"]."</td>");
      echo ("<td>". $row["RID"]."</td>");
      echo ("<td>". $row["g"]."</td>");
      echo ("<td>". $row["flag"]."</td>");
      echo ("<td>". $row["idSentence"]."</td>");
      echo ("<td>". $row["idReviser"]."</td>");
      echo ("<td>". $row["crwRevision"]."</td>");  
      echo ("<td>". $row["dateT"]."</td>"); 
      echo "</tr>";
      $i=$i+1;*/
      $currentS=$row["idSentence"];
      $currentR=$row["idReviser"];
      $currentD=new DateTime($row["dateT"]);
      if($pastR==""){
        $pastS=$row["idSentence"];
        $pastR=$row["idReviser"];
        $pastD=new DateTime($row["dateT"]);
      }
      if($currentR==$pastR){
        if($currentS==$pastS){
          $interval=date_diff($pastD, $currentD);
          echo "<tr class='cRow'>";      
          echo ("<td>". $i."</td>");
          echo ("<td>". $row["idRevision"]."</td>");
          echo ("<td>". $row["RID"]."</td>");
          echo ("<td>". $row["g"]."</td>");
          echo ("<td>". $row["flag"]."</td>");
          echo ("<td>". $row["idSentence"]."</td>");
          echo ("<td>". $row["idReviser"]."</td>");
          echo ("<td>". $row["crwRevision"]."</td>");  
          echo ("<td>". $row["dateT"]."</td>"); 
          echo ("<td>unkown</td>");
          echo "</tr>";
          $i=$i+1;
        }else{
          $interval=date_diff($pastD, $currentD);
          echo "<tr class='cRow'>";      
          echo ("<td>". $i."</td>");
          echo ("<td>". $row["idRevision"]."</td>");
          echo ("<td>". $row["RID"]."</td>");
          echo ("<td>". $row["g"]."</td>");
          echo ("<td>". $row["flag"]."</td>");
          echo ("<td>". $row["idSentence"]."</td>");
          echo ("<td>". $row["idReviser"]."</td>");
          echo ("<td>". $row["crwRevision"]."</td>");  
          echo ("<td>". $row["dateT"]."</td>"); 
          echo ("<td>".$interval->format('%H:%I:%S')."</td>");
          echo "</tr>";      
      }
      }else{
        $pastS=$row["idSentence"];
        $pastR=$row["idReviser"];
        $pastD=new DateTime($row["dateT"]); 
        echo "<tr class='cRow'>";      
        echo ("<td>". $i."</td>");
        echo ("<td>". $row["idRevision"]."</td>");
        echo ("<td>". $row["RID"]."</td>");
        echo ("<td>". $row["g"]."</td>");
        echo ("<td>". $row["flag"]."</td>");
        echo ("<td>". $row["idSentence"]."</td>");
        echo ("<td>". $row["idReviser"]."</td>");
        echo ("<td>". $row["crwRevision"]."</td>");  
        echo ("<td>". $row["dateT"]."</td>"); 
        echo ("<td>unkown</td>");
        echo "</tr>";
        $i=$i+1; 
        //echo "CURRENT: ".$currentR." PAST:".$pastR."<br>";
        //echo $currentR==$pastR."<br>";
      }
      /*
      if($past!=$current){
        if($past=="" && $row["idSentence"]!="Sentence"){
          $past=$row["idSentence"];
          $current=$row["idSentence"];
          $currentD=new DateTime($row["dateT"]);
        }else{
            echo $past." ".$current;//." ".$pastD." ".$currentD;
          if($past!=""){
            echo "<tr class='cRow'>";      
            echo ("<td>". $i."</td>");
            echo ("<td>". $row["idRevision"]."</td>");
            echo ("<td>". $row["RID"]."</td>");
            echo ("<td>". $row["g"]."</td>");
            echo ("<td>". $row["flag"]."</td>");
            echo ("<td>". $row["idSentence"]."</td>");
            echo ("<td>". $row["idReviser"]."</td>");
            echo ("<td>". $row["crwRevision"]."</td>");  
            echo ("<td>". $row["dateT"]."</td>"); 
            $interval=date_diff($pastD, $currentD);
            echo $interval->format('%R%a days');
            //echo ("<td>".$interval->format('%h%I%S');."</td>"); 
            echo "</tr>";
            $i=$i+1;
          }/*
          echo "<tr class='cRow'>";      
          echo ("<td>". $i."</td>");
          echo ("<td>". $row["idRevision"]."</td>");
          echo ("<td>". $row["RID"]."</td>");
          echo ("<td>". $row["g"]."</td>");
          echo ("<td>". $row["flag"]."</td>");
          echo ("<td>". $row["idSentence"]."</td>");
          echo ("<td>". $row["idReviser"]."</td>");
          echo ("<td>". $row["crwRevision"]."</td>");  
          echo ("<td>". $row["dateT"]."</td>"); 
          echo "</tr>";
          $i=$i+1;
          
        }
      }*/
    } 
    echo "</tbody>";
  echo "</table>";
} else {
    echo "<h2> There are no revisions for this sentence please continue to the following page</h2>";
}
$conn->close();
?> 