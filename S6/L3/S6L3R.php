<?php
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
      $SID=312;
      $IdArr="1415,1811,1759,1633,1527,589,423,1092,1779";
    }elseif ($Id=="2") {
      $SID=319;
      $IdArr="1195,1949,571,1556,1343,1437,1240,387,1918";
    }
    elseif ($Id=="3") {
      $SID=324;
      $IdArr="442,629,649,449,367,631,639,389,635";
    }
    elseif ($Id=="4") {
      $SID=333;
      $IdArr="388,559,490,570,466,531,583,527,472";
    }
    elseif ($Id=="5") {
      $SID=341;
      $IdArr="642,450,666,369,672,651,390,633,648";
    }
    elseif ($Id=="6") {
      $SID=342;
      $IdArr="113,299,216,128,249,117,320,296,175";
    }
    elseif ($Id=="7") {
      $SID=343;
      $IdArr="445,652,451,439,637,632,634,673,448";
    }
    elseif ($Id=="8") {
      $SID=346;
      $IdArr="1335,1559,1731,1652,1919,1613,1487,1792,1347";
    }elseif ($Id=="9") {
      $SID=359;
      $IdArr="303,118,321,217,153,150,123,205,294";
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
  	$statement = $pdo->prepare("INSERT INTO S6Ranking (RID,idReviser,idLeaflet,idSentence,crwRevision,g,flag,revSent1,revSent2,revSent3,revSent4,revSent5,revSent6,revSent7,revSent8,revSent9)VALUES( :RID,:idReviser,:idLeaflet,:idSentence,:crwRevision,:g,:flag,:revSent1,:revSent2,:revSent3,:revSent4,:revSent5,:revSent6,:revSent7,:revSent8,:revSent9)");
    $statement->execute(array("RID"=>$RID,"idReviser"=>$idReviser,"idLeaflet" => $idLeaflet,"idSentence" => $idSentence,"crwRevision"=>$crwRevision,"g"=>$g,"flag"=>$flag,"revSent1"=>$revSent1,"revSent2"=>$revSent2,"revSent3"=>$revSent3,"revSent4"=>$revSent4,"revSent5"=>$revSent5,"revSent6"=>$revSent6,"revSent7"=>$revSent7,"revSent8"=>$revSent8,"revSent9"=>$revSent9));

  }
  catch (PDOException $e) 
  {
      echo 'Error: ' . $e->getMessage();
      exit();
  }
  if($next=="10"){
    header("Location: kwdQs.html");
  }else{
    header("Location: S6L".$idLeaflet.".php?p=".$next);
  }
?>
