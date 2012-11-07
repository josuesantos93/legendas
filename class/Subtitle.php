<?php

abstract class Subtitle implements IDisplay{
    private $Subtitle = NULL;
    private $lang = NULL;
    
    public function set_subtitle($int, $start, $dur, $end, $message){
        $this->Subtitle['int'] = $int;
        $this->Subtitle['start'] = $start;
        $this->Subtitle['dur'] = $dur;
        $this->Subtitle['end'] = $end;
        $this->Subtitle['message'] = $message;
        
        return $this->Subtitle;
    }
    
    public function set_lang($name,$code){
        $this->lang['code'] = $code;
        $this->lang['name'] = $name;
        
        return $this->lang;
    }

}
?>
