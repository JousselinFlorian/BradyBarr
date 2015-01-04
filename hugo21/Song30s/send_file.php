

<?php
$file = $_GET['file'];
if(file_exists($file))
 {
    header ("Content-type: octet/stream");
    header ("Content-disposition: attachment; filename=".$file.";");
    header("Content-Length: ".filesize($file));
    readfile($file);
    exit;
 }
 else
  require('erreur.php');
?>