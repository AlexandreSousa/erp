<?php

$host       = getenv('IP');
$user       = 'alexandresousa';
$pass       = '';
$base       = 'sgga2';

$mysqli = new mysqli($host,$user,$pass,$base);



/**
 * @param string $css      Caregar arquivo css
 */
$css        =   1;

/**
 * @param string $js    Carregar aquivos js
 */
 $js        =   1;
 /**
  * @param string $bootstrap    Carregar aquivos do bootstrap
  */
 
 $bootstrap =   1;