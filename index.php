<?php 
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

    require_once('include/config.php');

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ERROR | E_PARSE | E_WARNING );

?>
<!DOCTYPE html>
<html lang='pt=br'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <?php 
    include('include/load_css.php');
    include('include/load_js.php');
    include('include/load_bootstrap.php');
    include('include/autoload.php');
    ?>
</head>
    <body>
  <div id="barraTop">

      <div class="span12 margin-auto">

        <div class="row">

        <div class="span6 userDados visible-desktop">&nbsp;<span class="icoUser">&nbsp;</span>Olá <strong><?php echo  $_SESSION['usuarioNome']; ?></strong> <a href="administradores.php?acao=meusDados" style="color:#0099FF"><strong>Meus Dados</strong></a> | <a href="sair.php" style="color:#0099FF"><strong>Sair</strong></a></span></div>

        <div class="span6 text-right userAcesso visible-desktop">Último acesso em 04/09/2014 23:16:29&nbsp;</div>

        <!-- **-->

        </div>

      </div>

    </div>
    
  <div style="margin-top:5px; "></div>

<div class="container">
<!-- Single button -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th nowrap="nowrap"><?php include 'menu.php'; ?></th>
    </tr>
  <tr>
    <td width="74%" valign="top">
      <div style="margin-left:0px">
        <?php
    $var = "principal.php";
    $pg = "$_GET[pg].php";
    if(empty($_SERVER["QUERY_STRING"])) {
        include($var);
    } else {
        include("modulos/$pg");
    }
    ?>
        </div>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
      
    </body>
</html>