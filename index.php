<!DOCTYPE html>
<html>
<head lang="pt-br">
  <meta charset="UTF-8">
  <title></title>
    <?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ERROR | E_PARSE | E_WARNING );
    require_once ('lib/config.php');
    require_once ('lib/model.php');
    $db = new db;
    require_once ('lib/autoload.php');
    require_once ('lib/plugin/load_css.php');
    require_once ('lib/plugin/load_js.php');
    require_once ('lib/plugin/load_bootstrap.php');


    ?>
</head>
<body>
    <?php require_once('App/viel/topo.php'); ?>
    <div class="geral">
    <?php
    require ('App/viel/menu.php');
    echo '<br>';
    require ('query.php');

    ?>

    </div>
</body>
</html>