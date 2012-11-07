<?php
interface IDisplay{
    public function set_subtitle($int, $start, $dur, $end, $message);
    public function set_lang($name,$code);
}