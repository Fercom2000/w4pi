<div>
	<form name=cform action="./CrowdRevisions.php" method="post">
		Reviewer: <input type="text" name="idReviser">
		Flag: <input type="text" name="flag" id="flag" size="15"></input>
		Group: <input type="text" name="gIds" id="gIds" size="15"></input>
		Leaflet: <input type="text" name="lIds" rows="3" size="10"></input>
		Sentence: <input type="text" name="sIds" rows="3" size="10"></input>
		Random: <input type="text" name="ran" rows="3" size="10"></input>
		Limit: <input type="text" name="lim" rows="3" size="10"></input>
		Date1 (yyyy-mm-dd): <input type="text" name="dateT" rows="3" size="10"></input>
		<select class='dateOpr' name='dateOpr'>
	        <option value='1'><</option>
	        <option value='2'>></option>
	        <option value='3'>=</option>
	    </select>
		Date2 (yyyy-mm-dd): <input type="text" name="dateT2" rows="3" size="10"></input>
		Query: <input type="text" name="query" rows="3" size="10"></input>
		Group By: <input type="text" name="gBy" rows="3" size="10"></input>
		Order By: <input type="text" name="oBy" rows="3" size="10"></input>
  		<input type="submit" value="Continue to the Next Sentnce">
	</form>
</div>
<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

$p=$_GET['p'];
$idReviser=htmlspecialchars($_POST['idReviser']);
$idGroup=htmlspecialchars($_POST['gIds']);
$flag=htmlspecialchars($_POST['flag']);
$idLeaflet=htmlspecialchars($_POST['lIds']);
$idSentence = htmlspecialchars($_POST['sIds']);
$dateT=htmlspecialchars($_POST['dateT']);
$dateT2=htmlspecialchars($_POST['dateT2']);
$dateOpr=htmlspecialchars($_POST['dateOpr']);
$ran=htmlspecialchars($_POST['ran']);
$lim=htmlspecialchars($_POST['lim']);
$RID=htmlspecialchars($_POST['RID']);
$query=htmlspecialchars($_POST['query']);
$gBy=htmlspecialchars($_POST['gBy']);
$oBy=htmlspecialchars($_POST['oBy']);

$sql="SELECT * FROM mtkCrwRevision ";
$a=[];
$l=0;
$f=0;
if($idReviser || $idGroup ||$idLeaflet || $idSentence||$flag||$dateT||$dateT2){
	$sql=$sql." WHERE ";
	$f=1;
}
if($idReviser){
	$sql=$sql." idReviser= ? AND ";
	$l=array_push($a, $idReviser);
}
if($idGroup){
	$sql=$sql." idGroup= ? AND ";
	$l=array_push($a, $idGroup);
}
if($idLeaflet){
	$sql=$sql." idLeaflet= ? AND ";
	$l=array_push($a, $idLeaflet);
}
if($idSentence){
	$sql=$sql." idSentence= ? AND ";
	$l=array_push($a, $idSentence);
}
if($flag){
	$sql=$sql." flag= ? AND ";
	$l=array_push($a, $flag);
}
if($dateT){
	if($dateT2){
		$sql=$sql." dateT BETWEEN ? AND ? AND";		
		$l=array_push($a, $dateT);
		$l=array_push($a, $dateT2);
	}else{
		if($dateOpr=="1"){
			$sql=$sql." dateT< ? AND ";
		}
		if($dateOpr=="2"){
			$sql=$sql." dateT> ? AND ";
		}
		if($dateOpr=="3"){
			$sql=$sql." dateT= ? AND ";
		}
		$l=array_push($a, $dateT);
	}
}
if($f){
	$sql=substr($sql, 0, -4);
}
if($ran){
	$sql=$sql." ORDER BY RAND() ";
}
if($lim){
	$sql=$sql." LIMIT ".$lim;
	$l=array_push($a, $lim);
}
if($gBy){
	$sql="SELECT * FROM mtkCrwRevision ORDER BY ?,?,?,?";
	$l=array_push($a, "idGroup");
	$l=array_push($a, "flag");
	$l=array_push($a, "idReviser");
	$l=array_push($a, "dateT");
}
$sql=$sql.";";
echo $sql." ";
print_r($a);
echo "<br><br>";

try{
	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	if($gBy){
		$data = $pdo->query("SELECT * FROM mtkCrwRevision ORDER BY idGroup,flag,idReviser,dateT")->fetchAll();
		/*foreach ($data as $row) {
		    echo $row['idReviser']."<br />\n";
		}*/
	}else{
		$stmt = $pdo->prepare($sql);
		$stmt->execute($a); 
		$data = $stmt->fetchAll();
	}
	

	echo ("<br><h2>Comments for this Leaflet</h2><br>
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow small'>Revision Number</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Rejected</th>
                <th class='commentWindow big'>Revised Sentence</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;
	foreach ($data as $row) {
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["idCrwRevision"]."</td><td class='commentWindow'>"
            . $row["idReviser"]."</td><td class='commentWindow'>"
            . $row["idGroup"]."</td><td class='commentWindow'>"
            . $row["flag"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
            . $row["idSentence"]."</td><td class='commentWindow'>"
            . $row["dateT"]."</td><td class='commentWindow'>"
            . $row["rejected"]."</td><td class='commentWindow'>"
            . $row["crwRevision"]."</td>"
            ."</tr>");
		$i=$i+1;
	}
    echo "</tbody>";
  	echo "</table>";
}catch (PDOException $e) 
{
    echo '<br>Error: ' . $e->getMessage();
    exit();
}
?>