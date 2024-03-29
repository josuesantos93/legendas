<?php
/**
* 
*/
class Srt extends Subtitle
{
	/*
	//Converter entidades Srt Para Xml
	*/
    public function conversionXML($file_xml)
    {
    	$i = 1;
        $legenda = NULL;

        foreach($file_xml AS $var):
            $int     = $i++;
            $start   = $this->time_rule((double)$var['start']);
            $dur     = $this->time_rule((double)$var['dur']);
            $end     = $this->time_rule((double)$var['start'] + (double)$var['dur']);
            $message = (string)$var;
            
            $legenda[] = $this->set_subtitle($int, $start, $dur, $end, $message);         
            
        endforeach;

        return $legenda;
    }

    public function langXML($file){
    	$return = NULL;

        foreach($file as $lang):
            $name = (string)$lang[0]['lang_original'];
            $code = (string)$lang[0]['lang_code'];
            $return[] = $this->set_lang($name,$code);
        endforeach;

        return $return;
    }

    /*
    //Exibir Os Dados Apos Convertidos
	*/
    public function showSrt($srt, $total){
        for($n = 0; $n < $total; $n++){
            echo $srt[$n]['int']."\n";
            echo $srt[$n]['start'] .' --> '.$srt[$n]['end']."\n";
            echo $srt[$n]['message']."\n";
            echo "\n";
        }
    }


    private function number_replace($sec,$min,$hour){
        (!isset($sec)) ? $sec = '0,000' : $sec;//verifica se a variavel existe
        (!isset($min)) ? $min = '0:' : $min.=':';//verifica se a variavel existe
        (!isset($hour)) ? $hour = '0:' : $hour.=':';//verifica se a variavel existe
        
        
        ($sec < 10) ? $sec = '0' . $sec : $sec;//verifica digito do $sec e acrenta zero se for menor q 10
        ($min < 10) ? $min = '0' . $min : $min;//verifica digito do $min e acrenta zero se for menor q 10
        ($hour < 10) ? $hour = '0' . $hour : $hour;//verifica digito do $hour e acrenta zero se for menor q 10
        
        //junta todas as variaves para retorno
        $time = NULL;
        $time .= $hour;
        $time .= $min;
        $time .= $sec;
        return $time;
    }
    
    private function number_format($sec,$min,$hour){ 
        return str_replace('.',',', $this->number_replace(number_format($sec,3,'.',''),$min,$hour));;  
    }
    
    //regra de tres para calcular o tempo em horas e tratalo
    private function time_rule($time){
        $hour = floor($time/3600);//divisão retornando parte inteira.
        $hour_rest = fmod($time, 3600);//divisão retornando restante
        $min = floor($hour_rest/60); // calculo de minutos apartir do restante de horas
        $sec = fmod($hour_rest, 60); // calculos dos segundos
        return $this->number_format($sec,$min,$hour);
    }

}
?>
