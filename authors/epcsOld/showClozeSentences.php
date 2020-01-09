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
    //print_r($a);
    //echo "<br><br>";
    for($i=0;$i<31;$i+=1){
    	$pWarr[$i]=intval($pWarr[$i]/$nRev*100);
    	//echo $a[0]["cAns".strval($i+1)], " ",$pWarr[$i];
    }
    for($i=0;$i<31;$i+=1){
    	if($pWarr[$i]>=75){
    		$a[0]["cAns".strval($i+1)]='<span class="cf green" id="cf1" name="cf1" rows="1" size="10">'.$a[0]["cAns".strval($i+1)].'</span>';
    	}elseif ($pWarr[$i]>=50) {
    		$a[0]["cAns".strval($i+1)]='<span class="cf yellow" id="cf1" name="cf1" rows="1" size="10">'.$a[0]["cAns".strval($i+1)].'</span>';
    	}else{
    		$a[0]["cAns".strval($i+1)]='<span class="cf red" id="cf1" name="cf1" rows="1" size="10">'.$a[0]["cAns".strval($i+1)].'</span>';
    	}
    }  
    if(intval($lId)==1){
		echo '
			<div class="paragraphCS cf1" id="s1">'.$t1[0].$a[0]["cAns1"].$t1[1].$a[0]["cAns2"].$t1[2].$a[0]["cAns3"].$t1[3].$a[0]["cAns4"].$t1[4].$a[0]["cAns5"].$t1[5].$a[0]["cAns6"].$t1[6].'
			</div>
			<div class="paragraphCS cf2" id="s2">'.$t1[7].$a[0]["cAns7"].$t1[8].$a[0]["cAns8"].$t1[9].$a[0]["cAns9"].$t1[10].$a[0]["cAns10"].$t1[11].$a[0]["cAns11"].$t1[12].$a[0]["cAns12"].$t1[13].$a[0]["cAns13"].$t1[14].$a[0]["cAns14"].$t1[15].$a[0]["cAns15"].$t1[16].'
			</div>
			<div class="paragraphCS cf3" id="s3">'.$t1[17].$a[0]["cAns16"].$t1[18].$a[0]["cAns17"].$t1[19].$a[0]["cAns18"].$t1[20].$a[0]["cAns19"].$t1[21].$a[0]["cAns20"].$t1[22].$a[0]["cAns21"].$t1[23].$a[0]["cAns22"].$t1[24].$a[0]["cAns23"].$t1[25].'
				</div>
			<div class="paragraphCS cf4" id="s4">'.$t1[26].$a[0]["cAns24"].$t1[27].$a[0]["cAns25"].$t1[28].$a[0]["cAns26"].$t1[29].$a[0]["cAns27"].$t1[30].$a[0]["cAns28"].$t1[31].$a[0]["cAns29"].$t1[32].$a[0]["cAns30"].$t1[33].$a[0]["cAns31"].$t1[34].$a[0]["cAns32"].$t1[35].'
			</div>';
	}elseif (intval($lId)==2) {
		echo '
			<div class="paragraphCS cf1" id="s1">'.$t2[0].$a[0]["cAns1"].$t2[1].$a[0]["cAns2"].$t2[2].$a[0]["cAns3"].$t2[3].$a[0]["cAns4"].$t2[4].$a[0]["cAns5"].$t2[5].$a[0]["cAns6"].$t2[6].$a[0]["cAns7"].$t2[7].$a[0]["cAns8"].$t2[8].'
			</div>
			<div class="paragraphCS cf2" id="s2">'.$t2[9].$a[0]["cAns9"].$t2[10].$a[0]["cAns10"].$t2[11].$a[0]["cAns11"].$t2[12].$a[0]["cAns12"].$t2[13].$a[0]["cAns13"].$t2[14].$a[0]["cAns14"].$t2[15].$a[0]["cAns15"].$t2[16].$a[0]["cAns16"].$t2[17].'
			</div>
			<div class="paragraphCS cf3" id="s3">'.$t2[18].$a[0]["cAns17"].$t2[19].$a[0]["cAns18"].$t2[20].$a[0]["cAns19"].$t2[21].$a[0]["cAns20"].$t2[22].$a[0]["cAns21"].$t2[23].$a[0]["cAns22"].$t2[24].$a[0]["cAns23"].$t2[25].$a[0]["cAns24"].$t2[26].'
				</div>
			<div class="paragraphCS cf4" id="s4">'.$t2[27].$a[0]["cAns25"].$t2[28].$a[0]["cAns26"].$t2[29].$a[0]["cAns27"].$t2[30].$a[0]["cAns28"].$t2[31].$a[0]["cAns29"].$t2[32].$a[0]["cAns30"].$t2[33].$a[0]["cAns31"].$t2[34].$a[0]["cAns32"].$t2[35].'
			</div>';
	}elseif (intval($lId)==3) {
		echo '
			<div class="paragraphCS cf1" id="s1">'.$t3[0].$a[0]["cAns1"].$t3[1].$a[0]["cAns2"].$t3[2].$a[0]["cAns3"].$t3[3].$a[0]["cAns4"].$t3[4].$a[0]["cAns5"].$t3[5].$a[0]["cAns6"].$t3[6].$a[0]["cAns7"].$t3[7].'
			</div>
			<div class="paragraphCS cf2" id="s2">'.$t3[8].$a[0]["cAns8"].$t3[9].$a[0]["cAns9"].$t3[10].$a[0]["cAns10"].$t3[11].$a[0]["cAns11"].$t3[12].$a[0]["cAns12"].$t3[13].$a[0]["cAns13"].$t3[14].$a[0]["cAns14"].$t3[15].'
			</div>
			<div class="paragraphCS cf3" id="s3">'.$t3[16].$a[0]["cAns15"].$t3[17].$a[0]["cAns16"].$t3[18].$a[0]["cAns17"].$t3[19].$a[0]["cAns18"].$t3[20].$a[0]["cAns19"].$t3[21].$a[0]["cAns20"].$t3[22].$a[0]["cAns21"].$t3[23].'
				</div>
			<div class="paragraphCS cf4" id="s4">'.$t3[24].$a[0]["cAns22"].$t3[25].$a[0]["cAns23"].$t3[26].$a[0]["cAns24"].$t3[27].$a[0]["cAns25"].$t3[28].$a[0]["cAns26"].$t3[29].$a[0]["cAns27"].$t3[30].'
				</div>
			<div class="paragraphCS cf5" id="s5">'.$t3[31].$a[0]["cAns28"].$t3[32].$a[0]["cAns29"].$t3[33].$a[0]["cAns30"].$t3[34].$a[0]["cAns31"].$t3[35].$a[0]["cAns32"].$t3[36].'
			</div>';
	}else{
		echo '
			<div class="paragraphCS cf1" id="s1">'.$t4[0].$a[0]["cAns1"].$t4[1].$a[0]["cAns2"].$t4[2].$a[0]["cAns3"].$t4[3].$a[0]["cAns4"].$t4[4].$a[0]["cAns5"].$t4[5].$a[0]["cAns6"].$t4[6].$a[0]["cAns7"].$t4[7].$a[0]["cAns8"].$t4[8].$a[0]["cAns9"].$t4[9].$a[0]["cAns10"].$t4[10].$a[0]["cAns11"].$t4[11].'
			</div>
			<div class="paragraphCS cf2" id="s2">'.$t4[12].$a[0]["cAns12"].$t4[13].$a[0]["cAns13"].$t4[14].$a[0]["cAns14"].$t4[15].$a[0]["cAns15"].$t4[16].$a[0]["cAns16"].$t4[17].$a[0]["cAns17"].$t4[18].$a[0]["cAns18"].$t4[19].$a[0]["cAns19"].$t4[20].'
			</div>
			<div class="paragraphCS cf3" id="s3">'.$t4[21].$a[0]["cAns20"].$t4[22].$a[0]["cAns21"].$t4[23].$a[0]["cAns22"].$t4[24].$a[0]["cAns23"].$t4[25].$a[0]["cAns24"].$t4[26].$a[0]["cAns25"].$t4[27].$a[0]["cAns26"].$t4[28].'
				</div>
			<div class="paragraphCS cf4" id="s4">'.$t4[29].$a[0]["cAns27"].$t4[30].$a[0]["cAns28"].$t4[31].$a[0]["cAns29"].$t4[32].$a[0]["cAns30"].$t4[33].$a[0]["cAns31"].$t4[34].$a[0]["cAns32"].$t4[35].'
			</div>';
	}
	
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
?> 