<?php
include 'class/IDisplaySrt.php';
include 'class/IFileSrt.php';
include 'class/openXML.php';
include 'class/subtitle.php';
include 'class/xmlSRT.php';


$query = parse_url($_POST['url']);
parse_str($query['query'],$output);

if($query['host'] === 'www.youtube.com'){
    $subtitle = new SubTitle();    
    
    $openXML = new openXML($output['v']);
    
    $var = $openXML->set_srt('pt-BR');
    
    if($var === TRUE){
        $dat = new XmlToSrt($openXML,$subtitle);
        $dat1 = $dat->conversion();
        $subtitle->show_srt($dat1, count($dat1));
    }
    
}else{
    //meng error
}
?>
