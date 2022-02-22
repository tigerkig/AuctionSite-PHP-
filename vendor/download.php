<?php
$myFile='sample.csv';
header('HTTP/1.1 200 OK');
        header('Cache-Control: no-cache, must-revalidate');
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=$myFile");
        readfile('../csv_file/' . $myFile);
        exit;
?>