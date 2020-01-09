<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $rEmail=htmlspecialchars($_POST['reviewerEmail']);
  $rInterest=htmlspecialchars($_POST['interest']);
  $rHealth = htmlspecialchars($_POST['health']);
  $rAge = htmlspecialchars($_POST['age']);
  $rEducation = htmlspecialchars($_POST['education']);
  
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO reviewer (rEmail,rInterest,rHealth,rAge,rEducation)VALUES( :rEmail, :rInterest, :rHealth,:rAge,:rEducation)");
	$statement->execute(array("rEmail"=>$rEmail,"rInterest"=>$rInterest,"rHealth" => $rHealth,"rAge" => $rAge,"rEducation" => $rEducation));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

header("Location: reviewer.php?e=".$rEmail);
?>
