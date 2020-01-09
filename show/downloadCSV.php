<?php
$servername="srv01779.soton.ac.uk";
$username="wppi";
$password="zyfrmmSA0tHzIXmN";
$dname="wppi";
if(isset($_GET['p'])){
    $page=$_GET['p'];
}else{
    $page="eqip";
}
try{
    

    $pdo = new PDO('mysql:host=srv01779.soton.ac.uk;dbname=wppi', 'wppi', 'zyfrmmSA0tHzIXmN');
    $data = $pdo->query("SELECT * FROM $page")->fetchAll();    //"SELECT * INTO OUTFILE 'mydata.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '".'"'."' LINES TERMINATED BY '"."\n"."' FROM mtkCrwRevision GROUP BY idGroup,flag,idReviser,dateT")->fetchAll();//
    
    
    $i=1;

    //$fp = fopen('mtkCrwRevisionGrpByIdGrpFlagIdReviserDateSubm.csv', 'w');

    $first = true;

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="export'.$page.'.csv"');
    header('Cache-Control: max-age=0');

    $out = fopen('php://output', 'w');
    foreach ($data as $row) {
        //$a=array($i,$row["idReviser"],$row["idGroup"],$row["flag"],$row["idLeaflet"],$row["idSentence"],"",$row["dateT"],$row["crwRevision"],$row["rejected"]);
        //fputcsv($fp, $a);
        
        $i=$i+1;
        if($first){
            $titles = array();
            foreach($row as $key=>$val){
                $titles[] = $key;
            }
            fputcsv($out, $titles);
            $first = false;
        }
        fputcsv($out, $row);
        }
    echo "</tbody>";
    echo "</table>";
}catch (PDOException $e) 
{
    echo '<br>Error: ' . $e->getMessage();
    exit();
}
?>