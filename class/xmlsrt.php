<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of time
 *
 * @author josue
 */
 //reformatar e refazer metodos
class XmlToSrt implements IConversion{
    
    private $srt = NULL;
    private $lang = NULL;
    private $subtitle = NULL;
    private $xml = NULL;
    
    public function __construct(IFile $file, IDisplay $subtitle){
        $this->xml = $file;
        $this->subtitle = $subtitle;
    }
    
    public function conversionFile(){
        $this->srt = $this->xml->getFile();       
        
        $legenda = NULL;
        $i = 1;
        
        foreach($this->srt AS $var):
            $int     = $i++;
            $start   = $this->time_rule((double)$var['start']);
            $dur     = $this->time_rule((double)$var['dur']);
            $end     = $this->time_rule((double)$var['start'] + (double)$var['dur']);
            $message = (string)$var;
            
            $legenda[] = $this->subtitle->set_srt($int, $start, $dur, $end, $message);         
            
        endforeach;
        
        return $legenda;
    }
    
    public function conversionLang(){
        $this->lang = $this->xml->get_lang();
        
        $return = NULL;       
        foreach($this->lang as $lang):
            $name = (string)$lang[0]['lang_original'];
            $code = (string)$lang[0]['lang_code'];
            $return[] = $this->subtitle->set_lang($name,$code);
        endforeach;
        
        return $return;
    }
    
    private function number_replace($sec,$min,$hour){
        (!isset($sec)) ? $sec = '0,000' : $sec;//verifica se a variavel existe
        (!isset($min)) ? $min = '0:' : $min.=':';//verifica se a variavel existe
        (!isset($hour)) ? $hour = '0:' : $hour.=':';//verifica se a variavel existe
        
        
        ($sec < 10) ? str_pad($sec,6,0,STR_PAD_LEFT) : $sec;//verifica digito do $sec e acrenta zero se for menor q 10
        ($min < 10) ? str_pad($min,3,0,STR_PAD_LEFT) : $min;//verifica digito do $min e acrenta zero se for menor q 10
        ($hour < 10) ? str_pad($hour,3,0,STR_PAD_LEFT) : $hour;//verifica digito do $hour e acrenta zero se for menor q 10
        
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
