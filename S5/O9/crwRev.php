<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $idReviser=htmlspecialchars($_POST['idReviser']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idSentence = htmlspecialchars($_POST['sIds']);
  $crwRevision=htmlspecialchars($_POST['crwRevision']);
  $flag=htmlspecialchars($_POST['flag']);
  $idGroup=htmlspecialchars($_POST['gIds']);
  $next=htmlspecialchars($_POST['next']);

  $i=intval($idSentence);
  $j=$i+1;
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO mtkCrwRevision (idReviser,idLeaflet,idSentence,crwRevision,flag,idGroup)VALUES( :idReviser, :idLeaflet, :idSentence,:crwRevision,:flag,:idGroup)");
	$statement->execute(array("idReviser"=>$idReviser,"idLeaflet"=>$idLeaflet,"idSentence" => $idSentence,"crwRevision" => $crwRevision,"flag"=>$flag,"idGroup"=>$idGroup));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
if($next=="10"){
  header("Location: kwdQs.html");
}else{
  header("Location: crwd"."-".$next.".html");
}
?>
