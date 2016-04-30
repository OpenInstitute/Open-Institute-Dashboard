	<?php
	mysql_select_db($database_conn, $conn);
	$query_Contents0 = sprintf("select  menuname, menulink, menuid from menu where viewed =1 ORDER BY seq");
	$Contents0 = mysql_query($query_Contents0, $conn) or die(mysql_error());
	//$row_Contents0 = mysql_fetch_assoc($Contents0);
	$totalRows_Contents0 = mysql_num_rows($Contents0);
?>



  <div class="clearFix" >
<ul id="Menu1" class="MM">
<?php while ($row_Contents0=mysql_fetch_array($Contents0)) {?>
	<li><a class="mainmenu" href="<?php echo $row_Contents0['menulink']; ?>?MID=<?php echo base64_encode($row_Contents0['menuid']); ?>"><?php echo $row_Contents0['menuname']; ?></a>
	<?php
	$menuid=$row_Contents0['menuid'];
	mysql_select_db($database_conn, $conn);
	$query_Contents1 = sprintf("select submenuid, submenuname, submenulink, menuid from submenu where viewed =1 and menuid = $menuid ORDER BY seq");
	$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
	//$row_Contents1 = mysql_fetch_assoc($Contents1);
	$totalRows_Contents1 = mysql_num_rows($Contents1);
		if ($totalRows_Contents1>=1){
		echo "<ul>";
	 	while ($row_Contents1=mysql_fetch_array($Contents1)) {?>
		  <li><a class="mainmenu" href="<?php echo $row_Contents1['submenulink']; ?>?MID=<?php echo base64_encode($menuid); ?>&SMID=<?php echo base64_encode($row_Contents1['submenuid']); ?>"><?php echo $row_Contents1['submenuname']; ?></a></li>
			<?php 
				}
		echo "</ul>";
			} ?>
	</li>
<?php } ?>
</ul>

</div>

