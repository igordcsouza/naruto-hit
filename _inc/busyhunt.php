<?php
$atual=date('Y-m-d H:i:s');
if($db['hunt']>0){
	if($atual<$db['hunt_fim']){
		$fim=$db['hunt_fim'];
		$sqltempo=mysql_fetch_assoc(mysql_query("SELECT timediff('$fim','$atual') as fim"));
		$fim=$sqltempo['fim'];
		$msgconc='Sua caça foi concluída! Clique <a href="?p=rewardhunt">aqui</a> para receber as recompensas!';
		$msg='Você está em uma caça neste momento.<br />Faltam <b><span id="hunt_tempo">'.$fim.'</span></b> para terminar a caça.';
	} else $msgconc='Sua caça foi concluída! Clique <a href="?p=rewardhunt">aqui</a> para receber as recompensas!';
} else { echo "<script>self.location='?p=home'</script>"; break; }
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
	document.title='['+temp+'] :: narutoHIT - mesmo nome, nova história! ::';
	}
}
<?php if($atual<$db['hunt_fim']) echo "window.setInterval('calculafim(\"hunt_tempo\",\"mensagem\")',1000);"; ?>
function atualiza(div,divtotal){
  	if((document.getElementById(div).value) < "00:00:01"){
  		self.location="?p=rewardhunt";
  		conc=1;
	}
}
</script>
<div class="box_top">Ocupado</div>
<div class="box_middle">
<div class="aviso" id="mensagem">
	<?php
	if(($atual<$db['hunt_fim']&&($db['hunt']>0)))
		echo $msg;
	else
		echo $msgconc;
	?>
</div>
</div>
<div class="box_bottom"></div>