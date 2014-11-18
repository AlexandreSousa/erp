<?php
/**
 * Conexão com banco de dados
 */

$host       = 'mysql.rapidserver.com.br';
$user       = 'datainf_master';
$pw         = 'M1000sfpo';
$db         = 'datainf_db_sec';

$mysqli = new mysqli($host,$user,$pw,$db);