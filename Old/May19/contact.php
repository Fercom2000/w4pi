<?php
	$name=htmlspecialchars($_POST['Name']);
	$email=htmlspecialchars($_POST['Email']);
	$mess=htmlspecialchars($_POST['Message']);
	$success="";

	if(mail("fercom2000@gmail.com","W2Pi Author Request",$name."\n".$email."\n".$mess,"From:fss1g15@soton.ac.uk")){
		$success="Message sent, thank you for contacting us!";
		$name=$email=$mess="";
	}
?>