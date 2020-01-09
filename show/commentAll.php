<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM comment ORDER BY idLeaflet,idReviewer")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow small'>Comment Number</th>
                <th class='commentWindow big'>Reviewer</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Paragraph</th>
                <th class='commentWindow big'>Emotions</th>
                <th class='commentWindow big'>Reasons</th>
                <th class='commentWindow big'>Topics Time</th>
                <th class='commentWindow big'>NLTK -</th>
                <th class='commentWindow big'>NLTK 0</th>
                <th class='commentWindow big'>NLTK +</th>
                <th class='commentWindow big'>NLTK LAB</th>
                <th class='commentWindow big'>Comment</th>
                <th class='commentWindow big'>Associated Text</th>
                <th class='commentWindow big'>Other Topics</th>
                <th class='commentWindow big'>Other Reasons</th>
                <th class='commentWindow big'>Other Emotions</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');
	foreach ($data as $row) {
		//$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
		//fputcsv($fp, $a);
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["id"]."</td><td class='commentWindow'>"
            . $row["idReviewer"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
            . $row["idParagraph"]."</td><td class='commentWindow'>"
            . $row["emotionVector"]."</td><td class='commentWindow'>"
            . $row["reasonVector"]."</td><td class='commentWindow'>"
            . $row["topicVector"]."</td><td class='commentWindow'>"
            . $row["nltkNeg"]."</td><td class='commentWindow'>"
            . $row["nltkNeu"]."</td><td class='commentWindow'>"
            . $row["nltkPos"]."</td><td class='commentWindow'>"
            . $row["nltkLab"]."</td><td class='commentWindow'>"
            . $row["comment"]."</td><td class='commentWindow'>"
            . $row["assocText"]."</td><td class='commentWindow'>"
            . $row["otherTopic"]."</td><td class='commentWindow'>"
            . $row["otherReason"]."</td><td class='commentWindow'>"
            . $row["otherEmotion"]."</td>"
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