<?php
interface IConversion{
    public function __construct(IFile $file, IDisplay $subtitle);
    public function conversionFile();
    public function conversionLang();
}