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
$topo->setHerd('ID,Nome,Endereço,Fone,Email');


$topo->Ttable('cliente','id,nome,endereco,fone,email','cliente','cliente');
?>
<?php
echo '<br>';
$topo->Tpaginacion('menu','cliente','cliente',$maximo);