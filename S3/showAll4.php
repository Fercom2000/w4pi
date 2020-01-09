 <?php
$lId=$_GET['p'];
$sql=htmlspecialchars($_POST['query']);
$servername = "srv01779.soton.ac.uk";
$username = "wppi";
$password = "zyfrmmSA0tHzIXmN";
$dbname = "wppi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$q="SELECT ".$lId;
$sql ="SELECT mtkCrwRevision.idCrwRevision,mtkCrwRevision.idReviser,
mtkCrwRevision.idLeaflet,mtkCrwRevision.idSentence,mtkCrwRevision.crwRevision,mtkCrwRevision.dateT,mtkCrwRevision.idGroup,mtkCrwRevision.flag,mtkClozeWords.idClozeW,mtkClozeWords.clozeField1,mtkClozeWords.clozeField2,mtkClozeWords.clozeField3,mtkClozeWords.clozeField4,mtkClozeWords.clozeField5,mtkClozeWords.clozeField6,mtkClozeWords.clozeField7,mtkClozeWords.clozeField8,mtkClozeWords.clozeField9,mtkClozeWords.clozeField10,mtkClozeWords.dateT as cDate,mtkClozeWords.idReviser as cReviser,mtkClozeWords.idLeaflet as cLeaflet,mtkClozeWords.idSentence as cSentence,mtkClozeWords.idGroup as cGroup, mtkClozeWords.flag as cFlag FROM mtkCrwRevision, mtkClozeWords WHERE mtkClozeWords.idReviser=mtkCrwRevision.idReviser AND mtkClozeWords.idGroup=mtkCrwRevision.idGroup AND mtkClozeWords.flag=mtkCrwRevision.flag AND mtkClozeWords.idSentence IN (2,15,27,227,283,333,343,433,455,263,359,470)";
echo"<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='./css/main.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
  <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
  <title>Web Platform for Public Involvement in Leaflet Design</title>
  <meta charset='utf-8'/>
</head>
<body>
  <header class='logo'></header>
    <nav class='menu'>
      <ul class='menuLi'>
        <li class='menuLi active'><a href='showRevisors.php'>Revisors</a></li>
        <li class='menuLi '><a href='showClzWords.php'>Cloze Words</a></li>
        <li class='menuLi '><a href='showCrwRevision.php'>Crowd Revisions</a></li>
        <li class='menuLi '><a href='showAll3.php'>Crowd & Revisions</a></li>
        <li class='contact'><span>Created by Fernando Santos, <a class='emailMenu' href='mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact'>fss1g15@soton.ac.uk</a>&nbsp;2018.</li>
      </ul>
    </nav>
  <div class='contentR'>
    <section class='instructions unselectable fixed'>
      <h2><center>Welcome to the W4PI Project</center></h2>
      
    </section>
    <section class='mainCenter80'>
      <form name=cform action='./showAll4.php' method='post'>
        <table>
          <tr>
          <th>
        <label>Write your Query:</label><br><br>
        <textarea name='query' id='query' rows='10' cols='100' class='commentForm AlignTab' required oninvalid='this.setCustomValidity('Please select some text to associate to your comment and click `make a comment` when it appears')'></textarea><br><br></th><th>
        <label>For Example:</label><br>
        <textarea name='example' id='example' rows='10' cols='100'>
          'SELECT mtkCrwRevision.idCrwRevision, mtkCrwRevision.idReviser, mtkCrwRevision.idLeaflet, mtkCrwRevision.idSentence, mtkCrwRevision.crwRevision, mtkCrwRevision.dateT, mtkCrwRevision.idGroup, mtkCrwRevision.flag, mtkClozeWords.idClozeW, mtkClozeWords.clozeField1, mtkClozeWords.clozeField2, mtkClozeWords.clozeField3, mtkClozeWords.clozeField4, mtkClozeWords.clozeField5, mtkClozeWords.clozeField6, mtkClozeWords.clozeField7, mtkClozeWords.clozeField8, mtkClozeWords.clozeField9, mtkClozeWords.clozeField10, mtkClozeWords.dateT as cDate, mtkClozeWords.idReviser as cReviser, mtkClozeWords.idLeaflet as cLeaflet, mtkClozeWords.idSentence as cSentence, mtkClozeWords.idGroup as cGroup,  mtkClozeWords.flag as cFlag FROM mtkCrwRevision,  mtkClozeWords WHERE mtkClozeWords.idReviser=mtkCrwRevision.idReviser AND mtkClozeWords.idGroup=mtkCrwRevision.idGroup AND mtkClozeWords.idSentence IN (2, 15, 27, 227, 283, 333, 343, 433, 455, 263, 359, 470)'
        </textarea></th>
        <th>
        <input type='submit' value='SEND'><br></th></tr>
        </form>";
 /*"SELECT mtkClozeWords.*,mtkCrwRevision.idCrwRevision,mtkCrwRevision.idReviser,mtkCrwRevision.idLeaflet,mtkCrwRevision.idSentence,mtkCrwRevision.crwRevision,mtkCrwRevision.dateT,mtkCrwRevision.idGroup,mtkCrwRevision.flag, FROM mtkCrwRevision LEFT JOIN mtkClozeWords ON mtkCrwRevision.idReviser=mtkClozeWords.idReviser AND mtkCrwRevision.idSentence=mtkClozeWords.idSentence AND mtkClozeWords.flag='123'";*/
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo ("<style>.commentWindow {    
            border: 1px solid black;
            padding:15px}
        </style>
        <table  class='commentWindow'>
            <tr class='cRow fixed'>
                <th class='commentWindow small'>Id</th>
                <th class='commentWindow big'>Reviser</th>
                <th class='commentWindow big'>Leaflet</th>
                <th class='commentWindow big'>Sentence</th>
                <th class='commentWindow big'>Revised Sentence</th>
                <th class='commentWindow big'>Submission Time</th>
                <th class='commentWindow big'>Group</th>
                <th class='commentWindow big'>Flag</th>
                <th class='commentWindow small'>Id Cloze</th>
                <th class='commentWindow big'>Reviser Cloze</th>
                <th class='commentWindow big'>Leaflet Cloze</th>
                <th class='commentWindow big'>Sentence Cloze</th>
                <th class='commentWindow big'>W1</th>
                <th class='commentWindow big'>W2</th>
                <th class='commentWindow big'>W3</th>
                <th class='commentWindow big'>W4</th>
                <th class='commentWindow big'>W5</th>
                <th class='commentWindow big'>W6</th>
                <th class='commentWindow big'>W7</th>
                <th class='commentWindow big'>W8</th>
                <th class='commentWindow big'>W9</th>
                <th class='commentWindow big'>W10</th>
                <th class='commentWindow big'>Submission Time Cloze</th>
                <th class='commentWindow big'>Group Cloze</th>
                <th class='commentWindow big'>Flag Cloze</th>
            </tr>");
    echo "<tbody class='pDiv' id='pCom0'>";
    while($row = $result->fetch_assoc()) {
		echo ("<tr class='cRow'><td class='commentWindow small'>"
              . $row["idCrwRevision"]."</td><td class='commentWindow'>"
              . $row["idReviser"]."</td><td class='commentWindow'>"
              . $row["idLeaflet"]."</td><td class='commentWindow'>"
              . $row["idSentence"]."</td><td class='commentWindow'>"
              . $row["crwRevision"]."</td><td class='commentWindow'>"
              . $row["dateT"]."</td><td class='commentWindow'>"
              . $row["idGroup"]."</td><td class='commentWindow'>"
              . $row["flag"]."</td><td class='commentWindow'>"
              . $row["idClozeW"]."</td><td class='commentWindow'>"
              . $row["cReviser"]."</td><td class='commentWindow'>"
              . $row["cLeaflet"]."</td><td class='commentWindow'>"
              . $row["cSentence"]."</td><td class='commentWindow'>"
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
              . $row["cDate"]."</td><td class='commentWindow'>"
              . $row["cGroup"]."</td><td class='commentWindow'>"
              . $row["cFlag"]."</td></tr>");        
    }
    echo "</tbody>";
	echo "<h3>These are the comments associated to the paragraphs in the current section, if you wish to see the comments for another section just click it</h3><br>";
} else {
    echo "<h2> There are no comments for this paragraph, if you wish to see the comments given to another paragraph just click it</h2><br><br><h3>If you want to add a new comment please select a section of text and click the 'Comment' button</h3><br>";
}
$conn->close();
echo"</section>
    <footer class='footer'>
      <span>Proudly created with the sponsorship of <a href='https://www.conacyt.gob.mx/' target='_blank' data-content='https://www.conacyt.gob.mx/' data-type='external' rel='nofollow'>CONACYT&nbsp;</a> and <a href='https://www.southampton.ac.uk/' target='_blank' data-content='https://www.southampton.ac.uk/' data-type='external' rel='nofollow'>The University of Southampton&nbsp;</a><span style='display:none;'>&nbsp;</span> by Fernando Santos, <a class='emailPI' href='mailto:fs1g15@soton.ac.uk&subject=W2Pi Contact'>fss1g15@soton.ac.uk</a>&nbsp;2018.</span>
    </footer>
  </div>
</body>
</html>";
?> 


