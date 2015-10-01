<?php
$link = base_url('index.php/semic/agenda/' . $id_us.'/1');
$link2 = base_url('index.php/semic/agenda_convite/' . $id_us.'/1');
?>
<A href="<?php echo $link;?>" class="left_mark" style="position: absolute; top: 150px; right: 0px;"> Enviar agenda <img src="<?php echo base_url('img/icon/icone_send_mail.png');?>" height="25" align="right"> </A>
<A href="<?php echo $link2;?>" class="left_mark" style="position: absolute; top: 180px; right: 0px;"> Enviar convite <img src="<?php echo base_url('img/icon/icone_send_mail.png');?>" height="25" align="right"> </A>

<?php echo $perfil;?>
<?php echo $agenda;?>