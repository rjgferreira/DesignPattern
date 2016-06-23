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

    <title>Cross | Over Application</title>

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
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Acesso restrito</strong></div>
            <div class="panel-body">
                <?php
                    $form = new \RJGF\Formulario\Formulario('Login', 'form','m');
                    $form->addField('nome','Nome','t','','s')
                        ->addField('email','E-mail','e','','s')
                        ->addField('senha','Senha','p','','s')
                        ->addField('','','s','btn btn-primary','Enviar')
                        ->render();
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
