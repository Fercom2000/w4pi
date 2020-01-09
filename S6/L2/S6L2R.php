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
      $SID=222;
      $IdArr="234,281,269,228,119,92,187,252,179";
    }elseif ($Id=="2") {
      $SID=227;
      $IdArr="403,505,799,400,699,540,806,909,508";
    }
    elseif ($Id=="3") {
      $SID=232;
      $IdArr="1776,725,1713,1639,1264,1501,1563,529,837";
    }
    elseif ($Id=="4") {
      $SID=234;
      $IdArr="726,459,996,435,483,618,865,1021,546";
    }
    elseif ($Id=="5") {
      $SID=263;
      $IdArr="141,309,156,268,226,102,254,267,235";
    }
    elseif ($Id=="6") {
      $SID=264;
      $IdArr="91,1105,1326,1736,1191,1606,279,1160,1574";
    }
    elseif ($Id=="7") {
      $SID=283;
      $IdArr="735,926,469,990,707,499,866,376,1012";
    }
    elseif ($Id=="8") {
      $SID=2100;
      $IdArr="1192,1822,1330,1067,1587,1834,1916,1361,711";
    }else{
      $SID=2112;
      $IdArr="835,843,754,755,831,347,878,504,759";
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
