<?php

$fileArray= array("main.pdf","insert.pdf");

$datadir = 'bulletins/';
$outputName = $datadir.'merged.pdf';

$cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=$outputName ";

foreach($fileArray as $file) {
    $cmd .= $file." ";
    echo('.');
}

shell_exec($cmd);

echo('done');

?>
