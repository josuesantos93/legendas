<?php
include 'class/IDisplay.php';
include 'class/IFile.php';
include 'class/IConversion.php';
include 'class/youtube.php';
include 'class/subtitle.php';
include 'class/xmlsrt.php';

$subtitle = new SubTitle();

$openXML = new Youtube('7y2KsU_dhwI');
$var = $openXML->setFile('pt-BR');

$dat = new XmlToSrt($openXML,$subtitle);
$dat1 = $dat->conversionFile();
$subtitle->show_srt($dat1, count($dat1));
/*
$subtitle = new SubTitle();

$openXML = new openXML('7y2KsU_dhwI');
$openXML->set_lang();

$dat = new XmlToSrt($openXML,$subtitle);
$data = $dat->conversionLang();
var_dump($data);
*/