<?php
function __autoload($classe){
    if(file_exists("class/".$classe.".Class.php")):
        include_once("class/".$classe.".Class.php");

    endif;
}