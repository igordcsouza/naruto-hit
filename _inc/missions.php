<?php require_once('trava.php'); ?>
<?php
if(isset($_GET['cancel'])){
	if($db['missao']>1000){
		mysql_query("UPDATE table_missoes SET membros=membros-1 WHERE id=".$db['missao']);
	}
	if($db['orgmissao']>0) mysql_query("UPDATE table_missoes SET membros=membros-1 WHERE id=".$db['orgmissao']);
	mysql_query("UPDATE usuarios SET missao=0, orgmissao=0 WHERE id=".$db['id']);
	$db['missao']=0;
}
?>
<?php require_once('verificar.php'); ?>
<?php
require_once('Encrypt.php');
$c=new C_Encrypt();

if(isset($_POST['mis_rank'])){
	if($db['orgmissao']>0){ echo "<script>self.location='?p=missions&msg=2'</script>"; break; }
	$rank=$c->decode($_POST['mis_rank'],$chaveuniversal);
	$tempo=$c->decode($_POST['mis_tempo'],$chaveuniversal);
	vn($tempo);
	if($tempo<=0){ echo "<script>self.location='?p=missions'</script>"; break; }
	switch($rank){
		case 'S': $nivelmin=60; $mis=905; break;
		case 'A': $nivelmin=40; $mis=904; break;
		case 'B': $nivelmin=20; $mis=903; break;
		case 'C': $nivelmin=5; $mis=902; break;
		case 'D': $nivelmin=0; $mis=901; break;
		//case 'V': $nivelmin=0; $mis=999; break;
	}
	/*if($rank<>'V'){
		if($tempo>=25){ echo "<script>self.location='?p=home'</script>"; break; }
	}*/
	if($db['nivel']<$nivelmin){ echo "<script>self.location='?p=missions&msg=1'</script>"; break; }
	$soma=mktime(date('H')+$tempo, date('i'), date('s'));
	$missaofim=date('Y-m-d H:i:s',$soma);
	mysql_query("UPDATE usuarios SET missao=".$mis.", missao_tempo=".$tempo.", missao_fim='".$missaofim."' WHERE id=".$db['id']);
	/*if($rank=='V')
		{ echo "<script>self.location='?p=logout'</script>"; break; }
	else
		{ echo "<script>self.location='?p=busymission'</script>"; break; }*/
	if($rank=='V'){ echo "<script>self.location='?p=home'</script>"; break; }
	echo "<script>self.location='?p=busymission'</script>"; break;
}
?>
<div class="box_top">Missões</div>
<div class="box_middle"><div style="background:url(_img/kage.jpg) no-repeat right top;padding-right:306px;">Realize missões para ganhar <b>Yens</b> e <b>Experiência</b>! Ao terminar a missão, o ninja ganhará 1 ponto de experiência para cada hora trabalhada na missão. As missões de rank superiores a D aparecerão apenas quando seu nível alcançar o mínimo para realizá-las. Utilize os links abaixo para navegar entre as missões. Você pode cancelar a missão que estiver realizando a qualquer momento (ao fazer isso, você não receberá recompensas).</div>
  <?php
  $msg='';
  if(isset($_GET['msg'])){
  	switch($_GET['msg']){
		case 1: $msg='Seu nível é muito baixo para realizar missões deste rank.'; break;
		case 2: $msg='Você já está inscrito para uma missão de clã.'; break;
	}
  }
  if(isset($_GET['cancel'])) $msg='Missão cancelada!';
  if($msg<>'') echo '<div class="sep"></div><div class="aviso">'.$msg.'</div>';
  ?>
  <div class="sep"></div><div align="center"><a href="?p=missions">Missões Normais</a> | <a href="?p=missions&amp;type=v">Tirar Férias</a> | <a href="?p=quests">Quests</a></div>
  <?php if(!isset($_GET['type'])) require_once('missions_n.php'); else
  switch($_GET['type']){
	case 'n': require_once('missions_n.php'); break;
	case 'v': require_once('missions_v.php'); break;
  }
  ?>
</div>
<div class="box_bottom"></div>