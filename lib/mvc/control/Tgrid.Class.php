<?php
/**
 * @package     Damasco
 * @subpackage  Damasco.Core.Model
 */
class Tgrid extends db{
    public $Db;
    public $db;
    public $Modulos;
    public $Campos;
    public $CamposSecond;
    public $Where;
    public $Valor;
    public $DbSecond;
    public $Herd;
    public $PrimaryKey;
    public $Pagin;

    /**
     * Função start da classe Tgrid
     *
     * - Instância a objeto db (conexão com o banco de dados)
     *
     * @return  void
     */
    public function __construct()
    {
        require('App/config/db.php');

        $this->db = new mysqli($host,$user,$pass,$data);

    }


    /**
     *
     * @param   string  $name       Nome do titulo da tabela
     * @param   string  $folde      Nome da pasta
     * @param   string  $file       Arquivo dentro da pasta
     *
     */
    public function Ttopo($name,$folde,$file){
        echo '
        <div style="padding:0 10px;"><div  style="border-bottom: solid 3px #297ACC">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="12%"><strong>'.$name.'</strong></td>
                <td width="8%" align="right"><ul class="nav  span7" style="margin-bottom:0px;">
                        <li class="pull-right"><a href="?pg='.$folde.'/list_'.$file.'">Listar</a></li>
                        <li class="pull-right"><a href="?pg='.$folde.'/add_'.$file.'">Cadastrar</a></li>
                    </ul></td>
            </tr>
            </table>
        </div>
        <br />
        ';
    }
    /**
     *
     * @Param string    $db             Banco de dados
     * @param string    $campos         Campos da tabela
     */

    public function Ttable($db,$Campos,$sis,$arquivos)
    {
        echo '<table width="100%" border="0" cellpadding="0" class="table table-striped table-hover" cellspacing="0" >';
        echo '<tr>';
        $z = $this->CamposSecond;

        $h       = explode(',',$this->Herd);

        foreach($h as $tpo){

            echo '<th>'.$tpo.'</th>';

        }
        echo '<th colspan="2">Ações</th>';
        echo '<tr>';


        $res = $this->db->query("SELECT * FROM {$db} $this->Pagin");
        while($ok = $res->fetch_array()){
            ?>
            <tr>
                <?php

                foreach(explode(',',$Campos) as $b){
                    /*
                     * COMPARANDO O MODIFICADOR COM O CAMPO DA TABELA
                     */
                    $isEquals = false;
                    $arrlength    =count($this->CamposSecond);
                    for($x=0;$x<$arrlength;$x++) {
                        if ( $this->CamposSecond[$x]==$b) {

                                $dbs = count($this->DbSecond);
                                for($d=0;$d<$dbs;$d++){

                                    $we = count($this->Where);
                                    for($w=0;$w<$we;$w++){
                                        if($w == $d){
                                            if($w == $x) {

                                                $banco = $this->DbSecond[$d];
                                                $campoc = $this->CamposSecond[$x];
                                                $id = $this->Where[$x];

                                                $ddd = $ok[$b];

                                                $sech = $this->db->query("SELECT * FROM {$banco} WHERE {$id} = '$ddd'");
                                                $fff = $sech->fetch_array();
                                               // echo $fff[$d];
                                                echo '<td>' .$fff[$this->Valor[$x]]. '</td>';
                                             }
                                        }
                                    }
                                    $isEquals = true;
                                }
                        }
                    }
                    if(!$isEquals) echo '<td>'.$ok[$b].'</td>';
                }
                ?>
                <td width="1"><a href="?pg=<?php  echo  "$sis/edit_$arquivos" ?>&<?php echo $this->PrimaryKey ?>=<?php echo $ok[$this->PrimaryKey]; ?>" class="btn btn-primary btn-xs" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td width="1"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $ok[$this->PrimaryKey];?>" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></td>

                <div class="modal fade" id="delete<?php echo $ok[$this->PrimaryKey];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading">Apagar arquivo? <?php echo $ok['nome'] ?></h4>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Esta ação não pode ser desfeita</div>

                            </div>
                            <div class="modal-footer ">
                                <a href="?pg=<?php  echo  "$sis/dell_$arquivos" ?>&<?php echo $this->PrimaryKey ?>=<?php echo $ok['id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Sim</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Não</button>
                            </div>
                        </div>
            </tr>
        <?php
        }

        echo '</table>';
    }


    public function TtotalDb($tabela,$max)
    {
        $total = $this->db->query("SELECT * FROM {$tabela}");

        //echo "Temos um total de {$total->num_rows} registro exibindo {$res->num_rows} de  {$total}";

        $cal = $max -$this->num_rows;
        echo "Temos um total de {$total->num_rows} registros exibindo {$max} de {$cal}";

        }

    /**
     * @param  strin $db        nome da base de dados
     * @param string $mod       nome do modulo
     * @param string $file      nome do arquivo do modulo
     * @param string $max       variavel contendo o maximo de registro
     *
     */

    public function Tpaginacion($db,$mod,$file,$max){

        echo '<ul class="pagination">';
        $pagin = $this->db->query("SELECT * FROM {$db}");
        $total = $pagin->num_rows;
        $paginas = ceil($total/$max);
        $links = '5';
        echo '<li><a href="?pg='.$mod.'/list_'.$file.'&pag=1">«</a></li>';
        for($i = $pag-$links; $i <= $pag-1; $i++){
            if($i >= 0){
                echo '<li><a href="?pg='.$mod.'/list_'.$file.'&pag='.$i.'">'.$i.'</a></li> ';
            }
        }
        echo '<li class="disabled"><a href="#">'.$pag.'</a></li>';
        for($i = $pag +1; $i <= $pag+$links; $i++){
            if($i > $paginas){

            }else{
                echo '<li><a href="?pg='.$mod.'/list_'.$file.'&pag='.$i.'">'.$i.'</a></li>';
            }
        }
        echo '<li><a href="?pg='.$mod.'/list_'.$file.'&pag='.$paginas.'">»</a></li>';

        echo '</ul>';
    }
     /**
     * @param mixed $Herd
     */
    public function setHerd($Herd)
    {
        $this->Herd = $Herd;
    }

    /**
     * @param mixed $Pagin
     */
    public function setPagin($inicio,$maximo)
    {

       $this->Pagin = "LIMIT $inicio,$maximo";


       // $this->Pagin = "LIMIT $inicio $maximo";
    }

    /**
     * @param mixed $PrimaryKey
     */
    public function setPrimaryKey($PrimaryKey)
    {
        $this->PrimaryKey = $PrimaryKey;
    }

    /**
     * @param mixed $CamposSecond
     */
    public function setCamposSecond($CamposSecond)
    {
        $this->CamposSecond = explode(',',$CamposSecond);
    }

    /**
     * @param mixed $DbSecond
     */
    public function setDbSecond($DbSecond)
    {
        $this->DbSecond = explode(',',$DbSecond);
    }

    /**
     * @param mixed $Where
     */
    public function setWhere($Where)
    {
        $this->Where = explode(',',$Where);
    }

    /**
     * @param mixed $Valor
     */
    public function setValor($Valor)
    {
        $this->Valor = explode(',',$Valor);
    }


    /**
     * Função end da classe Tgrid
     *
     * - Fecha a conexão com o banco de dados
     */
    public function __destruct()
    {
        // tem que criar a função close do db
    }

}
