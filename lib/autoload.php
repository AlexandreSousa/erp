<?php
function __autoload($classe){
    if(file_exists("lib/mvc/control/".$classe.".Class.php")):
        include_once("lib/mvc/control/".$classe.".Class.php");

    endif;

    if(file_exists("lib/mvc/model/".$classe.".Class.php")):
        include_once("lib/mvc/model/".$classe.".Class.php");
    endif;
}