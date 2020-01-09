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
    $t1=array("University Hospital, Southampton NHS, NHS Fundation Trust Participant Information Sheet: adults with capacity "," who regain capacity Pragmatic "," controlled trial evaluating a  "," molecular Point-of-Care `test-and-treat` strategy  "," influenza in adults hospitalised "," acute respiratory illness: FluPOC  "," Investigator: Dr Tristan Clark  "," If you have a swab "," reveals that you have  "," virus, we may approach  "," again to ask if  ","  would give us permission  ","  take further nasal swabs,  ","  (if you are coughing  ","  sputum) and another blood test ( ","  half a tablespoon full)  ","  additional ethically approved research."," The symptoms and clinical  "," that you display are  "," with an `acute respiratory  "," ' ` and so we would  "," to test you for  "," wide variety of respiratory  "," (including influenza), which might  "," caused your illness, using  "," rapid point-of-care test. "," If you lose the  "," to consent and the  "," team wish to take  "," more samples from you,  "," we would have to  "," written permission from someone  "," to you, and you  "," have to agree that  "," could use them once  "," recovered.");
    $t2=array("We would also like  ","  ask your permission to  ","  information that is routinely  ","  about you by the NHS,  ","  as your clinical and  ","  details both through your  ","  records and national databases  ","  as NHS Digital and  ","  central UK bodies. "," Your hospital and the MSRG  ","  use your name, NHS  ","  and contact details to  ","  you about the research  "," , and make sure that  ","  information about the study  ","  recorded for your care,  ","  to oversee the quality  ","  the study. "," The only people in UHSFT  ","  the MSRG who will  ","  access to information that  ","  you will be people  ","  need to contact you  ","  send or request questionnaires,  ","  and analyse your data,  ","  audit the data collection  "," . "," We understand that this  ","  comes at a time  ","  you have a lot  ","  deal with already, but  ","  need to find out  ","  you are before your ",", so that we can  ","  out how your health  ","  well-being changes over time.");
    $t3=array("All personal details (such  ","  your name and address)  ","  be stored separately in  ","  filling cabinets and held  ","  computers which will be  ","  protected and only accessible  ","  members of the University  ","  Southampton research team.  ","  If, having read this  "," , you are happy to  ","  part, please complete the questionnaire  ","  return it to the  ","  at the workshop, or  ","  it to us at  ","  University of Southampton in  ","  pre-paid envelope provided.  ","  If you are happy  ","  take part in the interview,  ","  complete the reply slip  ","  return it to the  ","  at the workshop, or  ","  it us at the  ","  of Southampton in the pre-paid  ","  provided.  ","  It is unlikely that  ","  will benefit directly from  ","  part in this research,  ","  the results from the  ","  will help us to  ","  develop and improve services  ","  men with prostate cancer.  ","  We will not be  ","  to talk to everyone  ","  would like to talk  ","  men of different ages,  ","  have had different cancer  ","  and different levels of experience of computing.");
    $t4=array("The options for withdrawal  "," :<br> *No further contact- we  ","  no longer send you questionnaires,  ","  would still have your  ","  to retain and use  ","  provided so far and  ","  continue collect routine clinical  "," <br> Or<br> *No further use-  ","  would no longer contact  ","  in the future, and  ","  collected previously would no  ","  be available to researchers.  "," Processing your information for trials  ","  necessary for the performance  ","  a task carried out  ","  the public interest (General  ","  Protection Regulation (GDPR) Article 6(1)(e))  ","  under Article 9(2)(j) necessary for  ","  purposes in the public  "," , scientific or historical research  ","  in accordance with Article 89 (1).  "," We are also gathering  ","  for the TrueNTH Global Registry project  ","  is routinely collected by  ","  NHS, such as clinical  ","  treatment details both through  ","  records and national databases  ","  as the Health and Social Care Information Centre  ","  other central UK bodies.  "," The only people in  ","  University of Southampton who  ","  have access to information  ","  identifies you will be  ","  who need to contact you  ","  send or request questionnaires,  ","  and analyse your data, or audit the data collection process.");
    echo "<head>
	<link rel='stylesheet' type='text/css' href='./css/main.css'>
	<link rel='stylesheet' type='text/css' href='./css/author.css'>
        <style>
          body{    
            overflow:auto;
          }
          .wide{width:15vw;min-width:15vw;}
        </style>
</head><body>";
    while($row = $result->fetch_assoc()) {
    	if(intval($row["flag"]<1) and $revArr[$row['idReviewer']]){
    		$nRev+=1;
    		$a[]=$row;
    		if(intval($lId)==1){
				echo '<div class="blue">'.$row["idReviewer"].'</div><div>
					<div class="paragraphCS  cfs1" id="s1">'.$t1[0].'<span class="blue">'.$row["clozeField1"].'</span>'.$t1[1].'<span class="blue">'.$row["clozeField2"].'</span>'.$t1[2].'<span class="blue">'.$row["clozeField3"].'</span>'.$t1[3].'<span class="blue">'.$row["clozeField4"].'</span>'.$t1[4].'<span class="blue">'.$row["clozeField5"].'</span>'.$t1[5].'<span class="blue">'.$row["clozeField6"].'</span>'.$t1[6].'
					</div>
					<div class="paragraphCS   cfs2" id="s2">'.$t1[7].'<span class="blue">'.$row["clozeField7"].'</span>'.$t1[8].'<span class="blue">'.$row["clozeField8"].'</span>'.$t1[9].'<span class="blue">'.$row["clozeField9"].'</span>'.$t1[10].'<span class="blue">'.$row["clozeField10"].'</span>'.$t1[11].'<span class="blue">'.$row["clozeField11"].'</span>'.$t1[12].'<span class="blue">'.$row["clozeField12"].'</span>'.$t1[13].'<span class="blue">'.$row["clozeField13"].'</span>'.$t1[14].'<span class="blue">'.$row["clozeField14"].'</span>'.$t1[15].'<span class="blue">'.$row["clozeField15"].'</span>'.$t1[16].'
					</div>
					<div class="paragraphCS   cfs3" id="s3">'.$t1[17].'<span class="blue">'.$row["clozeField16"].'</span>'.$t1[18].'<span class="blue">'.$row["clozeField17"].'</span>'.$t1[19].'<span class="blue">'.$row["clozeField18"].'</span>'.$t1[20].'<span class="blue">'.$row["clozeField19"].'</span>'.$t1[21].'<span class="blue">'.$row["clozeField20"].'</span>'.$t1[22].'<span class="blue">'.$row["clozeField21"].'</span>'.$t1[23].'<span class="blue">'.$row["clozeField22"].'</span>'.$t1[24].'<span class="blue">'.$row["clozeField23"].'</span>'.$t1[25].'
						</div>
					<div class="paragraphCS   cfs4" id="s4">'.$t1[26].'<span class="blue">'.$row["clozeField24"].'</span>'.$t1[27].'<span class="blue">'.$row["clozeField25"].'</span>'.$t1[28].'<span class="blue">'.$row["clozeField26"].'</span>'.$t1[29].'<span class="blue">'.$row["clozeField27"].'</span>'.$t1[30].'<span class="blue">'.$row["clozeField28"].'</span>'.$t1[31].'<span class="blue">'.$row["clozeField29"].'</span>'.$t1[32].'<span class="blue">'.$row["clozeField30"].'</span>'.$t1[33].'<span class="blue">'.$row["clozeField31"].'</span>'.$t1[34].'<span class="blue">'.$row["clozeField32"].'</span>'.$t1[35].'
					</div></div>';
			}elseif (intval($lId)==2) {
				echo '
					<div class="paragraphCS   cfs1" id="s1">'.$t2[0].'<span class="blue">'.$row["clozeField1"].'</span>'.$t2[1].'<span class="blue">'.$row["clozeField2"].'</span>'.$t2[2].'<span class="blue">'.$row["clozeField3"].'</span>'.$t2[3].'<span class="blue">'.$row["clozeField4"].'</span>'.$t2[4].'<span class="blue">'.$row["clozeField5"].'</span>'.$t2[5].'<span class="blue">'.$row["clozeField6"].'</span>'.$t2[6].'<span class="blue">'.$row["clozeField7"].'</span>'.$t2[7].'<span class="blue">'.$row["clozeField8"].'</span>'.$t2[8].'
					</div>
					<div class="paragraphCS   cfs2" id="s2">'.$t2[9].'<span class="blue">'.$row["clozeField9"].'</span>'.$t2[10].'<span class="blue">'.$row["clozeField10"].'</span>'.$t2[11].'<span class="blue">'.$row["clozeField11"].'</span>'.$t2[12].'<span class="blue">'.$row["clozeField12"].'</span>'.$t2[13].'<span class="blue">'.$row["clozeField13"].'</span>'.$t2[14].'<span class="blue">'.$row["clozeField14"].'</span>'.$t2[15].'<span class="blue">'.$row["clozeField15"].'</span>'.$t2[16].'<span class="blue">'.$row["clozeField16"].'</span>'.$t2[17].'
					</div>
					<div class="paragraphCS   cfs3" id="s3">'.$t2[18].'<span class="blue">'.$row["clozeField17"].'</span>'.$t2[19].'<span class="blue">'.$row["clozeField18"].'</span>'.$t2[20].'<span class="blue">'.$row["clozeField19"].'</span>'.$t2[21].'<span class="blue">'.$row["clozeField20"].'</span>'.$t2[22].'<span class="blue">'.$row["clozeField21"].'</span>'.$t2[23].'<span class="blue">'.$row["clozeField22"].'</span>'.$t2[24].'<span class="blue">'.$row["clozeField23"].'</span>'.$t2[25].'<span class="blue">'.$row["clozeField24"].'</span>'.$t2[26].'
						</div>
					<div class="paragraphCS   cfs4" id="s4">'.$t2[27].'<span class="blue">'.$row["clozeField25"].'</span>'.$t2[28].'<span class="blue">'.$row["clozeField26"].'</span>'.$t2[29].'<span class="blue">'.$row["clozeField27"].'</span>'.$t2[30].'<span class="blue">'.$row["clozeField28"].'</span>'.$t2[31].'<span class="blue">'.$row["clozeField29"].'</span>'.$t2[32].'<span class="blue">'.$row["clozeField30"].'</span>'.$t2[33].'<span class="blue">'.$row["clozeField31"].'</span>'.$t2[34].'<span class="blue">'.$row["clozeField32"].'</span>'.$t2[35].'
					</div>';
			}elseif (intval($lId)==3) {
				echo '
					<div class="paragraphCS   cfs1" id="s1">'.$t3[0].'<span class="blue">'.$row["clozeField1"].'</span>'.$t3[1].'<span class="blue">'.$row["clozeField2"].'</span>'.$t3[2].'<span class="blue">'.$row["clozeField3"].'</span>'.$t3[3].'<span class="blue">'.$row["clozeField4"].'</span>'.$t3[4].'<span class="blue">'.$row["clozeField5"].'</span>'.$t3[5].'<span class="blue">'.$row["clozeField6"].'</span>'.$t3[6].'<span class="blue">'.$row["clozeField7"].'</span>'.$t3[7].'
					</div>
					<div class="paragraphCS   cfs2" id="s2">'.$t3[8].'<span class="blue">'.$row["clozeField8"].'</span>'.$t3[9].'<span class="blue">'.$row["clozeField9"].'</span>'.$t3[10].'<span class="blue">'.$row["clozeField10"].'</span>'.$t3[11].'<span class="blue">'.$row["clozeField11"].'</span>'.$t3[12].'<span class="blue">'.$row["clozeField12"].'</span>'.$t3[13].'<span class="blue">'.$row["clozeField13"].'</span>'.$t3[14].'<span class="blue">'.$row["clozeField14"].'</span>'.$t3[15].'
					</div>
					<div class="paragraphCS   cfs3" id="s3">'.$t3[16].'<span class="blue">'.$row["clozeField15"].'</span>'.$t3[17].'<span class="blue">'.$row["clozeField16"].'</span>'.$t3[18].'<span class="blue">'.$row["clozeField17"].'</span>'.$t3[19].'<span class="blue">'.$row["clozeField18"].'</span>'.$t3[20].'<span class="blue">'.$row["clozeField19"].'</span>'.$t3[21].'<span class="blue">'.$row["clozeField20"].'</span>'.$t3[22].'<span class="blue">'.$row["clozeField21"].'</span>'.$t3[23].'
						</div>
					<div class="paragraphCS   cfs4" id="s4">'.$t3[24].'<span class="blue">'.$row["clozeField22"].'</span>'.$t3[25].'<span class="blue">'.$row["clozeField23"].'</span>'.$t3[26].'<span class="blue">'.$row["clozeField24"].'</span>'.$t3[27].'<span class="blue">'.$row["clozeField25"].'</span>'.$t3[28].'<span class="blue">'.$row["clozeField26"].'</span>'.$t3[29].'<span class="blue">'.$row["clozeField27"].'</span>'.$t3[30].'
						</div>
					<div class="paragraphCS   cfs5" id="s5">'.$t3[31].'<span class="blue">'.$row["clozeField28"].'</span>'.$t3[32].'<span class="blue">'.$row["clozeField29"].'</span>'.$t3[33].'<span class="blue">'.$row["clozeField30"].'</span>'.$t3[34].'<span class="blue">'.$row["clozeField31"].'</span>'.$t3[35].'<span class="blue">'.$row["clozeField32"].'</span>'.$t3[36].'
					</div>';
			}else{
				echo '
					<div class="paragraphCS   cfs1" id="s1">'.$t4[0].'<span class="blue">'.$row["clozeField1"].'</span>'.$t4[1].'<span class="blue">'.$row["clozeField2"].'</span>'.$t4[2].'<span class="blue">'.$row["clozeField3"].'</span>'.$t4[3].'<span class="blue">'.$row["clozeField4"].'</span>'.$t4[4].'<span class="blue">'.$row["clozeField5"].'</span>'.$t4[5].'<span class="blue">'.$row["clozeField6"].'</span>'.$t4[6].'<span class="blue">'.$row["clozeField7"].'</span>'.$t4[7].'<span class="blue">'.$row["clozeField8"].'</span>'.$t4[8].'<span class="blue">'.$row["clozeField9"].'</span>'.$t4[9].'<span class="blue">'.$row["clozeField10"].'</span>'.$t4[10].'<span class="blue">'.$row["clozeField11"].'</span>'.$t4[11].'
					</div>
					<div class="paragraphCS   cfs2" id="s2">'.$t4[12].'<span class="blue">'.$row["clozeField12"].'</span>'.$t4[13].'<span class="blue">'.$row["clozeField13"].'</span>'.$t4[14].'<span class="blue">'.$row["clozeField14"].'</span>'.$t4[15].'<span class="blue">'.$row["clozeField15"].'</span>'.$t4[16].'<span class="blue">'.$row["clozeField16"].'</span>'.$t4[17].'<span class="blue">'.$row["clozeField17"].'</span>'.$t4[18].'<span class="blue">'.$row["clozeField18"].'</span>'.$t4[19].'<span class="blue">'.$row["clozeField19"].'</span>'.$t4[20].'
					</div>
					<div class="paragraphCS   cfs3" id="s3">'.$t4[21].'<span class="blue">'.$row["clozeField20"].'</span>'.$t4[22].'<span class="blue">'.$row["clozeField21"].'</span>'.$t4[23].'<span class="blue">'.$row["clozeField22"].'</span>'.$t4[24].'<span class="blue">'.$row["clozeField23"].'</span>'.$t4[25].'<span class="blue">'.$row["clozeField24"].'</span>'.$t4[26].'<span class="blue">'.$row["clozeField25"].'</span>'.$t4[27].'<span class="blue">'.$row["clozeField26"].'</span>'.$t4[28].'
						</div>
					<div class="paragraphCS   cfs4" id="s4">'.$t4[29].'<span class="blue">'.$row["clozeField27"].'</span>'.$t4[30].'<span class="blue">'.$row["clozeField28"].'</span>'.$t4[31].'<span class="blue">'.$row["clozeField29"].'</span>'.$t4[32].'<span class="blue">'.$row["clozeField30"].'</span>'.$t4[33].'<span class="blue">'.$row["clozeField31"].'</span>'.$t4[34].'<span class="blue">'.$row["clozeField32"].'</span>'.$t4[35].'
					</div>';
			}
			
		}
    }
    echo "</body>";
} else {
    echo "Sorry we could not find the data from your PIL please contact the principal investigator at fss1g15@soton.ac.uk";
}
$conn->close();
?> 