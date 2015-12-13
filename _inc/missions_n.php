<div align="center">
<table width="100%" cellpadding="0" cellspacing="1">
<?php if($db['nivel']>=60){ ?>
<tr>
	<td colspan="3"><div class="sep"></div></td>
</tr>
<tr class="table_dados" style="background:#323232">
    <td><img src="_img/missoes/ranks.jpg" /></td>
    <td><b>Rank S</b><br /><span class="sub2">3.000,00 yens<br />por hora</span></td>
    <td>
    <form method="post" id="missao" name="missao" action="?p=missions" onsubmit="subm.value='Carregando...';subm.disabled=true;">
    <input type="hidden" id="mis_rank" name="mis_rank" value="<?php echo $c->encode('S',$chaveuniversal); ?>">
    <select id="mis_tempo" name="mis_tempo">
    	<?php $i=1; do{ ?>
    	<option value="<?php echo $c->encode($i,$chaveuniversal); ?>"><?php echo $i; ?> hora<?php if($i>1) echo 's'; ?></option>
        <?php $i++; } while($i<25); ?>
    </select>
    <br /><span class="sub2">Selecione a quantidade de horas</span>
    <input type="submit" id="subm" name="subm" class="botao" value="Escolher">
    </form>    </td>
</tr>
<?php } ?>
<?php if($db['nivel']>=40){ ?>
<tr>
	<td colspan="3"><div class="sep"></div></td>
</tr>
<tr class="table_dados" style="background:#323232">
    <td><img src="_img/missoes/ranka.jpg" /></td>
    <td><b>Rank A</b><br /><span class="sub2">1.800,00 yens<br />por hora</span></td>
    <td>
    <form method="post" id="missao" name="missao" action="?p=missions" onsubmit="subm.value='Carregando...';subm.disabled=true;">
    <input type="hidden" id="mis_rank" name="mis_rank" value="<?php echo $c->encode('A',$chaveuniversal); ?>">
    <select id="mis_tempo" name="mis_tempo">
    	<?php $i=1; do{ ?>
    	<option value="<?php echo $c->encode($i,$chaveuniversal); ?>"><?php echo $i; ?> hora<?php if($i>1) echo 's'; ?></option>
        <?php $i++; } while($i<25); ?>
    </select>
    <br /><span class="sub2">Selecione a quantidade de horas</span>
    <input type="submit" id="subm" name="subm" class="botao" value="Escolher">
    </form>    </td>
</tr>
<?php } ?>
<?php if($db['nivel']>=20){ ?>
<tr>
	<td colspan="3"><div class="sep"></div></td>
</tr>
<tr class="table_dados" style="background:#323232">
    <td><img src="_img/missoes/rankb.jpg" /></td>
    <td><b>Rank B</b><br /><span class="sub2">1.000,00 yens<br />por hora</span></td>
    <td>
    <form method="post" id="missao" name="missao" action="?p=missions" onsubmit="subm.value='Carregando...';subm.disabled=true;">
    <input type="hidden" id="mis_rank" name="mis_rank" value="<?php echo $c->encode('B',$chaveuniversal); ?>">
    <select id="mis_tempo" name="mis_tempo">
    	<?php $i=1; do{ ?>
    	<option value="<?php echo $c->encode($i,$chaveuniversal); ?>"><?php echo $i; ?> hora<?php if($i>1) echo 's'; ?></option>
        <?php $i++; } while($i<25); ?>
    </select>
    <br /><span class="sub2">Selecione a quantidade de horas</span>
    <input type="submit" id="subm" name="subm" class="botao" value="Escolher">
    </form>    </td>
</tr>
<?php } ?>
<?php if($db['nivel']>=5){ ?>
<tr>
	<td colspan="3"><div class="sep"></div></td>
</tr>
<tr class="table_dados" style="background:#323232">
    <td><img src="_img/missoes/rankc.jpg" /></td>
    <td><b>Rank C</b><br /><span class="sub2">550,00 yens<br />por hora</span></td>
    <td>
    <form method="post" id="missao" name="missao" action="?p=missions" onsubmit="subm.value='Carregando...';subm.disabled=true;">
    <input type="hidden" id="mis_rank" name="mis_rank" value="<?php echo $c->encode('C',$chaveuniversal); ?>">
    <select id="mis_tempo" name="mis_tempo">
    	<?php $i=1; do{ ?>
    	<option value="<?php echo $c->encode($i,$chaveuniversal); ?>"><?php echo $i; ?> hora<?php if($i>1) echo 's'; ?></option>
        <?php $i++; } while($i<25); ?>
    </select>
    <br /><span class="sub2">Selecione a quantidade de horas</span>
    <input type="submit" id="subm" name="subm" class="botao" value="Escolher">
    </form>    </td>
</tr>
<?php } ?>
<tr>
	<td colspan="3"><div class="sep"></div></td>
</tr>
<tr class="table_dados" style="background:#323232">
    <td><img src="_img/missoes/rankd.jpg" /></td>
    <td><b>Rank D</b><br /><span class="sub2">250,00 yens<br />por hora</span></td>
    <td>
    <form method="post" id="missao" name="missao" action="?p=missions" onsubmit="subm.value='Carregando...';subm.disabled=true;">
    <input type="hidden" id="mis_rank" name="mis_rank" value="<?php echo $c->encode('D',$chaveuniversal); ?>">
    <select id="mis_tempo" name="mis_tempo">
    	<?php $i=1; do{ ?>
    	<option value="<?php echo $c->encode($i,$chaveuniversal); ?>"><?php echo $i; ?> hora<?php if($i>1) echo 's'; ?></option>
        <?php $i++; } while($i<25); ?>
    </select>
    <br /><span class="sub2">Selecione a quantidade de horas</span>
    <input type="submit" id="subm" name="subm" class="botao" value="Escolher">
    </form>    </td>
</tr>
</table>
</div>