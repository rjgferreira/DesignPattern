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

    public function __construct($cssClass = null, $method = null, $enctype = null, $action = null){
        $this->html = array();
        $this->action = self::setFile($action);
        $this->enctype = self::setEnctype($enctype);
        $this->method = self::setMethod($method);
        $this->html[] = '<form action="'.$this->action.'" enctype="'.$this->enctype.'" method="'.$this->method.'"'.($cssClass!=null?" class=\"".$cssClass."\"":'').'>';
    }

    /* Os campos do formulário terão as seguintes configurações
     * type -> ( t = text | e = email | ta = textarea | p = password | s = submit ) (default = text)
     * cssClass -> form-control (default)
     * */

    public function addField($name=null, $placeholder=null, $type=null, $cssClass=null, $required=null, $value=null, $rows=null, $cols=null)
    {
        switch ($type) {
            case null:
            case "t":
                $this->html[] = '<div class="form-group"><input name="'.$name.'" type="text" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'  /></div>';
                return $this;
                break;
            case "e":
                $this->html[] = '<div class="form-group"><input name="'.$name.'" type="email" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'  /></div>';
                return $this;
                break;
            case "ta":
                $this->html[] = '<div class="form-group"><textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"'.($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'>'.($value!=null?$value:'').'</textarea></div>';
                return $this;
                break;
            case "p":
                $this->html[] = '<div class="form-group"><input name="'.$name.'" type="password" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').(self::setClass('f',$cssClass)).self::setRequired($required).' /></div>';
                return $this;
                break;
            case "s":
                $this->html[] = '<div class="form-group"><input name="'.$name.'" type="submit" '.($value!=null?'value="'.$value.'"':'value="ENVIAR"').self::setClass('f',$cssClass).self::setRequired($required).' /></div>';
                return $this;
                break;
            default:
                $this->html[] = '<div class="form-group"><input name="'.$name.'" type="text" '.($value!=null?' value="'.$value.'"':'').($placeholder!=null?' placeholder="'.$placeholder.'"':'').self::setClass('f',$cssClass).self::setRequired($required).'  /></div>';
                return $this;
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
            else
                return null;
        return null;
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
            else
                return null;
        else
            return null;
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

