

<?php
        require 'PHPMailerAutoload.php';

        $to = 'gastonrivoire@gmail.com';
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'hugo21test@gmail.com';
	$mail->Password = 'popsex21'; 
	$mail->SetFrom('management@hugo21.fr', 'HUGO21');
	$mail->Subject = 'coucou';
	$mail->Body = 'Bonjour !!';
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
        echo "message sent";
        
//
//        $email_account = "management@hugo21.fr";
//        echo $email_account;  
//        $boundary = "_".md5 (uniqid (rand())); 
//        $to = 'gastonrivoire@gmail.com';
//        $subject = 'coucou';
//        //$path = './A la bank zéro.zip';
        
//        if (file_exists($path)) {
//            $finfo = finfo_open(FILEINFO_MIME_TYPE);
//            $ftype = finfo_file($finfo, $path);
//            $file = fopen($path, "r");
//            $attachment = fread($file, filesize($path));
//            $attachment = chunk_split(base64_encode($attachment));
//            fclose($file);
//        } else {
//            echo 'file error';
//        }
//
//        $message = 'Bonjour !';
//
//      //  $attached = "\n\n". "--" .$boundary . "\nContent-Type: application; name=\"$name\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"$name\"\r\n\n".$attachement . "--" . $boundary . "--"; 
//
//        $headers ="From: ".$email_account." \r\n"; 
//       $headers = 'From: management@hugo21.fr' . "\r\n" .
//        'Reply-To: gastonrivoire@gmail.com' . "\r\n" .
//        'X-Mailer: PHP/' . phpversion();
//     //   $body = "--". $boundary ."\nContent-Type: text/plain; charset=ISO-8859-1\r\n\n".$message . $attached; 
//
////       
//        mail($email,$subject,$message,$headers);
//        
//        echo "mail sent !!";
//        
        
        
        
 
?>