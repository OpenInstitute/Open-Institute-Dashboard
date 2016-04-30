<?php

function DropOrgtype($inputVal) {

$query_Contents =mysql_query("SELECT orgtypeid, orgtype FROM cncd_orgtype  WHERE viewed = 1 ORDER BY orgtype");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				if ($inputVal==$row_Contents['orgtypeid']){
				printf ("<option value=". $row_Contents['orgtypeid'] ." selected>". $row_Contents['orgtype'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['orgtypeid'] .">". $row_Contents['orgtype'] ."</option>");
				}
			} 

	}	
}



function DropCountry($inputVal) {

$query_Contents =mysql_query("SELECT * FROM cncd_country  ORDER BY countryname ;");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
			while ($row_Contents=mysql_fetch_array($query_Contents)) {
				if ($inputVal==$row_Contents['countryid']){
				printf ("<option value=". $row_Contents['countryid'] ." selected>". $row_Contents['countryname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents['countryid'] .">". $row_Contents['countryname'] ."</option>");
				}
			} 

	}	
}

function DropExpertise($inputVal) {
$expertin=explode(',',$inputVal);
$query_Contents =mysql_query("SELECT * FROM cncd_expertise WHERE viewed = 1  ORDER BY expertise ;");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
	$c=0;
	echo "<table width='100%' border=0>";
	while ($row_Contents=mysql_fetch_array($query_Contents)) {
	$t=$c % 2;
		if ($t==0){ echo "<tr><td width='50%'>";} else {echo "</td><td width='50%'>";}
			if (in_array($row_Contents['expertiseid'], $expertin)){
			printf ("<input type='checkbox' name='ex". $row_Contents['expertiseid'] ."' checked>". $row_Contents['expertise'] ."<br>");
			} else {
			printf ("<input type='checkbox' name='ex". $row_Contents['expertiseid'] ."'>". $row_Contents['expertise'] ."<br>");
			}
		if ($t==1){ echo "</td></tr>";}
		$c=$c+1;
	} 
	if ($t==0){ echo "</td><td>&nbsp;</td></tr>";}
	echo "</table>";
	}
		
}

function DropNCD($inputVal) {
$ncds=explode(',',$inputVal);
$query_Contents =mysql_query("SELECT * FROM cncd_disease WHERE viewed = 1  ORDER BY diseasename ;");

$totalRows_Contents = mysql_num_rows($query_Contents);
	if ($totalRows_Contents>=1){ 
	$c=0;
	echo "<table width='100%' border=0>";
	while ($row_Contents=mysql_fetch_array($query_Contents)) {
	$t=$c % 2;
		if ($t==0){ echo "<tr><td width='50%'>";} else {echo "</td><td width='50%'>";}
			if (in_array($row_Contents['diseaseid'], $ncds)){
			printf ("<input type='checkbox' name='nc". $row_Contents['diseaseid'] ."' checked>". $row_Contents['diseasename'] ."<br>");
			} else {
			printf ("<input type='checkbox' name='nc". $row_Contents['diseaseid'] ."'>". $row_Contents['diseasename'] ."<br>");
			}
		if ($t==1){ echo "</td></tr>";}
		$c=$c+1;
	} 
	if ($t==0){ echo "</td><td>&nbsp;</td></tr>";}
	echo "</table>";
	}
	
}

function DropInvolvment($inputVal,$inputVal2,$inputVal3) {

$query_Contents=sprintf("SELECT * FROM cncd_involvement_expertise  WHERE expertiseid = $inputVal3 AND userid = $inputVal2 AND diseaseid = $inputVal");
echo $query_Contents; exit;
$Contents= mysql_query($query_Contents, $conn) or die(mysql_error());
$row_Contents=mysql_fetch_assoc($Contents);
$invid=$row_Contents['involvementid'];
			
$query_Contents1 =mysql_query("SELECT involvementid, involvementname FROM cncd_involvement  WHERE viewed = 1");
$totalRows_Contents1 = mysql_num_rows($query_Contents1);
		if ($totalRows_Contents>=1){ 
			while ($row_Contents1=mysql_fetch_array($query_Contents1)) {
				if ($invid==$row_Contents1['involvementid']){
				printf ("<option value=". $row_Contents1['involvementid'] ." selected>". $row_Contents1['involvementname'] ."</option>");
				} else {
				printf ("<option value=". $row_Contents1['involvementid'] .">". $row_Contents1['involvementname'] ."</option>");
				}
			} 
		}	
}



function SDate($dtDateTime)
{
  extract($GLOBALS);

  if ($isDate[$dtDateTime])
  {

    $function_ret=str_replace(".","/",$dtDateTime);
  } 

  return $function_ret;
} 

function ActiveLink($ActiveMode,$urllink,$Lname)
{
 // extract($GLOBALS);

  if ($ActiveMode)
  {

    $ALink="<a style='color:#FF9900;TEXT-DECORATION: none' href=".$urllink.">".$Lname."</a>";
  }
    else
  {

    $ALink=$Lname;
  } 

  echo $ALink;
  //return $function_ret;
} 


if(!get_magic_quotes_gpc()){

  $_GET = array_map('mysql_real_escape_string', $_GET); 
  $_POST = array_map('mysql_real_escape_string', $_POST); 
  $_COOKIE = array_map('mysql_real_escape_string', $_COOKIE);

} else {  

   $_GET = array_map('stripslashes', $_GET); 
   $_POST = array_map('stripslashes', $_POST); 
   $_COOKIE = array_map('stripslashes', $_COOKIE);
   $_GET = array_map('mysql_real_escape_string', $_GET); 
   $_POST = array_map('mysql_real_escape_string', $_POST); 
   $_COOKIE = array_map('mysql_real_escape_string', $_COOKIE);
}


function scale_image($p,$mw='',$mh='') { // path max_width max_height
    if(list($w,$h) = @getimagesize($p)) {
    foreach(array('w','h') as $v) { $m = "m{$v}";
        if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
        $r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
    return("<img src='{$p}' alt='image' width='{$w}' height='{$h}' align='left'/>"); }
}


function scale_image_gallery($p,$mw='',$mh='',$t='') { // path max_width max_height
    if(list($w,$h) = @getimagesize($p)) {
    foreach(array('w','h') as $v) { $m = "m{$v}";
        if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
        $r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
    return("<img src='{$p}'  class='thumbnail' alt='image' width='{$w}' height='{$h}' title={$t} alt={$t} />"); }
}

function scale_image_gallery_full($p,$mw='',$mh='') { // path max_width max_height
    if(list($w,$h) = @getimagesize($p)) {
    foreach(array('w','h') as $v) { $m = "m{$v}";
        if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
        $r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
    return("<img src='{$p}'  class='full' alt='image' width='{$w}' height='{$h}'/>"); }
}

$userid=(int)$_SESSION['userid'];
 #
if (isset($_GET['download']) && $_GET['download']) {
#
// tell browser its a download
#
header('Content-Disposition: attachment; filename='.$_SERVER['SCRIPT_NAME']);
#
}

?>

