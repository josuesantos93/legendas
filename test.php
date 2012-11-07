<?php
include 'class/IDisplay.php';
include 'class/IFile.php';
include 'class/IConversion.php';
include 'class/Youtube.php';
include 'class/Subtitle.php';
include 'class/Srt.php';
include 'class/Conversion.php';
/*
$subtitle = new Srt();

$openXML = new Youtube('7y2KsU_dhwI');
$var = $openXML->setFile('pt-BR');

$dat = new Conversion($openXML,$subtitle);
$dat1 = $dat->conversionFile();
$subtitle->showSrt($dat1, count($dat1));
*/

$subtitle = new Srt();

$openXML = new Youtube('7y2KsU_dhwI');
$openXML->setLang();

$dat = new Conversion($openXML,$subtitle);
$data = $dat->conversionLang();
var_dump($data);

