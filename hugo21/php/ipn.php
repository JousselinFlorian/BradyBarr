<?php

// CONFIG: Enable debug mode. This means we'll log requests into 'ipn.log' in the same directory.
// Especially useful if you encounter network errors or other intermittent problems with IPN (validation).
// Set this to 0 once you go live or don't require logging.

define("DEBUG", 0);

// Set to 0 once you're ready to go live

define("LOG_FILE", "./ipn.log");

// Read POST data
// reading posted data directly from $_POST causes serialization
// issues with array data in POST. Reading raw POST data from input stream instead.


$req = 'cmd=_notify-validate';
$email_account = "management@hugo21.fr";

foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
        $req.="&$key=$value";
}

$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30 );

session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

$_SESSION['name'] = $_POST['item_name'];
$_SESSION['receiver_email'] = $_POST['receiver_email'];
$_SESSION['payment_status'] = $_POST['payment_status'];
$_SESSION['txn_id'] = $_POST['txn_id'];

$item_number = $_POST['item_number'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$payer_email = $_POST['payer_email'];


if (!fp){
    
}
else {
    fputs($fp, $header, $req);
    while(!feof($fp)) {
        $res = fgets($fp, 1024);
        if (strcmp ($res, "VERIFIED") == 0) {
                // check whether the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment and mark item as paid.
                // assign posted variables to local variables


                if (payment_status == "Completed"){
                    if ($email_account == receiver_email){
                        if ($payment_amout == '0.99' || $payment_amount == '9.99' ){
                            
                        }
                    }
                }
                else
                if(DEBUG == true) {
                        error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
                }
        } else if (strcmp ($res, "INVALID") == 0) {
                // log for manual investigation
                // Add business logic here which deals with invalid IPN messages
                if(DEBUG == true) {
                        error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
                }


                }
    }
}

fclose($fp);
?>