<?php
$atual=date('Y-m-d H:i:s');
if($db['missao']>0){ echo "<script>self.location='?p=busymission'</script>"; break; }
if($db['hunt']>0){ echo "<script>self.location='?p=busyhunt'</script>"; break; }
if($db['treino']>0){ echo "<script>self.location='?p=busytrain'</script>"; break; }
if((isset($_GET['p']))&&($_GET['p']<>'train')){
	if(date('Y-m-d H:i:s')<$db['penalidade_fim']){ echo "<script>self.location='?p=penalty'</script>"; break; }
}
$sqls=mysql_query("SELECT count(id) conta FROM salas WHERE usuarioid=".$db['id']." AND fim>'$atual'");
$dbs=mysql_fetch_assoc($sqls);
if(($dbs['conta']>0)&&($_GET['p']<>'school')){ echo "<script>self.location='?p=school'</script>"; break; }
@mysql_free_result($sqls);
?>