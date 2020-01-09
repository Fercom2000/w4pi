<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM clozeReviewer")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow small'>Id Reviewer</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Cloze Field 1</th>
                <th class='commentWindow big'>Cloze Field 2</th>
                <th class='commentWindow big'>Cloze Field 3</th>
                <th class='commentWindow big'>Cloze Field 4</th>
                <th class='commentWindow big'>Cloze Field 5</th>
                <th class='commentWindow big'>Cloze Field 6</th>
                <th class='commentWindow big'>Cloze Field 7</th>
                <th class='commentWindow big'>Cloze Field 8</th>
                <th class='commentWindow big'>Cloze Field 9</th>
                <th class='commentWindow big'>Cloze Field 10</th>
                <th class='commentWindow big'>Cloze Field 11</th>
                <th class='commentWindow big'>Cloze Field 12</th>
                <th class='commentWindow big'>Cloze Field 13</th>
                <th class='commentWindow big'>Cloze Field 14</th>
                <th class='commentWindow big'>Cloze Field 15</th>
                <th class='commentWindow big'>Cloze Field 16</th>
                <th class='commentWindow big'>Cloze Field 17</th>
                <th class='commentWindow big'>Cloze Field 18</th>
                <th class='commentWindow big'>Cloze Field 19</th>
                <th class='commentWindow big'>Cloze Field 20</th>
                <th class='commentWindow big'>Cloze Field 21</th>
                <th class='commentWindow big'>Cloze Field 22</th>
                <th class='commentWindow big'>Cloze Field 23</th>
                <th class='commentWindow big'>Cloze Field 24</th>
                <th class='commentWindow big'>Cloze Field 25</th>
                <th class='commentWindow big'>Cloze Field 26</th>
                <th class='commentWindow big'>Cloze Field 27</th>
                <th class='commentWindow big'>Cloze Field 28</th>
                <th class='commentWindow big'>Cloze Field 29</th>
                <th class='commentWindow big'>Cloze Field 30</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');
	foreach ($data as $row) {
		//$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
		//fputcsv($fp, $a);
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["idReviewer"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
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
            . $row["clozeField11"]."</td><td class='commentWindow'>"
            . $row["clozeField12"]."</td><td class='commentWindow'>"
            . $row["clozeField13"]."</td><td class='commentWindow'>"
            . $row["clozeField14"]."</td><td class='commentWindow'>"
            . $row["clozeField15"]."</td><td class='commentWindow'>"
            . $row["clozeField16"]."</td><td class='commentWindow'>"
            . $row["clozeField17"]."</td><td class='commentWindow'>"
            . $row["clozeField18"]."</td><td class='commentWindow'>"
            . $row["clozeField19"]."</td><td class='commentWindow'>"
            . $row["clozeField20"]."</td><td class='commentWindow'>"
            . $row["clozeField21"]."</td><td class='commentWindow'>"
            . $row["clozeField22"]."</td><td class='commentWindow'>"
            . $row["clozeField23"]."</td><td class='commentWindow'>"
            . $row["clozeField24"]."</td><td class='commentWindow'>"
            . $row["clozeField25"]."</td><td class='commentWindow'>"
            . $row["clozeField26"]."</td><td class='commentWindow'>"
            . $row["clozeField27"]."</td><td class='commentWindow'>"
            . $row["clozeField28"]."</td><td class='commentWindow'>"
            . $row["clozeField29"]."</td><td class='commentWindow'>"
            . $row["clozeField30"]."</td><td class='commentWindow'>"
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