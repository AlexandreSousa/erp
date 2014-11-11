<?php
class Tgrid{
    
    public function Ttopo($nome,$folde,$file){
        echo '
        <div style="padding:0 10px;"><div  style="border-bottom: solid 3px #297ACC">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="12%"><strong>'.$nome.'</strong></td>
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
    
}
