<?php
$lId=$_GET['p'];
$servername = "srv01779.soton.ac.uk";
$username = "wppi";
$password = "zyfrmmSA0tHzIXmN";
$dbname = "wppi";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$revArr=array("sre35"=>"s.g.gallimore@soton.ac.uk,3,2,3,3",
        "sre37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sr37"=>"lisalori08@hotmail.com,1,1,2,4",
        "sre38"=>"bmt1g13@soton.ac.uk,2,1,1,4",
        "sre39"=>"ken.pattinson@hotmail.com,1,2,6,4",
        "sre310"=>"c.ogbu@cindellogistics.co.uk,2,1,3,3",
        "sre312"=>"carolina012299@gmail.com,1,1,1,3",
        "sre313"=>"fjn1g13@soton.ac.uk,3,2,1,4",
        "sre314"=>"c.j.maidens@soton.ac.uk,2,2,6,4",
        "sre316"=>"valeriadz11@gmail.com,1,2,2,4",
        "sre317"=>"sk1n15@soton.ac.uk,3,2,2,4",
        "sre319"=>"sh7g13@soton.ac.uk,3,1,1,4",
        "sre320"=>"bmt1g13@soton.ac.uk,2,2,1,4");


$sql = "SELECT *  FROM clozeWords where idLeaflet = ".$lId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$j=0;
    $pWarr=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    $a=array();	
    $t1=array("University Hospital, Southampton NHS, NHS Fundation Trust Participant Information Sheet: adults with capacity","who regain capacity Pragmatic","controlled trial evaluating a ","molecular Point-of-Care `test-and-treat` strategy ","influenza in adults hospitalised","acute respiratory illness: FluPOC ","Investigator: Dr Tristan Clark ","If you have a swab","reveals that you have ","virus, we may approach ","again to ask if "," would give us permission "," take further nasal swabs, "," (if you are coughing "," sputum) and another blood test ("," half a tablespoon full) "," additional ethically approved research.",
"The symptoms and clinical ","that you display are ","with an `acute respiratory ","' ` and so we would ","to test you for ","wide variety of respiratory ","(including influenza), which might ","caused your illness, using ","rapid point-of-care test.","If you lose the ","to consent and the ","team wish to take ","more samples from you, ","we would have to ","written permission from someone ","to you, and you ","have to agree that ","could use them once ","recovered.");
    $t2=array("We would also like "," ask your permission to "," information that is routinely "," about you by the NHS, "," as your clinical and "," details both through your "," records and national databases "," as NHS Digital and "," central UK bodies.","Your hospital and the MSRG "," use your name, NHS "," and contact details to "," you about the research ",", and make sure that "," information about the study "," recorded for your care, "," to oversee the quality "," the study.","The only people in UHSFT "," the MSRG who will "," access to information that "," you will be people "," need to contact you "," send or request questionnaires, "," and analyse your data, "," audit the data collection ",".","We understand that this "," comes at a time "," you have a lot "," deal with already, but "," need to find out "," you are before your ",", so that we can "," out how your health "," well-being changes over time.");
    $t3=array("All personal details (such "," your name and address) "," be stored separately in "," filling cabinets and held "," computers which will be "," protected and only accessible "," members of the University "," Southampton research team. "," If, having read this ",", you are happy to "," part, please complete the questionnaire "," return it to the "," at the workshop, or "," it to us at "," University of Southampton in "," pre-paid envelope provided. "," If you are happy "," take part in the interview, "," complete the reply slip "," return it to the "," at the workshop, or "," it us at the "," of Southampton in the pre-paid "," provided. "," It is unlikely that "," will benefit directly from "," part in this research, "," the results from the "," will help us to "," develop and improve services "," men with prostate cancer. "," We will not be "," to talk to everyone "," would like to talk "," men of different ages, "," have had different cancer "," and different levels of experience of computing.");
    $t4=array("The options for withdrawal ",":<br> *No further contact- we "," no longer send you questionnaires, "," would still have your "," to retain and use "," provided so far and "," continue collect routine clinical ","<br> Or<br> *No further use- "," would no longer contact "," in the future, and "," collected previously would no "," be available to researchers. ","Processing your information for trials "," necessary for the performance "," a task carried out "," the public interest (General "," Protection Regulation (GDPR) Article 6(1)(e)) "," under Article 9(2)(j) necessary for "," purposes in the public ",", scientific or historical research "," in accordance with Article 89 (1). ","We are also gathering "," for the TrueNTH Global Registry project "," is routinely collected by "," NHS, such as clinical "," treatment details both through "," records and national databases "," as the Health and Social Care Information Centre "," other central UK bodies. ","The only people in "," University of Southampton who "," have access to information "," identifies you will be "," who need to contact you "," send or request questionnaires, "," and analyse your data, or audit the data collection process.");
    while($row = $result->fetch_assoc()) {
    	if(intval($row["flag"]<1) and $revArr[$row['idReviewer']]){
    		$nRev+=1;
    		$a[]=$row;
    		for($i=1;$i<=31;$i+=1){    			
    			if(strtolower($row["cAns".$i])==strtolower($row["clozeField".$i])){
    				$pWarr[$i-1]=$pWarr[$i-1]+1;
    			}else{
    				//echo "<b>",$row["cAns".$i]," ",$row["clozeField".$i],"</b><br>";
    			}
    		}
			
		}
    }
    for($i=0;$i<31;$i+=1){
    	$pWarr[$i]=intval($pWarr[$i]/$nRev*100);
    	//echo $a[0]["cAns".strval($i+1)], " ",$pWarr[$i];
    }
    echo "<table class='clozeWordsTable c'>
            <tbody class='pDiv' id='pCom0'>
    		<tr class='cRow'>
    			<th class='commentWindow ' rowspan='1'> Id Word </th>
    			<th class='commentWindow ' rowspan='1'> Original Word </th>
    			<th class='commentWindow ' rowspan='1'> Percentage of Correct Answers </th></tr>";
    for($j=0;$j<31;$j+=1){
    	echo "<tr class='cRow'>
    			<td>".strval($j+1)."</td>
    			<td>".$a[0]["cAns".strval($j+1)]."</td>
    			<td>".$pWarr[$j]."</td>
    	</tr>";
    }
    echo "</tbody></table>";
	
} else {
    echo "Sorry we could not find the data for your PIL please contact the principal Investigator at fss1g15@soton.ac.uk";
}
$conn->close();
?> 