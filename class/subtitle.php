<?php

class SubTitle implements IDisplay{
    private $srt = NULL;
    private $lang = NULL;
    
    public function set_srt($int, $start, $dur, $end, $message){
        $this->srt['int'] = $int;
        $this->srt['start'] = $start;
        $this->srt['dur'] = $dur;
        $this->srt['end'] = $end;
        $this->srt['message'] = $message;
        
        return $this->srt;
    }
    
    public function set_lang($name,$code){
        $this->lang['code'] = $code;
        $this->lang['name'] = $name;
        
        return $this->lang;
    }
    
    public function show_srt($srt, $total){
        for($n = 0; $n < $total; $n++){
            echo $srt[$n]['int']."\n";
            echo $srt[$n]['start'] .' --> '.$srt[$n]['end']."\n";
            echo $srt[$n]['message']."\n";
            echo "\n";
        }
    }
}
?>
