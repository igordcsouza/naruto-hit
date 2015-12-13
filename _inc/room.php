<?php
$atual=date('Y-m-d H:i:s');
if(isset($_GET['leave'])){
	$sqlv=mysql_query("SELECT id FROM salas WHERE usuarioid=".$db['id']." AND fim>'$atual'");
	$dbv=mysql_fetch_assoc($sqlv);
	mysql_query("UPDATE salas SET usuarioid=0, fim='0000-00-00 00:00:00' WHERE id=".$dbv['id']);
}
if(!isset($_GET['id'])){ echo "<script>self.location='?p=school'</script>"; break; }
$sqlv=mysql_query("SELECT id FROM salas WHERE usuarioid=".$db['id']." AND fim>'$atual' AND id<>".$_GET['id']);
$dbv=mysql_fetch_assoc($sqlv);
if(mysql_num_rows($sqlv)>0){ echo "<script>self.location='?p=school'</script>"; break; }
require_once('verificar_sala.php');
$soma=mktime(date('H'),date('i')+5,date('s'));
$fim=date('Y-m-d H:i:s',$soma);
if((($dbr['usuarioid']==$db['id'])&&($atual>$dbr['fim']))or(($dbr['usuarioid']<>$db['id'])&&($atual>$dbr['fim']))){
	mysql_query("UPDATE salas SET fim='$fim', usuarioid=".$db['id']." WHERE id=".$_GET['id']);
	$dbr['fim']=$fim;
}
?>
<?php
if($atual<$dbr['fim']){
	$fim=$dbr['fim'];
	$sqltempo=mysql_fetch_assoc(mysql_query("SELECT timediff('$fim','$atual') as fim"));
	$fim=$sqltempo['fim'];
	$msgconc='<b>Tempo Restante: <span id="sala_tempo" style="color:#FFFFFF">'.$fim.'</span></b>';
	$msg='<b>Tempo Restante: <span id="sala_tempo" style="color:#FFFFFF">'.$fim.'</span></b>';
} else $msgconc='<b>Tempo Restante: <span id="sala_tempo" style="color:#FFFFFF">'.$fim.'</span></b>';
?>
<script language="javascript" type="text/javascript">
var conc=0;
function calculafim(div,divtotal){
	if(conc==0){
	var navegador=navigator.appName;
	var tmp = document.getElementById(div).innerHTML.split(":");
	var s = tmp[2];
	var m = tmp[1];
	var h = tmp[0];
	s--;
	if (s < 00){ s = 59;	m--; }
	if (m < 00){ m = 59;	h--; };
	s = new String(s); if (s.length < 2) s = "0" + s;
	m = new String(m); if (m.length < 2) m = "0" + m;
	h = new String(h); if (h.length < 2) h = "0" + h;
	
	var temp = h + ":" + m + ":" + s;
	
	document.getElementById(div).innerHTML = temp;
	document.getElementById(div).value = temp;
	atualiza(div,divtotal);
	}
}
<?php if($atual<$dbr['fim']) echo "window.setInterval('calculafim(\"sala_tempo\",\"mensagem\")',1000);"; ?>
function atualiza(div,divtotal){
  	if((document.getElementById(div).value) < "00:00:01"){
  		self.location="?p=school";
  		conc=1;
	}
}
</script>
<div class="box_top">Sala <?php echo $_GET['id']; ?></div>
<div class="box_middle">Bem-vindo à minha sala! Serei seu professor pelos próximos 5 minutos. Escolha abaixo o que você deseja aprender, que eu tentarei lhe ensinar. Fique de olho no tempo, não irei tolerar 1 segundo a mais!<div class="sep"></div>
	<div class="aviso" id="mensagem">
    <?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
			case 1: $errmsg='Você não está pronto para controlar a natureza do seu chakra.<br />Volte quando estiver no nível 12.'; break;
			case 2: $errmsg='Parabéns! Você aprendeu um novo jutsu!<br />Utilize nossa área de treinamento para aperfeiçoá-lo assim que desejar.'; break;
			case 3: $errmsg='Você não está pronto para treinar sua linhagem avançada.<br />Volte quando estiver no nível 5.'; break;
			case 4: $errmsg='Seu doujutsu já foi liberado.<br />O aprimoramento de seu doujtsu depende da utilização.'; break;
			case 5: $errmsg='Você já controla uma natureza do chakra. Volte quando estiver no nível 40.'; break;
		}
	echo $errmsg.'<div class="sep"></div>';
	}
	?>
    <b>
	<?php
	if($atual<$dbr['fim'])
		echo $msg; 
	else
		echo $msgconc;
	?>
    </b></div><div class="sep"></div>
    <div align="center">
    <table width="100%" cellpadding="0" cellspacing="1">
  	  <tr>
            <td align="center"><a href="?p=elements&amp;id=<?php echo $_GET['id']; ?>"><img src="_img/school/chakra.jpg" border="0" /></a></td>
          	<td align="center"><a href="?p=learn&amp;id=<?php echo $_GET['id']; ?>"><img src="_img/school/jutsu.jpg" border="0" /></a></td>
            <td align="center"><a href="?p=schooltrain&amp;id=<?php echo $_GET['id']; ?>"><img src="_img/school/treino.jpg" border="0" /></a></td>
      </tr>
    </table>
    <div class="sep"></div>
    <div align="center"><input type="button" class="botao" value="Sair da Sala" onclick="location.href='?p=room&leave=true'" /></div>
  </div>
</div>
<div class="box_bottom"></div>
<?php
@mysql_free_result($sqlv);
?>