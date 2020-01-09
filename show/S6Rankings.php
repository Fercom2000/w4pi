<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM S6Ranking ORDER BY g,flag,idReviser,dateT")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow small'>Rank Id</th>
                <th class='commentWindow small'>Revision Number</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Crowd Revision</th>
                <th class='commentWindow big'>Revised Sentence1</th>
                <th class='commentWindow big'>Revised Sentence2</th>
                <th class='commentWindow big'>Revised Sentence3</th>
                <th class='commentWindow big'>Revised Sentence4</th>
                <th class='commentWindow big'>Revised Sentence5</th>
                <th class='commentWindow big'>Revised Sentence6</th>
                <th class='commentWindow big'>Revised Sentence7</th>
                <th class='commentWindow big'>Revised Sentence8</th>
                <th class='commentWindow big'>Revised Sentence9</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');
	foreach ($data as $row) {
		//$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
		//fputcsv($fp, $a);
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["idRanking"]."</td><td class='commentWindow'>"
            . $row["RID"]."</td><td class='commentWindow'>"
            . $row["idReviser"]."</td><td class='commentWindow'>"
            . $row["g"]."</td><td class='commentWindow'>"
            . $row["flag"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
            . $row["idSentence"]."</td><td class='commentWindow'>"
            . $row["dateT"]."</td><td class='commentWindow'>"
            . $row["crwRevision"]."</td><td class='commentWindow'>"
            . $row["revSent1"]."</td><td class='commentWindow'>"
            . $row["revSent2"]."</td><td class='commentWindow'>"
            . $row["revSent3"]."</td><td class='commentWindow'>"
            . $row["revSent4"]."</td><td class='commentWindow'>"
            . $row["revSent5"]."</td><td class='commentWindow'>"
            . $row["revSent6"]."</td><td class='commentWindow'>"
            . $row["revSent7"]."</td><td class='commentWindow'>"
            . $row["revSent8"]."</td><td class='commentWindow'>"
            . $row["revSent9"]."</td>"
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