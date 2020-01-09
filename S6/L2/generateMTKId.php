<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
  $idReviser=htmlspecialchars($_POST['idReviser']);
  $idLeaflet=htmlspecialchars($_POST['lIds']);
  $kwdQs1=htmlspecialchars($_POST['kwdQs1']);
  $kwdQs2=htmlspecialchars($_POST['kwdQs2']);
  $kwdQs3=htmlspecialchars($_POST['kwdQs3']);
  $kwdQs4=htmlspecialchars($_POST['kwdQs4']);
  $flag=htmlspecialchars($_POST['flag']);
  $idGroup=htmlspecialchars($_POST['gIds']);

  $i=intval($idSentence);
  $j=$i+1;
  
error_reporting(E_ALL);
ini_set('display_errors', true); 

//ENTER THE RELEVANT INFO BELOW
try 
{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$statement = $pdo->prepare("INSERT INTO mtkkwdQs (idReviser,idLeaflet,kwdQs1,kwdQs2,kwdQs3,kwdQs4,flag,idGroup)VALUES( :idReviser, :idLeaflet, :kwdQs1,:kwdQs2,:kwdQs3,:kwdQs4,:flag,:idGroup)");
	$statement->execute(array("idReviser"=>$idReviser,"idLeaflet"=>$idLeaflet,"kwdQs1" => $kwdQs1,"kwdQs2" => $kwdQs2,"kwdQs3" => $kwdQs3,"kwdQs4" => $kwdQs4,"flag"=>$flag,"idGroup"=>$idGroup));

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

//header("Location: crowdSG".$idLeaflet."-".$j.".html");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/reviewer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Web Platform for Public Involvement in Leaflet Design</title>
  </head>
  <body>
    <div class="logo"></div>
    <nav class="Menu">
      <ul class="menuL">
        <li class="menuL "><span class="menuL"><a class="menuL" href="index.html">Home</a></span></li>
        <li class="contact"></li>
      </ul>
    </nav>
    <div class="content">
      <div class="mainC70" id="mainC70">
        <br><h1><center>Thank you for participating in this study</center></h1><br><br>
          <?php
            echo "<h2><center>Your Survey Code is: W4PI-MTK-S062-SRank19-".$idReviser."</center></h2>";
          ?>
      </div>
        
      </div>
      <div class="commentWin10">
        Proudly created with the sponsorship of CONACYT  and The University of Southampton  by Fernando Santos, fss1g15@soton.ac.uk 2018.
      </div>
    </div>
  </body>
</html>