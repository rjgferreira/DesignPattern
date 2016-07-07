<?php
namespace RJGF\Formulario;
use RJGF\Formulario\Interfaces\FormGen;
class Formulario implements FormGen
{
    private $html;
    private $action;
    private $method;
    private $enctype;

    /* Opções para criação do formulário:
     * action -> null (default)
     * method -> ( p=POST | g=GET ) (default = p)
     * enctype -> ( m = multipart/form-data | a = application/x-www-form-urlencoded ) (default = m)
     * css -> form (default)
     * */

    public function __construct(Validator $validator, $cssClass = null, $method = null, $enctype = null, $action = null){
        $this->html = array();
        $this->action = self::setFile($action);
        $this->enctype = self::setEnctype($enctype);
        $this->method = self::setMethod($method);
        $this->html[] = '<form action="'.$this->action.'" enctype="'.$this->enctype.'" method="'.$this->method.'"'.($cssClass!=null?" class=\"".$cssClass."\"":'').'>';
    }

    /* Os campos do formulário terão as seguintes configurações
     * type -> ( t = text | e = email | ta = textarea | p = password | s = submit | c = checkbox ) (default = text)
     * cssClass -> form-control (default)
     * required -> s
     * render -> false
     * */

    public function createField($name=null,  $placeholder=null, $label=null, $type=null, $cssClass=null, $required=null, $value=null, $rows=null, $cols=null, $render=false)
    {
        switch ($type) {
            case null:
            case "t":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="text" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            case "e":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="email" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            case "ta":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"'.($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'>'.($value!=null?$value:'').'</textarea></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            case "p":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="password" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').(self::setClass('f',$cssClass)).self::setRequired($required).'></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            case "c":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="checkbox" value="'.$value.'"> '.$label.'</div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            case "sb":
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="submit" '.($value!=null?'value="'.$value.'"':'value="ENVIAR"').self::setClass('f',$cssClass).self::setRequired($required).'></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
            default:
                $this->html[] = "\n".'<div class="form-group">'."\n".'<input name="'.$name.'" type="text" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'></div>';
                if($render){self::render();}
                else{ return $this; }
                break;
        }
    }

    public function render()
    {
        $this->html[] = "</form>";
        for($i=0;$i<count($this->html);$i++){
            echo $this->html[$i];
        }
    }

    private function setRequired($v){
        if($v!=null)
            if($v=='s')
                return ' required';
    }

    private function setMethod($m){
        if($m == null || $m == 'p')
            return "POST";
        else if($m == 'g')
            return "GET";
        else
            return "POST";
    }

    private function setFile($urlFile){
        if($urlFile!=null)
            if(is_file($urlFile))
                return $urlFile;
    }

    private function setEnctype($e){
        if($e==null||$e=='m')
            return 'multipart/form-data';
        else if($e=='a')
            return 'application/x-www-form-urlencoded';
        else
            return 'multipart/form-data';
    }

    private function setClass($tipo, $css){
        // TIPOS: F -> Form | f -> field
        if($tipo=='F')
            if($css==null)
                return ' class="form"';
            else
                return ' class="'.$css.'"';
        else if($tipo=='f'){
            if($css==null)
                return ' class="form-control"';
            else
                return ' class="'.$css.'"';
        }
    }
}

