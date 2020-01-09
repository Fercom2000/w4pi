<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $assocText = htmlspecialchars($_POST['selectedText']);
  $idParagraph=htmlspecialchars($_POST['pIds']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $idReviewer=htmlspecialchars($_POST['reviewerId']);
  $comment  = htmlspecialchars($_POST['comment']);
  $otherReason=htmlspecialchars($_POST['reasonOther']);
  $otherTopic=htmlspecialchars($_POST['topicOther']);
  $otherEmotion=htmlspecialchars($_POST['emotionOther']);
	$emotionVector="";
  $reasonVector="";
  $topicVector="";
  
  if(isset($_POST['reasonMore'])){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }
  if(isset($_POST['reasonUnclear'])){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }
  if(isset($_POST['reasonRephrase'])){
    $reasonVector=$reasonVector."1";
  }else{
    $reasonVector=$reasonVector."0";
  }

  if(isset($_POST['topicSample'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicPurpose'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicProcess'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicMedProc'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicRiskBen'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicInforma'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicLanguage'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }
  if(isset($_POST['topicDocDesig'])){
    $topicVector=$topicVector."1";
  }else{
    $topicVector=$topicVector."0";
  }

  if(isset($_POST['positive'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['negative'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['neutral'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['anger'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['anticipation'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['joy'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['trust'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['fear'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['surprise'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['sadness'])){
    $emotionVector=$emotionVector."1";
  }else{
    $emotionVector=$emotionVector."0";
  }
  if(isset($_POST['disgust'])){
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
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO comment(idReviewer,idLeaflet,assocText,emotionVector,idParagraph, comment, reasonVector, topicVector, otherReason, otherTopic, otherEmotion)
	    VALUES( :idReviewer, :idLeaflet, :assocText, :emotionVector, :idParagraph, :comment, :reasonVector, :topicVector, :otherReason, :otherTopic, :otherEmotion)");
	$statement->execute(array("idReviewer"=>$idReviewer,"idLeaflet"=>$idLeaflet,"assocText" => $assocText,"emotionVector"=>$emotionVector,"idParagraph"=>$idParagraph,"comment" => $comment, "reasonVector" => $reasonVector, "topicVector" => $topicVector, "otherReason" => $otherReason, "otherTopic" => $otherTopic, "otherEmotion"=> $otherEmotion));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

include("commentv2.html");
?>
