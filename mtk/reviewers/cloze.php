<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idReviewer=htmlspecialchars($_POST['reviewerId']);
  $clozeField1 = htmlspecialchars($_POST['cf1']);
  $clozeField2 = htmlspecialchars($_POST['cf2']);
  $clozeField3 = htmlspecialchars($_POST['cf3']);
  $clozeField4 = htmlspecialchars($_POST['cf4']);
  $clozeField5 = htmlspecialchars($_POST['cf5']);
  $clozeField6 = htmlspecialchars($_POST['cf6']);
  $clozeField7 = htmlspecialchars($_POST['cf7']);
  $clozeField8 = htmlspecialchars($_POST['cf8']);
  $clozeField9 = htmlspecialchars($_POST['cf9']);
  $clozeField10 = htmlspecialchars($_POST['cf10']);
  $clozeField11 = htmlspecialchars($_POST['cf11']);
  $clozeField12 = htmlspecialchars($_POST['cf12']);
  $clozeField13 = htmlspecialchars($_POST['cf13']);
  $clozeField14 = htmlspecialchars($_POST['cf14']);
  $clozeField15 = htmlspecialchars($_POST['cf15']);
  $clozeField16 = htmlspecialchars($_POST['cf16']);
  $clozeField17 = htmlspecialchars($_POST['cf17']);
  $clozeField18 = htmlspecialchars($_POST['cf18']);
  $clozeField19 = htmlspecialchars($_POST['cf19']);
  $clozeField20 = htmlspecialchars($_POST['cf20']);
  $clozeField21 = htmlspecialchars($_POST['cf21']);
  $clozeField22 = htmlspecialchars($_POST['cf22']);
  $clozeField23 = htmlspecialchars($_POST['cf23']);
  $clozeField24 = htmlspecialchars($_POST['cf24']);
  $clozeField25 = htmlspecialchars($_POST['cf25']);
  $clozeField26 = htmlspecialchars($_POST['cf26']);
  $clozeField27 = htmlspecialchars($_POST['cf27']);
  $clozeField28 = htmlspecialchars($_POST['cf28']);
  $clozeField29 = htmlspecialchars($_POST['cf29']);
  $clozeField30 = htmlspecialchars($_POST['cf30']);
  $clozeField31 = htmlspecialchars($_POST['cf31']);
  $clozeField32 = htmlspecialchars($_POST['cf32']);
   
  $cAns1="or";
  $cAns2="randomised";
  $cAns3="routine";
  $cAns4="for";
  $cAns5="with";
  $cAns6="Chief";
  $cAns7="that";
  $cAns8="a";
  $cAns9="you";
  $cAns10="you";
  $cAns11="to";
  $cAns12="sputum";
  $cAns13="up";
  $cAns14="about";
  $cAns15="for";
  $cAns16="signs";
  $cAns17="consistent";
  $cAns18="illness";
  $cAns19="like";
  $cAns20="a";
  $cAns21="viruses";
  $cAns22="have";
  $cAns23="a";
  $cAns24="ability";
  $cAns25="research";
  $cAns26="any";
  $cAns27="then";
  $cAns28="get";
  $cAns29="close";
  $cAns30="would";
  $cAns31="we";
  $cAns32="you";
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO clozeWords (idReviewer,idLeaflet,clozeField1,clozeField2,clozeField3,clozeField4,clozeField5,clozeField6,clozeField7,clozeField8,clozeField9,clozeField10,clozeField11,clozeField12,clozeField13,clozeField14,clozeField15,clozeField16,clozeField17,clozeField18,clozeField19,clozeField20,clozeField21,clozeField22,clozeField23,clozeField24,clozeField25,clozeField26,clozeField27,clozeField28,clozeField29,clozeField30,clozeField31,clozeField32,cAns1,cAns2,cAns3,cAns4,cAns5,cAns6,cAns7,cAns8,cAns9,cAns10,cAns11,cAns12,cAns13,cAns14,cAns15,cAns16,cAns17,cAns18,cAns19,cAns20,cAns21,cAns22,cAns23,cAns24,cAns25,cAns26,cAns27,cAns28,cAns29,cAns30,cAns31,cAns32)VALUES( :idReviewer, :idLeaflet, :clozeField1,:clozeField2,:clozeField3,:clozeField4,:clozeField5,:clozeField6,:clozeField7,:clozeField8,:clozeField9,:clozeField10,:clozeField11,:clozeField12,:clozeField13,:clozeField14,:clozeField15,:clozeField16,:clozeField17,:clozeField18,:clozeField19,:clozeField20,:clozeField21,:clozeField22,:clozeField23,:clozeField24,:clozeField25,:clozeField26,:clozeField27,:clozeField28,:clozeField29,:clozeField30,:clozeField31,:clozeField32, :cAns1,:cAns2,:cAns3,:cAns4,:cAns5,:cAns6,:cAns7,:cAns8,:cAns9,:cAns10,:cAns11,:cAns12,:cAns13,:cAns14,:cAns15,:cAns16,:cAns17,:cAns18,:cAns19,:cAns20,:cAns21,:cAns22,:cAns23,:cAns24,:cAns25,:cAns26,:cAns27,:cAns28,:cAns29,:cAns30,:cAns31,:cAns32)");
	$statement->execute(array("idReviewer"=>$idReviewer,"idLeaflet"=>$idLeaflet,"clozeField1" => $clozeField1,"clozeField2" => $clozeField2,"clozeField3" => $clozeField3,"clozeField4" => $clozeField4,"clozeField5" => $clozeField5,"clozeField6" => $clozeField6,"clozeField7" => $clozeField7,"clozeField8" => $clozeField8,"clozeField9" => $clozeField9,"clozeField10" => $clozeField10,"clozeField11" => $clozeField11,"clozeField12" => $clozeField12,"clozeField13" => $clozeField13,"clozeField14" => $clozeField14,"clozeField15" => $clozeField15,"clozeField16" => $clozeField16,"clozeField17" => $clozeField17,"clozeField18" => $clozeField18,"clozeField19" => $clozeField19,"clozeField20" => $clozeField20,"clozeField21" => $clozeField21,"clozeField22" => $clozeField22,"clozeField23" => $clozeField23,"clozeField24" => $clozeField24,"clozeField25" => $clozeField25,"clozeField26" => $clozeField26,"clozeField27" => $clozeField27,"clozeField28" => $clozeField28,"clozeField29" => $clozeField29,"clozeField30" => $clozeField30,"clozeField31" => $clozeField31,"clozeField32" => $clozeField32,"cAns1" => $cAns1,"cAns2" => $cAns2,"cAns3" => $cAns3,"cAns4" => $cAns4,"cAns5" => $cAns5,"cAns6" => $cAns6,"cAns7" => $cAns7,"cAns8" => $cAns8,"cAns9" => $cAns9,"cAns10" => $cAns10,"cAns11" => $cAns11,"cAns12" => $cAns12,"cAns13" => $cAns13,"cAns14" => $cAns14,"cAns15" => $cAns15,"cAns16" => $cAns16,"cAns17" => $cAns17,"cAns18" => $cAns18,"cAns19" => $cAns19,"cAns20" => $cAns20,"cAns21" => $cAns21,"cAns22" => $cAns22,"cAns23" => $cAns23,"cAns24" => $cAns24,"cAns25" => $cAns25,"cAns26" => $cAns26,"cAns27" => $cAns27,"cAns28" => $cAns28,"cAns29" => $cAns29,"cAns30" => $cAns30,"cAns31" => $cAns31,"cAns32" => $cAns32));
}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

include("revCPIL".$idLeaflet.".html");
?>
