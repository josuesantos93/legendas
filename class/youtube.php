<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xml
 *
 * @author josue
 */
 //classe revisionado
class Youtube implements IFile{
    private $lang = NULL;
    private $srt = NULL;
    private $tube_id = NULL;

    public function __construct($url) {
        $this->tube_id = $url;
    }

    public function setLang(){
        $this->lang = $this->openRequest("http://video.google.com/timedtext?type=list&v=$this->tube_id");
        return (is_object($this->lang)) ? TRUE : FALSE;
    }

    public function setFile($language){
        $this->srt = $this->openRequest("http://video.google.com/timedtext?type=track&v=$this->tube_id&name=&lang=$language");
        return (is_object($this->srt)) ? TRUE : FALSE;
    }
    
    public function getLang(){
	return $this->lang;
    }
    
    public function getFile(){
	return $this->srt;    
    }   
    
    private function openRequest($url){
        $data = file_get_contents($url);
        try {
            $data = new SimpleXMLElement($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $data;
    }        
}
?>
