<?php
/**
* CodeIgniter Form Helpers
*
* @package     CodeIgniter
* @subpackage  Forms SisDoc
* @category    Helpers
* @author      Rene F. Gabriel Junior <renefgj@gmail.com>
* @link        http://www.sisdoc.com.br/CodIgniter
* @version     v0.21.06.24
*/
//$sx .= form($url,$dt,$this);

function msg($txt)
    {
        return($txt);
    }

function tableview($th)
    {
        $url = base_url($_SERVER['REQUEST_URI']);
        if (strpos($url,'/view')) { $url = substr($url,0,strpos($url,'/view')); }
        $fl = $th->allowedFields;

	    $v = $th->paginate(3);
        $p = $th->pager;

        $sx = bscontainer();
        $sx .= anchor($url.'/edit/','novo','class="btn btn-primary"');
        $sx .= '<table class="table">';

        /* Header */
        $sx .= '<tr>';
        $sx .= '</tr>';

        /* Data */
        for ($r=0;$r < count($v);$r++)
            {
                $line = $v[$r];
                $sx .= '<tr>';
                foreach($fl as $field)
                    {
                        $sx .= '<td>'.anchor(base_url($url.'/viewid/'.$line[$fl[0]]),$line[$field]).'</td>';
                    }   
                $sx .= '<td>'.linked($url.'/edit/'.$line[$fl[0]],'[ed]').'</td>';
                $sx .= '<td>'.linkdel($url.'/delete/'.$line[$fl[0]],'[x]').'</td>';
                $sx .= '</tr>'.cr();
            }
        $sx .= '</table>';
        //$sx .=  $th->pages->links();
        $sx .= bsdivclose();
        $sx .= bsdivclose();
        $sx .= bsdivclose();
        return($sx);    
    }

function form($th)
    {
        $sx = '';

        $fl = $th->allowedFields;
        $tp = $th->typeFields;
        $id = round($th->id);
        $url = base_url($_SERVER['REQUEST_URI']);

        $dt = $_POST;
        if ((count($dt) == 0) and ($id > 0))
            {
                $dt = $th->find($id);
            } else {
                if (($th->save($dt)) and (count($dt) > 0))
                    {
                        $url = substr($url,0,strpos($url,'/edit'));
                        $sx .= bsmessage('SALVO');
                        //$sx = redireciona($url);
                        $sx .= anchor($url,'Voltar',['class'=>'btn btn-primary']);
                        return($sx);
                    }
            }
        
        
        $sx .= form_open($url).cr();

        $sx .= '<table class="table">';
        $sx .= '<tr><th width="20%">'.msg('label').'</th>
                    <th width="80%">'.msg('values').'</th></tr>';
        $submit = false;

        /* Formulario */
        for ($r=0;$r < count($fl);$r++)
            {
                $fld = $fl[$r];
                $typ = $tp[$r];
                $vlr = '';
                if (isset($dt[$fld])) { $vlr = $dt[$fld]; }
                $sx .= form_fields($typ,$fld,$vlr);
            }

        /***************************************** BOTAO SUBMIT */
        if (!$submit)
            {
                $sx .= '<tr><td>'.bt_submit().' | '.bt_cancel($url).'</td></tr>'.cr();
            }

        /************************************** FIM DO FORMULARIO */
        $sx .= '</table>'.cr();

        $sx .= form_close().cr();

        return($sx);

    }
function redireciona($url='/main/service',$time=2)
    {
        $sx = redirect()->to($url);
        return ($sx);
    }

function linkdel($url)
    {
        global $js_del;
        $sx = '';
        $sx .= anchor($url,'&nbsp;X&nbsp;',['class'=>'btn-primary small','onclick'=>'return confirma();','style'=>'border: 1px solid #00000; border-radius: 5px;']);
        if ($js_del == '')
            {
                $sx .= '
                <script>
                function confirma()
                    {
                        if (!confirm("Excluir registro?"))
                            {
                                return false;
                            }
                    }
                </script>';
                $js_del = true;
            }
        return($sx);
    }

function linked($url)
    {
        $sx = anchor($url,'&nbsp;ed&nbsp;',['class'=>'btn-warning small','style'=>'border: 1px solid #00000; border-radius: 5px;']);
        return($sx);        
    }

function form_del($th)
    {
        $sx = '';
        $id = $th->id;

        if ($th->delete($id))
            {
                $sx .= bsmessage('Item excluído',1);
            } else {
                $sx .= bsmessage('Erro de exclusão',2);
            }

        $url = base_url($_SERVER['REQUEST_URI']);
        $url = substr($url,0,strpos($url,'/delete'));
        $sx .= anchor($url,'Voltar',['class'=>'btn btn-danger']);
        $sx = redireciona($url);
        return($sx);
    }

function cr()
    {
        return (chr(13).chr(10));
    }



function form_fields($typ,$fld,$vlr)
    {
        $td = '<td>'; $tdc = '</td>';
        /*********** Mandatory */
        $sub = 0;
        $mandatory = false;        
        $sx = '<tr>';
        $t = substr($typ,0,2);
        switch($t)
                {
                    case 'up':
                        $sx .= '<input type="hidden" id="'.$fld.'" name="'.$fld.'" value="'.date("YmdHi").'">';
                        break;
                    case 'hi':
                        $sx .= '<input type="hidden" id="'.$fld.'" name="'.$fld.'" value="'.$vlr.'">';
                        break;
                    case 'tx':
                        $rows = 5;
                        $sx .= $td.($fld).$tdc;
                        $sx .= $td;
                        $sx .= '<textarea id="'.$fld.'" rows="'.$rows.'" name="'.$fld.'" class="form-control">'.$vlr.'</textarea>';
                        $sx .= $tdc;
                        break;
                    case 'sn':
                        $sx .= $td.($fld).$tdc;
                        $sx .= $td;
                        $op = array(1,0);
                        $opc = array(msg('YES'),msg('NO'));
                        $sg = '<select id="'.$fld.'" name="'.$fld.'" value="'.$vlr.'" class="form-control">'.cr();
                        for ($r=0;$r < count($op);$r++)
                            {
                                $sel = '';
                                $sg .= '<option value="'.$op[$r].'" '.$sel.'>'.$opc[$r].'</option>'.cr();
                            }
                        $sg .= '</select>'.cr();
                        $sx .= $sg;
                        $sx .= $tdc;
                        break;
                    case 'st':
                        $sx .= $td.($fld).$tdc;
                        $sx .= $td;
                        $sx .= '<input type="text" id="'.$fld.'" name="'.$fld.'" value="'.$vlr.'" class="form-control">';
                        $sx .= $tdc;
                        break;
                    default:
                        $sx .= 'OPS - '.$t;
                }
            $sx .= '</tr>';
        return($sx);
    }

    function bt_cancel($url)
        {
            if (strpos($url,'/edit')) { $url = substr($url,0,strpos($url,'/edit')); }
            $sx = anchor($url,msg('return'),['class'=>'btn btn-outline-danger']);
            return $sx;
        }

    function bt_submit($t='save')
        {
            $sx = '<input type="submit" value="'.$t.'" class="btn btn-primary">';        
            return($sx);
        }
?>