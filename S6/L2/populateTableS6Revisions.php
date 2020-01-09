<?php
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
  $row = 1;
  if (($handle = fopen("1252RevisionsExtraSet1.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          echo "<p> $num fields in line $row: <br /></p>\n";
          $row++;
          /*for ($c=0; $c < $num; $c++) {
              echo $data[$c] . "<br />\n";
          }*/
          $RID=$data[0];
          $idRevisor=$data[1];
          $idLeaflet=$data[2];
          $idSentence=$data[3];
          $crwRevision=$data[4];
          $dateT=$data[5];
          $g=$data[6];
          $flag=$data[7];

          echo $data[0]." ".$data[1]." ".$data[2]." ".$data[3]." ".$data[4]." ".$data[5]." ".$data[6]." ".$data[7];

          $pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
          $statement = $pdo->prepare("INSERT INTO S6Revision (RID,idReviser,idLeaflet,idSentence,crwRevision,dateT,g,flag)VALUES( :RID,:idRevisor,:idLeaflet,:idSentence,:crwRevision,:dateT,:g,:flag)");
          $statement->execute(array("RID"=>$RID,"idRevisor"=>$idRevisor,"idLeaflet" => $idLeaflet,"idSentence" => $idSentence,"crwRevision"=>$crwRevision,"dateT"=>$dateT,"g"=>$g,"flag"=>$flag));
      }
      fclose($handle);
  }
}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>
