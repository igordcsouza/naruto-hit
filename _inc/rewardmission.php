<?php require_once('trava.php'); ?>
<?php
$atual=date('Y-m-d H:i:s');
if($db['missao']==0){ echo "<script>self.location='?p=home'</script>"; break; } else {
	if($atual<$db['missao_fim']){ echo "<script>self.location='?p=busymission'</script>"; break; } else {
		if($db['missao']>=1000){
			$sqlr=mysql_query("SELECT yens, exp, logo, membros FROM table_missoes WHERE id=".$db['missao']);
			$dbr=mysql_fetch_assoc($sqlr);
			mysql_query("UPDATE table_missoes SET membros=membros-1 WHERE id=".$db['missao']);
			mysql_query("UPDATE organizacoes SET exp=exp+".$dbr['logo']." WHERE id=".$db['orgid']);
			mysql_query("UPDATE membros SET missoes=missoes+1 WHERE usuarioid=".$db['id']." AND orgid=".$db['orgid']);
			$yens=$dbr['yens'];
			$exp=$dbr['exp'];
		} else
		if($db['missao']>900){
			switch($db['missao']){
				case 901: $yens=$db['missao_tempo']*250; break;
				case 902: $yens=$db['missao_tempo']*550; break;
				case 903: $yens=$db['missao_tempo']*1000; break;
				case 904: $yens=$db['missao_tempo']*1800; break;
				case 905: $yens=$db['missao_tempo']*3000; break;
				case 999: $yens=$db['missao_tempo']*100; break;
			}
			$exp=$db['missao_tempo'];
		}
		mysql_query("UPDATE usuarios SET missao=0, yens=yens+".$yens.", yens_fat=yens_fat+".$yens.", exp=exp+".$exp.", exptotal=exptotal+".$exp." WHERE id=".$db['id']);
		mysql_query("INSERT INTO verificador (usuarioid, hora_missao) VALUES (".$db['id'].", '".date('Y-m-d H:i:s')."')");
		$db['yens']=$db['yens']+$yens;
		$db['exp']=$db['exp']+$exp;
		$db['exptotal']=$db['exptotal']+$exp;
	}
}
?>
<div id="newlvl">
</div>
<div class="box_top">Missão Finalizada</div>
<div class="box_middle"><div class="aviso">Parabéns por conseguir terminar esta missão. Como recompensa, estamos lhe dando <b><?php echo number_format($yens,2,',','.'); ?> yens</b>. Além disso, você adquiriu <b><?php echo $exp; ?> ponto<?php if($exp>1) echo 's'; ?> de experiência</b>.<?php if(isset($dbr['logo'])) echo ' Seu clã também recebeu <b>'.$dbr['logo'].' pontos</b> de reputação pelo término da missão.'; ?>
    </div>
</div>
<div class="box_bottom"></div>
<?php
$chance=rand(1,100);
if(($chance<=10)or($chance>=91)){
if($chance<=10){
	$sqli=mysql_query("SELECT * FROM table_itens ORDER BY RAND() LIMIT 1");
	$dbi=mysql_fetch_assoc($sqli);
	mysql_query("INSERT INTO inventario (usuarioid, itemid, categoria) VALUES (".$db['id'].", ".$dbi['id'].", '".$dbi['categoria']."')");
}
if($chance>=91){
	$sqli=mysql_query("SELECT * FROM table_usaveis ORDER BY RAND() LIMIT 1");
	$dbi=mysql_fetch_assoc($sqli);
	mysql_query("INSERT INTO usaveis (usuarioid, itemid) VALUES (".$db['id'].", ".$dbi['id'].")");
}
?>
<div class="box_top">Item Encontrado!</div>
<div class="box_middle">Parabéns! Você encontrou este item enquanto realizava sua missão!<div class="sep"></div>
	<table width="100%" cellpadding="0" cellspacing="1">
    <tr class="table_dados" style="background:#323232;" onmouseover="style.background='#2C2C2C'" onmouseout="style.background='#323232'">
    	<td align="center" width="140"><img src="_img/equipamentos/<?php echo $dbi['imagem']; ?>.jpg" /></td>
        <td style="padding:5px;">
        	<b><?php echo $dbi['nome']; ?></b><br />
            <span class="sub2"><?php echo $dbi['descricao']; ?></span>
            <?php if($chance<=10){ ?>
            <br />
            <b><?php if($dbi['taijutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['taijutsu']).'] em Taijutsu<br />'; ?>
            <?php if($dbi['ninjutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['ninjutsu']).'] em Ninjutsu<br />'; ?>
            <?php if($dbi['genjutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['genjutsu']).'] em Genjutsu<br />'; ?></b>
            <?php } ?>
          </td>
  	</tr>
    </table>
</div>
<div class="box_bottom">
<?php } ?>
<?php
@mysql_free_result($sqlm);
?>