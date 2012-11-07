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
class Conversion implements IConversion{
    private $subtitle = NULL;
    private $file = NULL;
    
    public function __construct(IFile $file, IDisplay $subtitle){
        $this->file = $file;
        $this->subtitle = $subtitle;

    }
    
    public function conversionFile(){
        $type = 'conversion' . $this->file->filetype;
        $this->method_test($type);
        $file = $this->subtitle->$type($this->file->getFile());

        return $file;
    }
    
    public function conversionLang(){
        $type = 'lang' . $this->file->filetype;
        $this->method_test($type);
        $lang = $this->subtitle->$type($this->file->get_lang());

        return $lang;
    }

    private function method_test($name){
        if(!method_exists($this->subtitle, $name)){
            exit('Method Not Found');
        }
    }
  
}
?>
