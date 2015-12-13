<div style="width:170px;">
<?php require_once('trava.php'); ?>
<?php
switch($db['vila']){
	case 1: $vila='folha'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Folha)'; else $txtvila='Vila da Folha'; break;
	case 2: $vila='areia'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Areia)'; else $txtvila='Vila da Areia'; break;
	case 3: $vila='som'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila do Som)'; else $txtvila='Vila do Som'; break;
	case 4: $vila='chuva'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Chuva)'; else $txtvila='Vila da Chuva'; break;
	case 5: $vila='nuvem'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Nuvem)'; else $txtvila='Vila da Nuvem'; break;
	case 6: $vila='nevoa'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Névoa)'; else $txtvila='Vila da Névoa'; break;
	case 8: $vila='pedra'; if($db['renegado']=='sim') $txtvila='Akatsuki (Vila da Pedra)'; else $txtvila='Vila da Pedra'; break;
	case 99: $vila='folha'; $txtvila='Vila da Folha'; break;
} ?>
<?php if((!isset($_GET['p']))or(isset($_GET['p']))&&($_GET['p']<>'attack')){ ?>
<?php if((!isset($_GET['p']))or(isset($_GET['p']))&&($_GET['p']<>'view')&&($_GET['p']<>'prepare')){ ?>
<div id="msg" style="margin-bottom:4px;">
	<?php
	$sqlm=mysql_query("SELECT count(id) conta FROM mensagens WHERE destino=".$db['id']." AND status='naolido'");
	$dbm=mysql_fetch_assoc($sqlm);
	$sqla=mysql_query("SELECT count(id) conta FROM relatorios WHERE inimigoid=".$db['id']." AND status='nao'");
	$dba=mysql_fetch_assoc($sqla);
	if($dbm['conta']>0){
		echo '<div class="action"><a href="?p=messages">'.$dbm['conta'].' nova';
		if($dbm['conta']>1) echo 's';
		echo ' mensage';
		if($dbm['conta']>1) echo 'ns'; else echo 'm';
		echo '!</a></div>';
	}
	if($dba['conta']>0){
		echo '<div class="action"><a href="?p=reports">Você foi atacado '.$dba['conta'].' vez';
		if($dba['conta']>1) echo 'es';
		echo '!</a></div>';
	}
	?>
</div>
<?php } ?>
<div align="center" style="background:url(_img/personagens/no_avatar.jpg) no-repeat top;height:150px;"><a href="<?php if($db['avatar']==0) echo '?p=avatar'; else echo '?p=home'; ?>"><img src="_img/personagens/<?php echo $db['personagem']; ?>/<?php echo $db['avatar']; ?>.jpg" width="162" height="150" border="0" /></a></div>
<div align="center"><img src="_img/vilas/<?php if($db['renegado']=='sim') echo 'akatsuki_'; ?><?php echo $vila; ?>.jpg" onmouseover="Tip('<div class=tooltip><?php echo $txtvila; ?></div>');" onmouseout="UnTip()" /></div>
<?php } ?>
<?php if((!isset($_GET['p']))or($_GET['p']=='home')) require_once('friendlist.php'); ?>
<?php require_once('menu_comum.php'); ?>
</div>