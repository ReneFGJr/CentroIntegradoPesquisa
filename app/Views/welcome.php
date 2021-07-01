<?php
$modo = $_SERVER['CI_ENVIRONMENT'];
?>
<head>
    <title>CIP - UFRGS</title>
</head>
<!--- LOGIN --->
<link rel="stylesheet" href="<?php echo base_url('css/style_welcome.css?v1_0_1');?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">

<div id="login_cab" style="font-family: 'Open Sans Condensed', sans-serif;">
    <div id="login_logos">
        <img src="<?php echo base_url('img/imagem_lampada_cabecalho.png');?>" style="width: 30%;">
        <div id="login_logos_img"></div>
        <div id="contato">
            <h2>O que é o CIP?</h2>
            O CIP é o Centro Integrado de Pesquisa. Aqui é possível acessar informações
            de pesquisa, geração de relatórios, entre outras atividades.

            <h3>Contatos</h3>
            rene.gabriel@ufrgs.br
            </br>
            </br>
        </div>
    </div>

    <!--- LOGIN FORMULARIO --->
    <div id="login_form">
        <?php echo $form; ?>
    </div>
    <div id="modo"><?php echo $modo;?></div>
    <?php echo form_close(); ?>
    <!--- FIM --->
</div>