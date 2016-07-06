<?php
namespace RJGF\Formulario\Interfaces;
interface FormGen{
    public function __construct($css=null, $method=null, $enctype=null, $action=null);
    public function addField($name=null, $placeholder=null, $label=null, $type=null, $css=null, $required=null, $value=null, $cols=null, $rows=null);
    public function renderField();
    public function render();
}