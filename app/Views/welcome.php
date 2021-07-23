<?php
$modo = $_SERVER['CI_ENVIRONMENT'];
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">

<style>
body { 
    background-color: #AA2439; 
    color: white;
}

.login_cab { 
    padding: 0px;
    margin: 0px;
    min-height: 180px;
}

#logo {
     display: block;
     top: 10px;
     right: 20px;
     position: absolute;
   }
#lamp {
    display: block;
     top: 0px;
     left: 20px;
     position: absolute;
   }

</style>
<!--- LOGIN --->


<div class="container">
    <div class="row">
        <?php echo bscol(2);?>&nbsp;</div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 login_cab">
                <img id="lamp" src="<?php echo base_url('img/imagem_lampada_cabecalho.png');?>" style="width: 150px;">
                <img id="logo" src="<?php echo base_url('img/logo_cip.png');?>" style="width: 30%;">
        </div>
        <?php echo bscol(2);?>&nbsp;</div>
    </div>
    <div class="row">
        <?php echo bscol(2);?>&nbsp;</div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 login_cab text-center">
        <?php echo $form; ?>
        </div>
        <?php echo bscol(2);?>&nbsp;</div>
        
        </div>
    </div>
    <div class="row" style="height: 200px;">

    </div>
</div>
<!--

-->