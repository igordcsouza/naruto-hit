<?php
if(date('Y-m-d H:i:s')>=$db['vip']){ echo "<script>self.location='?p=msgvip'</script>"; break; }
if(isset($_GET['receive'])){
	$sqls=mysql_query("SELECT sum(valor) soma FROM vendas WHERE usuarioid=".$db['id']);
	$dbs=mysql_fetch_assoc($sqls);
	if($dbs['soma']<=0){ echo "<script>self.location='?p=home'</script>"; break; }
	$valor=$dbs['soma'];
	mysql_query("DELETE FROM vendas WHERE usuarioid=".$db['id']);
	mysql_query("UPDATE usuarios SET yens=yens+$valor, yens_fat=yens_fat+$valor, venda=venda+$valor WHERE id=".$db['id']);
	echo "<script>self.location='?p=myshop&msg=3'</script>";
}
if(isset($_GET['remove'])){
	vn($_GET['remove']);
	$sqli=mysql_query("SELECT usuarioid FROM inventario WHERE id=".$_GET['remove']);
	$dbi=mysql_fetch_assoc($sqli);
	if($dbi['usuarioid']<>$db['id']){ echo "<script>self.location='?p=home'</script>"; break; }
	mysql_query("UPDATE inventario SET venda='nao', valor=0 WHERE id=".$_GET['remove']);
	echo "<script>self.location='?p=myshop&msg=2'</script>";
}
$sqlv=mysql_query("SELECT sum(valor) soma FROM vendas WHERE usuarioid=".$db['id']);
$dbv=mysql_fetch_assoc($sqlv);
$sqli=mysql_query("SELECT i.id,i.valor anunciado,i.upgrade,t.categoria,t.descricao,t.taijutsu,t.ninjutsu,t.genjutsu,t.nome,t.imagem,t.valor FROM inventario i LEFT OUTER JOIN table_itens t ON i.itemid=t.id WHERE i.usuarioid=".$db['id']." AND venda='sim' ORDER BY id ASC");
$dbi=mysql_fetch_assoc($sqli);
?>
<div class="box_top">Minha Loja</div>
<div class="box_middle">Abaixo estão os itens que você está vendendo em sua loja. Você pode utilizar esta página para remover os itens que não deseja mais vender. Caso venda algum item, o dinheiro ganho ficará guardado em sua loja, e será adicionado à sua reserva apenas quando preferir.
	<?php
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
			case 1: $msg='Item anunciado com sucesso!'; break;
			case 2: $msg='Item foi removido de sua loja.'; break;
			case 3: $msg='Yens foram adicionados à sua reserva!'; break;
			case 4: if(!isset($_GET['value'])) $value=0; else $value=$_GET['value']; $msg='Item vendido com sucesso! Foram creditados '.number_format($value,2,',','.').' yens em sua conta.'; break;
		}
	echo '<div class="sep"></div><div class="aviso">'.$msg.'</div>';
	}
	?>
	<table width="100%" cellpadding="0" cellspacing="1">
    <?php if($dbv['soma']>0) do{ ?>
    <tr>
    	<td colspan="2"><div class="sep"></div></td>
    </tr>
    <tr class="table_dados" style="background:#323232;" onmouseover="style.background='#2C2C2C'" onmouseout="style.background='#323232'">
    	<td colspan="2">Você possui <b><?php echo number_format($dbv['soma'],2,',','.'); ?> yens</b> para receber. Clique <a href="?p=myshop&receive=true">aqui</a> para somar à sua reserva.</td>
  	</tr>
	<?php } while($dbv=mysql_fetch_assoc($sqlv)); ?>
	<?php if(mysql_num_rows($sqli)>0) do{ ?>
    <tr>
    	<td colspan="2"><div class="sep"></div></td>
    </tr>
    <tr class="table_dados" style="background:#323232;" onmouseover="style.background='#2C2C2C'" onmouseout="style.background='#323232'">
    	<td align="center" width="140" valign="top"><img src="_img/equipamentos/<?php echo $dbi['imagem']; ?>.jpg" /></td>
        <td style="padding:5px;">
        	<b><?php echo $dbi['nome']; ?><?php if($dbi['upgrade']>0) echo ' +'.$dbi['upgrade']; ?></b><br />
            <span class="sub2"><?php echo $dbi['descricao']; ?></span><br />
            <b><?php if($dbi['taijutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['taijutsu']+$dbi['upgrade']).'] em Taijutsu<br />'; ?>
            <?php if($dbi['ninjutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['ninjutsu']+$dbi['upgrade']).'] em Ninjutsu<br />'; ?>
            <?php if($dbi['genjutsu']>0) echo '<img src="_img/equipamentos/up.png" width="14" height="14" align="absmiddle" /> [+'.($dbi['genjutsu']+$dbi['upgrade']).'] em Genjutsu<br />'; ?></b>
            <br />
            <span style="font-size:14px;">Valor Anunciado: <b><?php echo number_format($dbi['anunciado'],2,',','.'); ?> yens</b></span><br />
            <a href="?p=myshop&remove=<?php echo $dbi['id']; ?>">Remover</a>
          </td>
  	</tr>
    <?php } while($dbi=mysql_fetch_assoc($sqli)); ?>
    </table>
    <?php if(mysql_num_rows($sqli)==0){ ?>
    <div class="sep"></div>
    <div class="aviso">Nenhum item em sua loja.</div>
    <div class="sep"></div>
    <div align="center"><input type="button" class="botao" value="Adicionar Item" onclick="javascript:location.href='?p=inventory'" /></div>
    <?php } ?>
</div>
<div class="box_bottom"></div>