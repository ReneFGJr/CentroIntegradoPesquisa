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
function form($url='',$cp=array(),$method="POST")
    {
        $sx = '';

        $sx .= form_open($url);
        $sx .= form_fields($cp);
        $sx .= form_close();

        return($sx);

    }

function form_fields($d)
    {
        $sx = '<table class="table">';

        $td = '<td>'; $tdc = '</td>';
        /*********** Mandatory */
        $fl = $d->allowedFields;
        $tp = $d->typeFields;
        $sub = 0;

        /* Formulario */
        for ($r=0;$r < count($fl);$r++)
            {
            $mandatory = false;
            $t = substr($tp[$r],0,2);

            $sx .= '<tr>';
            switch($t)
                {
                    case 'hi':
                        $sx .= '<input type="hidden" id="'.$fl[$r].'" name="'.$fl[$r].'" value="">';
                        break;
                    case 'st':
                        $sx .= $td.($fl[$r]).$tdc;
                        $sx .= $td;
                        $sx .= '<input type="text" id="'.$fl[$r].'" name="'.$fl[$r].'" value="" class="form-control">';
                        $sx .= $tdc;
                        break;
                    default:
                        $sx .= 'OPS - '.$t;
                }
            $sx .= '</tr>';
            }
        if ($sub == 0)
            {
                $sx .= bt_submit();
            }
        $sx .= '</table>';
        return($sx);
    }

    function bt_submit($t='save')
        {
            $sx = '<input type="submit" value="" class="btn btn-primary">';        
            return($sx);
        }
?>