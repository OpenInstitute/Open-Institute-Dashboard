<?
require('../Includefiles/conn.inc');

if(isset($_GET['menuid'])){
	$menuid = $_GET['menuid'];
	$res = mysql_query("select menuid, submenuid, submenuname from submenu where menuid = $menuid") or die(mysql_error());
	echo "<select name='submenuid'>";
	echo "<option value='0'>SHOW IN ALL</option>";
	while($inf = mysql_fetch_array($res)){
		echo "<option value=".$inf["submenuid"].">".$inf["submenuname"]."</option>";
	}	
	echo "</select>";
}
?>
