
<?php 
					$menuid==base64_decode($_GET['MID']);
					if ($menuid==0) {$menuid=1;}
					$query_Links0= "SELECT * FROM menu WHERE menuid=$menuid";
					mysql_select_db($database_conn, $conn);
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					$row_Contents0 = mysql_fetch_assoc($Contents0);
?>
<meta name="keywords" content="<?php echo $row_Contents0['keywords']; ?>" />
