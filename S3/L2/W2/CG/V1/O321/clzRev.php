<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $idReviser=htmlspecialchars($_POST['idReviser']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idSentence = htmlspecialchars($_POST['sIds']);
  $cf1=htmlspecialchars($_POST['cf1']);
  $cf2=htmlspecialchars($_POST['cf2']);
  $cf3=htmlspecialchars($_POST['cf3']);
  $cf4=htmlspecialchars($_POST['cf4']);
  $cf5=htmlspecialchars($_POST['cf5']);
  $cf6=htmlspecialchars($_POST['cf6']);
  $cf7=htmlspecialchars($_POST['cf7']);
  $cf8=htmlspecialchars($_POST['cf8']);
  $cf9=htmlspecialchars($_POST['cf9']);
  $cf10=htmlspecialchars($_POST['cf10']);
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
	$statement = $pdo->prepare("INSERT INTO mtkClozeWords (idReviser,idLeaflet,idSentence,clozeField1,clozeField2,clozeField3,clozeField4,clozeField5,clozeField6,clozeField7,clozeField8,clozeField9,clozeField10,flag,idGroup)VALUES( :idReviser, :idLeaflet, :idSentence,:clozeField1,:clozeField2,:clozeField3,:clozeField4,:clozeField5,:clozeField6,:clozeField7,:clozeField8,:clozeField9,:clozeField10,:flag,:idGroup)");
	$statement->execute(array("idReviser"=>$idReviser,"idLeaflet"=>$idLeaflet,"idSentence" => $idSentence,"clozeField1" => $cf1,"clozeField2" => $cf2,"clozeField3" => $cf3,"clozeField4" => $cf4,"clozeField5" => $cf5,"clozeField6" => $cf6,"clozeField7" => $cf7,"clozeField8" => $cf8,"clozeField9" => $cf9,"clozeField10" => $cf10,"flag"=>$flag,"idGroup"=>$idGroup));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
if($next=="4"){
  header("Location: crwdIns.html");
}else{
  header("Location: clzL".$idLeaflet."-".$next.".html");
}
?>
