<?php
define('CLASS_DIR','src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Design Pattern - FormGen</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{font-family: "Open Sans"; }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="container">
        <br>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Contato</h4></div>
                <div class="panel-body">
                    <?php
                    $request = new \RJGF\Formulario\Request();
                    $validator = new \RJGF\Formulario\Validator($request);
                    $form = new \RJGF\Formulario\Formulario($validator, 'form','p','m');
                    $form->createField('nome','Nome','','t','','s')
                        ->createField('email','E-mail','','e','','s')
                        ->createField('mensagem','Mensagem','','ta','','s','')
                        ->createField('','','','sb','btn btn-primary pull-right','','Enviar','','',true);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Acesso restrito</h4></div>
                <div class="panel-body">
                    <?php
                    $request = new \RJGF\Formulario\Request();
                    $validator = new \RJGF\Formulario\Validator($request);
                    $form = new \RJGF\Formulario\Formulario($validator, 'form','p','m');
                    $form->createField('email','E-mail','','e','','s')
                        ->createField('senha','Senha','','p','','s')
                        ->createField('nopssw','','Esqueci minha senha', 'c','','',true)
                        ->createField('','','','sb','btn btn-primary pull-right','','Acessar')
                        ->render();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Pesquisar</h4></div>
                <div class="panel-body">
                    <?php
                        $request = new \RJGF\Formulario\Request();
                        $validator = new \RJGF\Formulario\Validator($request);
                        $form = new \RJGF\Formulario\Formulario($validator, 'form','p','m');
                        $form->createField('srch','Digite um termo para a pesquisa','','t','','s')
                            ->createField('','','','sb','btn btn-primary pull-right','','Ok','','',true);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Registrar conta</h4></div>
                <div class="panel-body">
                    <?php
                    $request = new \RJGF\Formulario\Request();
                    $validator = new \RJGF\Formulario\Validator($request);
                    $form = new \RJGF\Formulario\Formulario($validator, 'form','p','m');
                    $form->createField('nome','Digite seu nome','','t','','s')
                        ->createField('email','E-mail para contato','','e','','s')
                        ->createField('senha','Senha de acesso','','p','','s')
                        ->createField('','','','sb','btn btn-primary pull-right','','Cadastrar','','',true);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Enquete:</h4><span>Da lista abaixo, qual o melhor filme pra voc&ecirc;?</span></div>
                <div class="panel-body">
                    <?php
                    $request = new \RJGF\Formulario\Request();
                    $validator = new \RJGF\Formulario\Validator($request);
                    $form = new \RJGF\Formulario\Formulario($validator, 'form','p','m');
                    $form->createField('filme1','','Volta ao mundo em oitenta dias','c','','s')
                        ->createField('filme2','','Mary Poppins','c','','s')
                        ->createField('filme3','','101 Dalmatas','c','','s')
                        ->createField('filme4','','Fantasia', 'c','','s')
                        ->createField('','','','sb','btn btn-primary','','Votar','','',true);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
