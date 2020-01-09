<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $idReviewer=htmlspecialchars($_POST['ErIds']);
  $idLeaflet=htmlspecialchars($_POST['ElIds']);
  $Q1=htmlspecialchars($_POST['eqipQ1']);
  $Q2=htmlspecialchars($_POST['eqipQ2']);
  $Q3=htmlspecialchars($_POST['eqipQ3']);
  $Q4=htmlspecialchars($_POST['eqipQ4']);
  $Q5=htmlspecialchars($_POST['eqipQ5']);
  $Q6=htmlspecialchars($_POST['eqipQ6']);
  $Q7=htmlspecialchars($_POST['eqipQ7']);
  $Q8=htmlspecialchars($_POST['eqipQ8']);
  $Q9=htmlspecialchars($_POST['eqipQ9']);
  $Q10=htmlspecialchars($_POST['eqipQ10']);
  $Q11=htmlspecialchars($_POST['eqipQ11']);
  $Q12=htmlspecialchars($_POST['eqipQ12']);
  $Q13=htmlspecialchars($_POST['eqipQ13']);
  $Q14=htmlspecialchars($_POST['eqipQ14']);
  $Q15=htmlspecialchars($_POST['eqipQ15']);
  $Q16=htmlspecialchars($_POST['eqipQ16']);
  $Q17=htmlspecialchars($_POST['eqipQ17']);
  $Q18=htmlspecialchars($_POST['eqipQ18']);
  $Q19=htmlspecialchars($_POST['eqipQ19']);
  $Q20=htmlspecialchars($_POST['eqipQ20']);
  $Q21=htmlspecialchars($_POST['eqipQ21']);
  $Q22=htmlspecialchars($_POST['eqipQ22']);
  $Q23=htmlspecialchars($_POST['eqipQ23']);
  $Q24=htmlspecialchars($_POST['eqipQ24']);
  $Q25=htmlspecialchars($_POST['eqipQ25']);
  $Q26=htmlspecialchars($_POST['eqipQ26']);
  $Q27=htmlspecialchars($_POST['eqipQ27']);
  $Q28=htmlspecialchars($_POST['eqipQ28']);
  $Q29=htmlspecialchars($_POST['eqipQ29']);
  $Q30=htmlspecialchars($_POST['eqipQ30']);
  $Q31=htmlspecialchars($_POST['eqipQ31']);
  $Q32=htmlspecialchars($_POST['eqipQ32']);
  $Q33=htmlspecialchars($_POST['eqipQ33']);
  $Q34=htmlspecialchars($_POST['eqipQ34']);
  $Q35=htmlspecialchars($_POST['eqipQ35']);
  //echo  $assocText, ' ', $emotionVector, ' ', $idParagraph, ' ', $comment;
  //echo "HOLA",$idLeaflet;
  $i=intval($idLeaflet);
  $j=$i+1;
  $x=4;
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');//'mysql:host=localhost;dbname=w4PI','root','Fercom6621');//
	$statement = $pdo->prepare("INSERT INTO Qs(idReviewer,idLeaflet, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, Q13, Q14, Q15, Q16, Q17, Q18, Q19, Q20, Q21, Q22, Q23, Q24, Q25, Q26, Q27, Q28, Q29, Q30, Q31, Q32, Q33, Q34, Q35) VALUES( :idReviewer, :idLeaflet, :Q1, :Q2, :Q3, :Q4, :Q5, :Q6, :Q7, :Q8, :Q9, :Q10, :Q11, :Q12, :Q13, :Q14, :Q15, :Q16, :Q17, :Q18, :Q19, :Q20, :Q21, :Q22, :Q23, :Q24, :Q25, :Q26, :Q27, :Q28, :Q29, :Q30, :Q31, :Q32, :Q33, :Q34, :Q35)");
	$statement->execute(array("idReviewer"=>$idReviewer,"idLeaflet"=>$idLeaflet,"Q1" => $Q1,"Q2"=>$Q2,"Q3"=>$Q3,"Q4" => $Q4, "Q5" => $Q5, "Q6" => $Q6, "Q7"=> $Q7, "Q8"=> $Q8, "Q9"=> $Q9, "Q10"=> $Q10,"Q11" => $Q11,"Q12"=>$Q12,"Q13"=>$Q13,"Q14" => $Q14, "Q15" => $Q15, "Q16" => $Q16, "Q17"=> $Q17, "Q18"=> $Q18, "Q19"=> $Q19, "Q20"=> $Q20,"Q21" => $Q21,"Q22"=>$Q22,"Q23"=>$Q23,"Q24" => $Q24, "Q25" => $Q25, "Q26" => $Q26, "Q27"=> $Q27, "Q28"=> $Q28, "Q29"=> $Q29, "Q30"=> $Q30,"Q31" => $Q31,"Q32"=>$Q32,"Q33"=>$Q33,"Q34" => $Q34, "Q35" => $Q35));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

  header("Location: clozepil".$j.".html");//include("clozepil".$j.".html");
/*if(intval($j)<intval($x)){
  echo "HEEEEEEEEEEEEEEEEEEEEEEEEEEEY",$j," ",$x;
  include("clozepil".$j.".html");
}else{
  alert("Thank you for your collaboration!")
}*/
?>
