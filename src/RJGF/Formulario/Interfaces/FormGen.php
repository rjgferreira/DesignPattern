<?php
namespace RJGF\Formulario\Interfaces;
use RJGF\Formulario\Validator;
interface FormGen{
    public function __construct(Validator $validator, $css=null, $method=null, $enctype=null, $action=null);
    public function createField($name=null, $placeholder=null, $label=null, $type=null, $css=null, $required=null, $value=null, $cols=null, $rows=null, $render=false);
    public function render();
}