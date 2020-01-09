<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM orgSentence")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow big'>Id</th>
                <th class='commentWindow big'>SID</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Section</th>
                <th class='commentWindow big'>Mean</th>
                <th class='commentWindow big'>Std Var</th>
                <th class='commentWindow big'>Coe Var</th>
                <th class='commentWindow big'>Submission Date</th>
                <th class='commentWindow big'>Flag</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');
	foreach ($data as $row) {
		//$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
		//fputcsv($fp, $a);
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["idOrgSentence"]."</td><td class='commentWindow'>"
            . $row["SID"]."</td><td class='commentWindow'>"
            . $row["Sentence"]."</td><td class='commentWindow'>"
            . $row["Section"]."</td><td class='commentWindow'>"
            . $row["SMean"]."</td><td class='commentWindow'>"
            . $row["SStDev"]."</td><td class='commentWindow'>"
            . $row["SCoeVar"]."</td><td class='commentWindow'>"
            . $row["dateT"]."</td><td class='commentWindow'>"
            . $row["flag"]."</td>"
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