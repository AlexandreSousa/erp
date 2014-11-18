<?php
/**
 * Created by PhpStorm.
 * User: akira
 * Date: 06/11/14
 * Time: 16:34
 */



$topo = new Tgrid();
$topo->Ttopo('Listagen de usuario','cliente','cliente');


echo '<br>';

$pag = "$_GET[pag]";
    if($pag >= '1'){
        $pag = $pag;
    }else{
        $pag = '1';
    }
$maximo = '10';
$inicio =  ($pag * $maximo) - $maximo;


$topo->setPrimaryKey('id');

$topo->TtotalDb('empresa',$maximo);
$topo->setPagin($inicio,$maximo);
$topo->setHerd('ID,Level,Nome,Icone,Status');


$topo->setCamposSecond('id_level,icon');
$topo->setDbSecond('level,icones');
$topo->setWhere('id,icone,id');

$topo->setValor('level,id');

$topo->Ttable('menu','id,id_level,nome,icon,status','cliente','cliente');
?>
<?php
echo '<br>';
$topo->Tpaginacion('menu','cliente','cliente',$maximo);