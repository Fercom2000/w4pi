<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";

try{
	

	$pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
	$data = $pdo->query("SELECT * FROM clozeWords ORDER BY idLeaflet,idReviewer")->fetchAll();	//"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
	
	echo ("
        <style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow'>
                <th class='commentWindow small'>Row</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow small'>Leaflet</th>
                <th class='commentWindow big'>Reviser</th>
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
                <th class='commentWindow big'>Field 11</th>
                <th class='commentWindow big'>Field 12</th>
                <th class='commentWindow big'>Field 13</th>
                <th class='commentWindow big'>Field 14</th>
                <th class='commentWindow big'>Field 15</th>
                <th class='commentWindow big'>Field 16</th>
                <th class='commentWindow big'>Field 17</th>
                <th class='commentWindow big'>Field 18</th>
                <th class='commentWindow big'>Field 19</th>
                <th class='commentWindow big'>Field 20</th>
                <th class='commentWindow big'>Field 21</th>
                <th class='commentWindow big'>Field 22</th>
                <th class='commentWindow big'>Field 23</th>
                <th class='commentWindow big'>Field 24</th>
                <th class='commentWindow big'>Field 25</th>
                <th class='commentWindow big'>Field 26</th>
                <th class='commentWindow big'>Field 27</th>
                <th class='commentWindow big'>Field 28</th>
                <th class='commentWindow big'>Field 29</th>
                <th class='commentWindow big'>Field 30</th>
                <th class='commentWindow big'>Revised Sentence</th>
            </tr>");
    echo "<tbody class='pDiv hidden' id='pCom0'>";
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');
	foreach ($data as $row) {
		//$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
		//fputcsv($fp, $a);
		echo ("<tr class='cRow'><td class='commentWindow small'>"
			. $i."</td><td class='commentWindow'>"
            . $row["flag"]."</td><td class='commentWindow'>"
            . $row["idLeaflet"]."</td><td class='commentWindow'>"
            . $row["idReviewer"]."</td><td class='commentWindow'>"
            . $row["clozeField1"]."<br>".$row["cAns1"]."</td><td class='commentWindow'>"
            . $row["clozeField2"]."<br>".$row["cAns2"]."</td><td class='commentWindow'>"
            . $row["clozeField3"]."<br>".$row["cAns3"]."</td><td class='commentWindow'>"
            . $row["clozeField4"]."<br>".$row["cAns4"]."</td><td class='commentWindow'>"
            . $row["clozeField5"]."<br>".$row["cAns5"]."</td><td class='commentWindow'>"
            . $row["clozeField6"]."<br>".$row["cAns6"]."</td><td class='commentWindow'>"
            . $row["clozeField7"]."<br>".$row["cAns7"]."</td><td class='commentWindow'>"
            . $row["clozeField8"]."<br>".$row["cAns8"]."</td><td class='commentWindow'>"
            . $row["clozeField9"]."<br>".$row["cAns9"]."</td><td class='commentWindow'>"
            . $row["clozeField10"]."<br>".$row["cAns0"]."</td><td class='commentWindow'>"
            . $row["clozeField11"]."<br>".$row["cAns1"]."</td><td class='commentWindow'>"
            . $row["clozeField12"]."<br>".$row["cAns2"]."</td><td class='commentWindow'>"
            . $row["clozeField13"]."<br>".$row["cAns3"]."</td><td class='commentWindow'>"
            . $row["clozeField14"]."<br>".$row["cAns4"]."</td><td class='commentWindow'>"
            . $row["clozeField15"]."<br>".$row["cAns5"]."</td><td class='commentWindow'>"
            . $row["clozeField16"]."<br>".$row["cAns6"]."</td><td class='commentWindow'>"
            . $row["clozeField17"]."<br>".$row["cAns7"]."</td><td class='commentWindow'>"
            . $row["clozeField18"]."<br>".$row["cAns8"]."</td><td class='commentWindow'>"
            . $row["clozeField19"]."<br>".$row["cAns9"]."</td><td class='commentWindow'>"
            . $row["clozeField20"]."<br>".$row["cAns0"]."</td><td class='commentWindow'>"
            . $row["clozeField21"]."<br>".$row["cAns1"]."</td><td class='commentWindow'>"
            . $row["clozeField22"]."<br>".$row["cAns2"]."</td><td class='commentWindow'>"
            . $row["clozeField23"]."<br>".$row["cAns3"]."</td><td class='commentWindow'>"
            . $row["clozeField24"]."<br>".$row["cAns4"]."</td><td class='commentWindow'>"
            . $row["clozeField25"]."<br>".$row["cAns5"]."</td><td class='commentWindow'>"
            . $row["clozeField26"]."<br>".$row["cAns6"]."</td><td class='commentWindow'>"
            . $row["clozeField27"]."<br>".$row["cAns7"]."</td><td class='commentWindow'>"
            . $row["clozeField28"]."<br>".$row["cAns8"]."</td><td class='commentWindow'>"
            . $row["clozeField29"]."<br>".$row["cAns9"]."</td><td class='commentWindow'>"
            . $row["clozeField30"]."<br>".$row["cAns0"]."</td>"
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