<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 06/11/14
 * Time: 01:53
 */

class Tform {
    public $Ttipe;
    public $List;
    public $Label;
    public $Tcampo;

    public function Tinput($type,$name,$id,$value,$placeholder,$title,$size){
        echo '<label>'.$this->Label.'<br>';
        echo '<input class="form-control" type="'.$type.'" '.$this->Tcampo.' id="'.$id.'" name="campo['.$name.']" value="'.$value.'" placeholder="'.$placeholder.'" title="'.$title.'" size="'.$size.'">';
        echo '</label>';
    }

    public function TdataList($name){
        echo '<label>';
        echo '<input class="form-control" name="'.$name.'" type="text" list="'.$name.'" autocomplete="on">';
               echo  '<datalist id="'.$name.'">';
            foreach(explode(',',$this->List) as $list) {
                echo '<option value = "'.$list.'" >';
                    }
               echo  '</datalist>';
        echo '<label>';
    }
    public function Tbuton($name,$value){
            echo '<input class="btn btn-success" type="submit" name="'.$name.'" id="'.$name.'" value="'.$value.'">';

    }

    /**
     * Responsavel por abri o banco de dados para gravação
     */
    public function Trecord(){

            echo '<input type="text" id="post" name="post" value="ok">';
    }

    /**
     * @param string $name   Nome do formulario
     */
    public function Tformi($name){
        echo '<form method="post" action="" name="'.$name.'" id="'.$name.'" enctype="multipart/form-data">';
    }
    public function Tformf(){

        echo '</form>';
    }

    /**
     * @param mixed $List
     */
    public function setList($List)
    {
        $this->List = $List;
    }

    /**
     * @param mixed $Ttipe
     */
    public function setTtipe($Ttipe)
    {
        $this->Ttipe = $Ttipe;
    }

    /**
     * @param mixed $Tcampo
     */
    public function setTcampo($Tcampo)
    {
        $this->Tcampo = $Tcampo;
    }

    /**
     * @param mixed $Label
     */
    public function setLabel($Label)
    {
        $this->Label = $Label;
    }

    /**
     * @param mixed $Form
     */
} 