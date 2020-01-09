<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $assocText = htmlspecialchars($_POST['selectedText']);
  $idParagraph=htmlspecialchars($_POST['pIds']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idReviewer=htmlspecialchars($_POST['reviewerId']);
  $comment  = htmlspecialchars($_POST['comment']);
  $otherReason=htmlspecialchars($_POST['reasonOther']);
  $otherEmotion=htmlspecialchars($_POST['emotionOther']);
  $priority=htmlspecialchars($_POST['priority']);
	$emotionVector="";
  $reasonVector="";
  
  if($_POST['support']!="false"){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }
  if($_POST['issue']!="false"){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }
  if($_POST['suggestion']!="false"){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }

  if($_POST['positive']!="false"){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if($_POST['neutral']!="false"){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if($_POST['negative']!="false"){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  //echo  $assocText, ' ', $emotionVector, ' ', $idParagraph, ' ', $comment;
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');//'mysql:host=localhost;dbname=w4PI','root','Fercom6621');//
	$statement = $pdo->prepare("INSERT INTO rComment(idReviewer,idLeaflet,assocText,emotionVector,idParagraph, comment, reasonVector, otherReason, otherEmotion, priority)
	    VALUES( :idReviewer, :idLeaflet, :assocText, :emotionVector, :idParagraph, :comment, :reasonVector, :otherReason, :otherEmotion, :priority)");
	$statement->execute(array("idReviewer"=>$idReviewer,"idLeaflet"=>$idLeaflet,"assocText" => $assocText,"emotionVector"=>$emotionVector,"idParagraph"=>$idParagraph,"comment" => $comment, "reasonVector" => $reasonVector, "otherReason" => $otherReason, "otherEmotion"=> $otherEmotion, "priority"=> $priority));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

//include("revPIL1v4.html");
?>
