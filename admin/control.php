<?php

function menu($inputVal) {

$query_Contents =mysql_query("SELECT menuid, menuname FROM menu  WHERE viewed = 1");
$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
			$Menu=(int)$row_Contents['menuid'];
				if ($Menu==$inputVal){
				printf ("<option value=". $row_Contents['menuid'] ." selected>". $row_Contents['menuname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['menuid'] .">". $row_Contents['menuname'] ."</option>"); 
				}
			} 
	}	
}

function submenuSel($inputVal) {

$query_Contents =mysql_query("SELECT submenuid, submenuname FROM submenu  WHERE viewed = 1 AND menuid=$inputVal");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			printf ("<option value='0'>Select SubMenu</option>");
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				$submenuid=(int)$row_Contents['submenuid'];
				if ($submenuid==$inputVal){
				printf ("<option value=". $row_Contents['submenuid'] ." selected>". $row_Contents['submenuname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['submenuid'] .">". $row_Contents['submenuname'] ."</option>");
				}
			} 

	}	
}

function submenu($inputVal) {

$query_Contents =mysql_query("SELECT submenuid, submenuname FROM submenu  WHERE viewed = 1");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				$submenuid=(int)$row_Contents['submenuid'];
				if ($submenuid==$inputVal){
				printf ("<option value=". $row_Contents['submenuid'] ." selected>". $row_Contents['submenuname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['submenuid'] .">". $row_Contents['submenuname'] ."</option>");
				}
			} 

	}	
}

function bannercategory($inputVal) {

$query_Contents =mysql_query("SELECT bannercatid, bannercatname FROM bannercategory WHERE viewed = 1");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				$bannercatid=(int)$row_Contents['bannercatid'];
				if (in_array($bannercatid,explode(',',$inputVal))){
				printf ("<option value=". $row_Contents['bannercatid'] ." selected>". $row_Contents['bannercatname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['bannercatid'] .">". $row_Contents['bannercatname'] ."</option>");
				}
			} 

	}	
}


function events($inputVal) {

$query_Contents =mysql_query("SELECT num , heading FROM events  WHERE  viewed = 1");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				
				$num=(int)$row_Contents['num'];
				if (in_array($num,explode(',',$inputVal))){
				printf ("<option value=". $row_Contents['num'] ." selected>". substr($row_Contents['heading'],0,60). "</option>");
				} else {
				printf ("<option value=". $row_Contents['num'] .">". substr($row_Contents['heading'],0,60) ."</option>");
				}
			} 

	}	
}


function DropAdminCat($inputVal) {

$query_Contents =mysql_query("SELECT AdminCatID, CatName FROM _admincat WHERE Viewed = 1 ORDER BY CatName ;");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				if ($inputVal==$row_Contents['AdminCatID']){
				printf ("<option value=". $row_Contents['AdminCatID'] ." selected>". $row_Contents['CatName'] ."</option>");
				}
			printf ("<option value=". $row_Contents['AdminCatID'] .">". $row_Contents['CatName'] ."</option>");
			} 

	}	
}

 ?>
