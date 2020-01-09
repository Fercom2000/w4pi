<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM mtkClozeWords ORDER BY idGroup,idLeaflet,idReviser,idSentence;")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow big'>Id</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow small'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Field 1</th>
                <th class='commentWindow big'>Field 2</th>
                <th class='commentWindow big'>Field 3</th>
                <th class='commentWindow big'>Field 4</th>
                <th class='commentWindow big'>Field 5</th>
                <th class='commentWindow big'>Field 6</th>
                <th class='commentWindow big'>Field 7</th>
                <th class='commentWindow big'>Field 8</th>
                <th class='commentWindow big'>Field 9</th>
                <th class='commentWindow big'>Field 10</th>
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
            . $row["idClozeW"]."</td><td class='commentWindow'>"
            . $row["idGroup"]."</td><td class='commentWindow'>"
            . $row["idReviser"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
            . $row["idSentence"]."</td><td class='commentWindow'>"
            . $row["dateT"]."</td><td class='commentWindow'>"
            . $row["clozeField1"]."</td><td class='commentWindow'>"
            . $row["clozeField2"]."</td><td class='commentWindow'>"
            . $row["clozeField3"]."</td><td class='commentWindow'>"
            . $row["clozeField4"]."</td><td class='commentWindow'>"
            . $row["clozeField5"]."</td><td class='commentWindow'>"
            . $row["clozeField6"]."</td><td class='commentWindow'>"
            . $row["clozeField7"]."</td><td class='commentWindow'>"
            . $row["clozeField8"]."</td><td class='commentWindow'>"
            . $row["clozeField9"]."</td><td class='commentWindow'>"
            . $row["clozeField10"]."</td><td class='commentWindow'>"
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