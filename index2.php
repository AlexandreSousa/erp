<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<?php require_once('Connections/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerencia Web</title>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.3.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
            $("#telefone").mask("(99) 9999-9999");     // Máscara para TELEFONE
            $("#cep").mask("99999-999");    // Máscara para CEP
            $("#data").mask("99/99/9999");    // Máscara para DATA
			      $("#data_f").mask("99/99/9999");    // Máscara para DATA
            $("#cnpj").mask("99.999.999/9999-99");    // Máscara para CNPJ
            $('#rg').mask('99.999.999-9');    // Máscara para RG
            $('#agencia').mask('9999-9');    // Máscara para AGÊNCIA BANCÁRIA
            $('#conta').mask('99.999-9');    // Máscara para CONTA BANCÁRIA
		      	$('#hora').mask('99:99');    // Hora
		      	$('#hora_f').mask('99:99');    // Hora
    });
	</script>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />

<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<style type="text/css">

a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

.ft{
   width:300px;
   }
</style>

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
        include("$pg");
    }
    ?>
        </div>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>



</div>
</body>
</html>