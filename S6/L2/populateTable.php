<?php
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
  $row = 1;
  if (($handle = fopen("27SelectedHardSentences.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          echo "<p> $num fields in line $row: <br /></p>\n";
          $row++;
          for ($c=0; $c < $num; $c++) {
              echo $data[$c] . "<br />\n";
          }
          $SID=$data[0];
          $Sentence=$data[1];
          $Section=$data[2];
          $SMean=$data[3];
          $SStDev=$data[4];
          $SCoeVar=$data[5];

          $pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
          $statement = $pdo->prepare("INSERT INTO orgSentence (SID,Sentence,Section,SMean,SStDev,SCoeVar)VALUES( :SID,:Sentence,:Section,:SMean,:SStDev,:SCoeVar)");
          $statement->execute(array("SID"=>$SID,"Sentence"=>$Sentence,"Section" => $Section,"SMean" => $SMean,"SStDev"=>$SStDev,"SCoeVar"=>$SCoeVar));
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
