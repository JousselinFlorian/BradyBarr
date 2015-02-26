

<?php
    $song = "../Song30s/".$_GET['file_name'];
    echo $song;
if(file_exists($song))
 {
    header ("Content-type: octet/stream");
    header ("Content-disposition: attachment; filename=".$song);
    header("Content-Length: ".filesize($song));
    readfile($song);
    exit;
 }
 else
  require('erreur.php');
?>