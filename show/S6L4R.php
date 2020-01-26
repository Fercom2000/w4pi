zz<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $Id=$_GET['p'];
  $RID=htmlspecialchars($_POST['RID']);
  $idReviser=htmlspecialchars($_POST['idReviser']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idSentence = htmlspecialchars($_POST['sIds']);
  $crwRevision=htmlspecialchars($_POST['crwRevision']);
  $flag=htmlspecialchars($_POST['flag']);
  $g=htmlspecialchars($_POST['gIds']);
  $next=htmlspecialchars($_POST['next']);
  echo "ID P: ".$Id;

  if($Id=="1"){
    $SID=406;
    $IdArr="1080,1440,1672,653,1062,638,1910,1241,1931";
  }elseif ($Id=="2") {
    $SID=411;
    $IdArr="627,359,393,420,384,662,670,357,661";
  }
  elseif ($Id=="3") {
    $SID=416;
    $IdArr="161,219,192,146,286,278,314,275,143";
  }
  elseif ($Id=="4") {
    $SID=418;
    $IdArr="1399,1489,1381,1098,1654,1081,602,1818,1355";
  }
  elseif ($Id=="5") {
    $SID=433;
    $IdArr="663,443,628,355,658,641,421,664,361";
  }
  elseif ($Id=="6") {
    $SID=450;
    $IdArr="1500,1382,1893,1273,1655,1186,1604,1246,1314";
  }
  elseif ($Id=="7") {
    $SID=455;
    $IdArr="610,607,604,383,415,418,588,545,406";
  }
  elseif ($Id=="8") {
    $SID=470;
    $IdArr="287,106,167,185,147,109,318,144,111";
  }elseif ($Id=="9") {
    $SID=472;
    $IdArr="596,379,350,372,411,543,587,552,414";
  }
  $revSent=explode(",", $IdArr);

  $revSent1=htmlspecialchars($_POST['revSent'.$revSent[0]]);
  $revSent2=htmlspecialchars($_POST['revSent'.$revSent[1]]);
  $revSent3=htmlspecialchars($_POST['revSent'.$revSent[2]]);
  $revSent4=htmlspecialchars($_POST['revSent'.$revSent[3]]);
  $revSent5=htmlspecialchars($_POST['revSent'.$revSent[4]]);
  $revSent6=htmlspecialchars($_POST['revSent'.$revSent[5]]);
  $revSent7=htmlspecialchars($_POST['revSent'.$revSent[6]]);
  $revSent8=htmlspecialchars($_POST['revSent'.$revSent[7]]);
  $revSent9=htmlspecialchars($_POST['revSent'.$revSent[8]]);

  echo "revSent1: ".$revSent1.' revSent'.$revSent[0];
  $i=intval($idSentence);
  $j=$i+1;
  
  error_reporting(E_ALL);
  ini_set('display_errors', true); 

  //ENTER THE RELEVANT INFO BELOW
  try 
  {
  	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');

  }
  catch (PDOException $e) 
  {
      echo 'Error: ' . $e->getMessage();
      exit();
  }
  if($next=="10"){
    header("Location: kwdQs.html");
  }else{
    header("Location: S6RankingPagesL".$idLeaflet.".php?p=".$next);
  }
?>
