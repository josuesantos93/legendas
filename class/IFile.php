<?php
interface IFile{
    public function __construct($url);
    
    public function setLang();
    
    public function setFile($language);
    
    public function getLang();
    
    public function getFile();
    
    
}