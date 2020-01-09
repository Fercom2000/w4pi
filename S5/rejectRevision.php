<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  
  $servername = "srv01779.soton.ac.uk";
  $username = "wppi";
  $password = "zyfrmmSA0tHzIXmN";
  $dbname = "wppi";

  $revisions=htmlspecialchars($_POST['revisions']);
    echo $revisions." ";
  $rejected=htmlspecialchars($_POST[$revisions]);
    echo "Rejected: ".$rejected."<br>";

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE mtkCrwRevision SET rejected=".$rejected." WHERE idCrwRevision=".$revisions;
//$sql= "UPDATE mtkCrwRevision SET rejected=2 WHERE idReviser='A4A7P029P1F99' AND idCrwRevision BETWEEN 1763 AND 1772";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
    echo $sql;
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();/*
  
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO mtkReviser (rEmail,rInterest,rHealth,rAge,rEducation,flag,idGroup)VALUES( :rEmail, :rInterest, :rHealth,:rAge,:rEducation,:flag,:idGroup)");
	$statement->execute(array("rEmail"=>$rEmail,"rInterest"=>$rInterest,"rHealth" => $rHealth,"rAge" => $rAge,"rEducation" => $rEducation,"flag"=>$flag,"idGroup"=>$idGroup));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}*/

header("Location: showS5Revisions.php");
?>
