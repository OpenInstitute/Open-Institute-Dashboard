<?php
require('../Includefiles/conn.inc');
$formname=$_POST['formname'];
//$pageRef=mid($_REQUEST[ServerVariables("HTTP_REFERER"),instrrev(Request.ServerVariables("HTTP_REFERER"),"/")+1)

//echo $formname ;
$CID=$_POST['CID'];
	$PageTitle=$_POST['PageTitle'];
	$PageURL=$_POST['PageURL'];
	$PageID=$_POST['PageID'];
	
	$AdminID1=$_POST['AdminID1'];
	$AdminUser=$_POST['AdminUser'];
	$AdminName=$_POST['AdminName'];
	$AdminCatID=$_POST['AdminCatID'];

$menuid=$_POST['menuid'];
$submenuid=$_POST['submenuid'];
$quoteid=$_POST['quoteid'];
$PassText=$_POST['PassText'];

	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$detail=$_POST['detail'];
	$detail=str_replace("http://http://","http://",$detail);
	
	$detail=str_replace("'","&#39;",$detail);
	//$detail=addslashes($detail);
	$menuname=$_POST['menuname'];
	$menuname=str_replace("'","&rsquo;",$menuname);
	$keywords=$_POST['keywords'];
	$topmenu=$_POST['topmenu'];
	$submenuname=$_POST['submenuname'];
	$submenuname=str_replace("'","&rs",$submenuname);
	$menulink=$_POST['menulink'];
	$adminlink=$_POST['adminlink'];
	$submenuid=(int)$_POST['submenuid'];
	$submenulink=$_POST['submenulink'];

	$newsletterid=$_POST['newsletterid'];
	$newslettername=$_POST['newslettername'];
	$newsletterlink=$_POST['newsletterlink'];
	
	$publicationname=$_POST['publicationname'];
	$publicationid=$_POST['publicationid'];
	$publicationdetail=$_POST['publicationdetail'];
	
	$docname=$_POST['docname'];
	$documentid=$_POST['documentid'];
	$doctype=$_POST['doctype'];

	$gallerycategoryid=$_POST['gallerycategoryid'];
	$gallerycategory=$_POST['gallerycategory'];
	
	$galleryid=$_POST['galleryid'];
	$galleryname=$_POST['galleryname'];
	$imageurl=$_FILES['imageurl'];
	
	$bannerid=$_POST['bannerid'];
	$bannercaption=$_POST['bannercaption'];
	$bannerlink=$_POST['bannerlink'];
	$bannercatid=$_POST['bannercatid'];
	$eventid=$_POST['eventid'];
	
	$OfficeID=$_POST['OfficeID'];
	$OfficeName=$_POST['OfficeName'];
	
	$personid=$_POST['personid'];
	$personname=$_POST['personname'];
	$personimg=$_POST['personimg'];

	$seminarid=$_POST['seminarid'];
	$title=$_POST['title'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];

	$statusname=$_POST['statusname'];
	$requestid=$_POST['requestid'];
	
	$photoname=$_POST['photoname'];
	$photoid=$_POST['photoid'];
	$photofile=$_POST['photofile'];
	
	$OrgName=$_POST['OrgName'];
	$Email=$_POST['Email'];
	$Address=$_POST['Address'];
	$Telephone=$_POST['Telephone'];
	$CountryID=$_POST['CountryID'];
	$ApplicantID=$_POST['ApplicantID'];

	$viewed=$_POST['viewed'];
	$active=$_POST['active'];
	$today = date("y-m-d");
	$seq=$_POST['seq'];
	
	$EventDate=$_POST['EventDate'];
	$EventDetail=$_POST['EventDetail'];
	$EventProgramme=$_POST['EventProgramme'];
	$EventSpeakers=$_POST['EventSpeakers'];
	$EventID=$_POST['EventID'];
	$EventDate=$_POST['EventDate'];
	$EventHour=$_POST['EventHour'];
	$EventMin=$_POST['EventMin'];
	$EventHeading=$_POST['EventHeading'];
	$Archived=$_POST['Archived'];
	
	$functionid=mysql_escape_string($_POST['functionid']);
	$functionname=mysql_escape_string($_POST['functionname']);
	$functiondetail=mysql_escape_string($_POST['functiondetail']);
	$functioncost=mysql_escape_string($_POST['functioncost']);
		
	$ncdid=$_POST['ncdid'];
	$expertiseid=$_POST['expertiseid'];

if ($topmenu=="on") {
	$topmenu=1;
}else{
	$topmenu=0;
}

if ($viewed=="on") {
	$viewed=1;
}else{
	$viewed=0;
}

if ($active=="on") {
	$active=1;
}else{
	$active=0;
}

if ($Archived=="on") {
	$Archived=1;
}else{
	$Archived=0;
}

//echo $viewed;
$uname=$_POST['uname'];
$passw=$_POST['passw'];
//echo $viewed;

			
//$filepath=Request.ServerVariables("PATH_TRANSLATED")
//$filepath = Left(filepath ,InStrRev(filepath, "\"))
//$filepath
//'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
// NEW BUSINESS
//'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//	$thisyear=year(date())-1;
//	$lastyear=year(date())-2;
//echo $formname;

				
if ($formname=="AdmLogoff") {
		$_SESSION['AdminID']=0;
		//echo $_SESSION['AdminID'];
		header("location:index.php");
}

if ($formname=="Admpass") {
		$query_Log=sprintf("SELECT  * FROM _adminuser WHERE AdminPass = '$passw' AND AdminUser = '$uname' AND Active =1;");
		//echo $query_Log; exit;
		$Contents = mysql_query($query_Log, $conn) or die(mysql_error());
	$row_Contents = mysql_fetch_assoc($Contents);
	$totalRows_Contents = mysql_num_rows($Contents);
		
		if($totalRows_Contents>=1) {
		//echo $totalRows_Contents;
			$_SESSION['AdminID']=$row_Contents['AdminID'];
		}else{
			$_SESSION['AdminID']=0;
		}
		//echo $_SESSION['AdminID'];
		header("location:AdminCategory.php");
}
						
if ($formname=="AdminAdd"){
		$sqsite2="INSERT INTO _adminuser (AdminUser, AdminName, AdminPass, AdminCatID, Active) VALUES ('$AdminUser','$AdminName' , '$passw', $AdminCatID, $viewed);";
		//mysql_select_db($database_conn, $conn);
		//echo $sqsite2; exit;
		mysql_query($sqsite2,$conn);
		header("location:AppendAdmin.php?Add=1");
}

if ($formname=="AdminUpdate"){

			$sqsite2= "UPDATE _adminuser SET AdminUser='$AdminUser', AdminName='$AdminName',AdminPass ='$passw', AdminCatID=$AdminCatID, Active=$viewed WHERE AdminID=$AdminID1;";
			//mysql_select_db($database_conn, $conn);
			//echo $sqsite2; exit;
			mysql_query($sqsite2,$conn);
			header("location:AppendAdmin.php?Edit=$AdminID1");
}


if ($formname=="PageCatUpdate"){

			$sqsite= "DELETE FROM _admincatpage WHERE (AdminCatID = $CID); ";
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite,$conn);
					$query_Contents1 = sprintf("SELECT * FROM  _adminpage WHERE Viewed = 1;");
						//echo $query_Contents1;
					$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
					while ($row_Contents1=mysql_fetch_array($Contents1)) {
						$AdminPageID = $row_Contents1['AdminPageID'];
						$pid = 'PageID' . $AdminPageID ;
						//echo $pid;	exit;				
						$PageID = $_POST[$pid];					
						if ($PageID=="on") {
							$sqsite2= " INSERT INTO _admincatpage (AdminPageID, AdminCatID) VALUES ($AdminPageID , $CID);";
							//mysql_select_db($database_conn, $conn);
							//echo $sqsite2; exit;
							mysql_query($sqsite2,$conn);
						}
					}
			header("location:AdminCategory.php?Edit=$CID");
}

if ($formname=="PageAdd"){
		$sqsite2="INSERT INTO _adminpage (AdminPageTitle, AdminPageURL, Seq, Viewed) VALUES ('$PageTitle' , '$PageURL', '$seq', $Viewed);";
		//mysql_select_db($database_conn, $conn);
		//echo $sqsite2; exit;
		mysql_query($sqsite2,$conn);
		header("location:PageAdmin.php?Add=1");
}

if ($formname=="PageUpdate"){
					
			$sqsite2= "UPDATE _adminpage SET AdminPageTitle='$PageTitle', AdminPageURL='$PageURL', Seq='$seq', Viewed=$viewed WHERE AdminPageID=$PageID;";
			//mysql_select_db($database_conn, $conn);
			//echo $sqsite2; exit;
			mysql_query($sqsite2,$conn);

			header("location:PageAdmin.php?Edit=$PageID");
}

if ($formname=="userunseen") {
 
	$query_Links0= sprintf("UPDATE    users SET   viewed = 0 WHERE     (userid =  $ApplicantID);");
		mysql_select_db($database_conn, $conn);
		$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
		//$totalRows_Contents = mysql_num_rows($Contents0);

	 header("location:index.php");
}

if ($formname == "MenuAdd") {
				$sqlup="INSERT INTO menu 
					 (menuname, menudetail,keywords, menulink, adminlink, seq, topmenu,viewed) 
					 VALUES     ('$menuname' ,  '$detail','$keywords', '$menulink', '$adminlink','$seq', $topmenu, $viewed );";
					//echo $sqlup; exit;
			//mysql_select_db($database_conn, $conn);
			$Contents = mysql_query($sqlup, $conn) or die(mysql_error());
			header("location:menuAdmin.php");
}

if ($formname == "MenuUpdate") {
			$sqlup="UPDATE menu SET 
					 menuname='$menuname', menudetail='$detail',keywords='$keywords' , menulink= '$menulink',  
					 adminlink= '$adminlink', seq='$seq', topmenu=$topmenu, viewed=$viewed
					 WHERE menuid= $menuid;";
			//echo $sqlup;		 
			$Contents = mysql_query($sqlup, $conn) or die(mysql_error());
			header("location:menuAdmin.php?Edit=$menuid");
}

if ($formname=="SubMenuUpdate"){
		$sqsite2= " UPDATE submenu SET submenuname ='$submenuname', menuid=$menuid, submenudetail='$detail', 
		submenulink='$submenulink',adminlink='$adminlink' , seq='$seq', viewed=$viewed
					WHERE submenuid=$submenuid;"; 

		//echo $sqsite2; exit;
		mysql_select_db($database_conn, $conn);
		mysql_query($sqsite2,$conn);
		header("location:SubMenuAdmin.php?Edit=$submenuid");
}
		
if ($formname=="SubMenuAdd"){
			
			$sqsite2= " INSERT INTO submenu (submenuname , menuid, submenudetail,  submenulink, adminlink, seq, viewed) 
					 VALUES ( '$submenuname' ,$menuid,  '$detail', '$submenulink', '$adminlink','$seq', $viewed );";
				//echo $sqsite2;
				mysql_select_db($database_conn, $conn);
				mysql_query($sqsite2,$conn);
			header("location:SubMenuAdmin.php");
}
			
if ($formname=="NewsletterUpdate"){
	if (strlen($_FILES['docurl']['name'])>=4) 
	{
		$docnm="newsletterlink='".$_FILES['docurl']['name'] ."',"; fileLoader('documents');
	} 
			$sqsite2= "UPDATE newsletters SET newslettername='$newslettername',newsletterdetail='$detail', $docnm 
			viewed=$viewed,seq='$seq' WHERE newsletterid=$newsletterid";
			//echo $sqsite2;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:AdminNewsletter.php?Edit=$newsletterid");
}
	 
			//echo $formname;
if ($formname=="NewsletterAdd"){
		if (strlen($_FILES['docurl']['name'])>=4) {$docnm=$_FILES['docurl']['name'];fileLoader('documents');} else {$docnm='sample.pdf';}					
			$sqsite2= "INSERT INTO newsletters (newslettername, newsletterdetail, newsletterlink, viewed,seq)
			 VALUES ('$newslettername','$detail',$docnm,$viewed,'$seq')";
			//echo $sqsite2;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:AdminNewsletter.php");
}
		
if ($formname=="GalleryCatAdd"){
			
			$sqsite2= "INSERT INTO gallerycategory (gallerycategory,viewed ) VALUES ('$gallerycategory',$viewed)";
			//echo $sqsite2;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:GalleryAdmin.php");
}

if ($formname=="GalleryCatUpdate"){
			
			$sqsite2= "UPDATE gallerycategory SET gallerycategoryname='$gallerycategory',viewed=$viewed WHERE gallerycategoryid= $gallerycategoryid";
			//echo $sqsite2; exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:GalleryAdmin.php?GalleryCatEdit=$gallerycategoryid");
}


if ($formname=="GalleryUpdate"){
			
			$sqsite2= "UPDATE gallery SET gallerycategoryid=$gallerycategoryid,galleryname='$galleryname',
			viewed=$viewed,seq='$seq' WHERE galleryid=$galleryid";
			//echo $sqsite2; 
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:GalleryAdmin.php?GalleryCatEdit=$gallerycategoryid");
}
	 
			//echo $formname;
if ($formname=="GalleryAdd"){
		
			if (strlen($_FILES['imageurl']['name'])>=4) {
				$imagename=$_FILES['imageurl']['name'];
				if ($imagename["error"]==0) {	
				  //echo $filename["type"];
					if ((($imagename["type"] == "image/jpeg")
					|| ($imagename["type"] == "image/gif")
					|| ($imagename["type"] == "image/png"))
					&& ($imagename["size"] < 2000000))
					{
					$tmpName=$imagename["tmp_name"];
					
							$uploadDir = realpath(dirname($_SERVER['DOCUMENT_ROOT'])) . '/httpdocs/'.$tgt.'/';
					
					echo $uploadDir; exit;
					$filePath = $uploadDir . $imagename["name"];
					$result = move_uploaded_file($tmpName, $filePath);
					
				  }
				}
			} 
			else 
			{	
				$imagename='sample.jpg';
			}						
			$sqsite2= "INSERT INTO gallery (gallerycategoryid, galleryname, galleryimg, viewed, seq)
			VALUES ($gallerycategoryid,'$galleryname','$imagename',$viewed,'$seq')";
			//echo $sqsite2;exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:GalleryAdmin.php?GalleryCatEdit=$gallerycategoryid");
}
							


if ($formname=="PublicationUpdate"){

//echo $_FILES['docurl']['type'];
//echo $doctype; exit;
	if (strlen($_FILES['docurl']['name'])>=4) 
	{
		$docnm="documenturl='".$_FILES['docurl']['name'] ."', documentsize='".$_FILES['docurl']['size'] ."',"; fileLoader($doctype);
	} 						

			$sqsite2= "UPDATE documents SET menuid=$menuid, submenuid=$submenuid, documentname='$docname',documenttype='$doctype', 	$docnm viewed=$viewed WHERE documentid=$documentid";
			//echo $sqsite2; exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:AdminDocument.php?Edit=$documentid");
}
	 
			//echo $formname;
if ($formname=="PublicationAdd"){

if (strlen($_FILES['docurl']['name'])>=4) {$docnm=$_FILES['docurl']['name'];$docsize= $_FILES['docurl']['size']; fileLoader($doctype);} else {$docnm='sample.pdf';}						
			$sqsite2= "INSERT INTO documents (menuid,submenuid, documentname, 	documenturl, documentsize, viewed)
			VALUES ($menuid, $submenuid,'$docname', '$docnm','$docsize',$viewed)";
			//echo $sqsite2;exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:AdminDocument.php");
}
		
if ($formname=="PhotoAdd"){
		
	if (strlen($_FILES['imageurl']['name'])>=4) {$docname=$_FILES['imageurl']['name']; imgLoader('flash');} else {$docname='sample.jpg';}						
			$sqsite2= "INSERT INTO photos ( photoname, 	photofile,  viewed)
			VALUES ('$photoname', '$docname',$viewed)";
			//echo $sqsite2;exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:homephotosAdmin.php");
}

if ($formname=="PhotoUpdate"){

//echo $_FILES['docurl']['type'];
	if (strlen($_FILES['imageurl']['name'])>=4) {$docname='photofile='.$_FILES['imageurl']['name'] .',';  imgLoader('flash');} 

			$sqsite2= "UPDATE photos SET photoname='$photoname', $docname  viewed=$viewed WHERE photoid=$photoid";
		//	echo $sqsite2; exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:homephotosAdmin.php?Edit=$photoid");
}

if ($formname == "AdminRequest") {
			$sqlup="UPDATE userrequests SET admincomment='$detail', statusname='$statusname' WHERE requestid=$requestid;";
		     // echo $sqlup; exit;
			//mysql_select_db($database_conn, $conn);
			$Contents = mysql_query($sqlup, $conn) or die(mysql_error());
			header("location:ReportCustomer.php");
}


if ($formname=="EventAdd"){
$db_table = $TBL_PR . "events";
	//echo "test";exit;
	$_POST['description'] = substr($_POST['description'],0,500);
	$_POST['title'] = substr($_POST['title'],0,30);

	mysql_query("INSERT INTO $db_table ( `event_id` , `event_day` , `event_month` , `event_year` , `event_time` , `event_title` , `event_desc` ) VALUES ('', '".addslashes($_POST['day'])."', '".addslashes($_POST['month'])."', '".addslashes($_POST['year'])."', '".addslashes($_POST['hour'].":".$_POST['minute'])."', '".addslashes($_POST['title'])."', '".addslashes($_POST['description'])."')");
$_POST['month'] = $_POST['month'] + 1;

		header("location:AppendCalendar.php");
}

if ($formname=="EventUpdate"){
$db_table = $TBL_PR . "events";
	//echo "test";exit;
	$_POST['description'] = substr($_POST['description'],0,500);
	$_POST['title'] = substr($_POST['title'],0,30);

	mysql_query("UPDATE $db_table SET `event_day`= '".addslashes($_POST['day'])."', `event_month` = '".addslashes($_POST['month'])."' , `event_year` = '".addslashes($_POST['year'])."' , `event_time` = '".addslashes($_POST['hour'].":".$_POST['minute'])."', `event_title` = '".addslashes($_POST['title'])."' , `event_desc` = '".addslashes($_POST['description'])."' WHERE `event_id` = ". $_POST['eventid'] ."");
   
    header("location:AppendCalendar.php?Edit=$eventid");
}

if ($formname=="EventFunctionAdd"){

		$sqsite2="INSERT INTO event_function (functionname, functiondetail, functioncost,  eventid, viewed) 
		VALUES ('$functionname','$functiondetail','$functioncost',$EventID, $viewed);";
		//mysql_select_db($database_conn, $conn);
		//echo $sqsite2; exit;
		mysql_query($sqsite2,$conn);
		header("location:eventFunctionAdmin.php");
}

if ($formname=="EventFunctionEdit"){
    $squp="UPDATE event_function SET functionname='$functionname',functiondetail='$functiondetail', functioncost='$functioncost', eventid=$EventID,  viewed=$viewed WHERE functionid=$functionid;";
	//echo $squp; exit;
	mysql_query($squp,$conn);  	      
    header("location:eventFunctionAdmin.php?Edit=$functionid");
}


if ($formname=="NewsAdd"){

		$sqsite2="INSERT INTO news (NewsName,NewsDetail, NewsDate, viewed) 
		VALUES ('$EventHeading','$detail','$EventDate', $viewed);";
		//mysql_select_db($database_conn, $conn);
		//echo $sqsite2; exit;
		mysql_query($sqsite2,$conn);
		header("location:NewsAdmin.php");
}

if ($formname=="NewsUpdate"){
    $squp="UPDATE news SET NewsName='$EventHeading',NewsDetail='$detail',  NewsDate='$EventDate',  viewed=$viewed WHERE NewsID=$EventID;";
	//echo $squp; exit;
	mysql_query($squp,$conn);  	      
    header("location:NewsAdmin.php?Edit=$EventID");
}


if ($formname=="BannerAdd"){
		
	if (strlen($_FILES['imageurl']['name'])>=4) {$docname=$_FILES['imageurl']['name']; imgLoader('images');} else {$docname='sample.jpg';}						
			$sqsite2= "INSERT INTO banners ( bannercaption,  bannerlink,	bannerimg,  viewed, seq)
			VALUES ('$bannercaption','$bannerlink', '$docname',$viewed, '$seq')";
			//echo $sqsite2;exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:BannerAdmin.php");
}

if ($formname=="BannerUpdate"){

//echo $_FILES['imageurl']['type'];
	if (strlen($_FILES['imageurl']['name'])>=4) {$docname="bannerimg='".$_FILES['imageurl']['name'] ."',";  imgLoader('images');} 

			$sqsite2= "UPDATE banners SET bannercaption='$bannercaption',bannerlink='$bannerlink', $docname  viewed=$viewed,seq='$seq' WHERE bannerid=$bannerid";
			//echo $sqsite2; exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:BannerAdmin.php?Edit=$bannerid");
}

if ($formname=="BannerAssign"){
			$MenuID=0;
			$SubMenuID=0;
			$EventID=0;
			if (is_array($menuid)){
				foreach($menuid as $t){$MenuID=$t . "," . $MenuID;}
			}
			if (is_array($submenuid)){
				foreach($submenuid as $k){$SubMenuID=$k . "," . $SubMenuID;}
			}
			if (is_array($eventid)){
				foreach($eventid as $n){$EventID=$n . "," . $EventID;}
			}
			//echo $menuid; exit;
			$query_Contents1 = "SELECT * FROM bannerpages WHERE bannerid=$bannerid";
			//echo $query_Contents1, exit;
			$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
			//$row_Contents1 = mysql_fetch_assoc($Contents1);
			$totalRows_Contents = mysql_num_rows($Contents1);
//echo $_FILES['docurl']['type'];
			if ($totalRows_Contents>=1) { 
			$sqsite2= "UPDATE bannerpages SET menuid='$MenuID',submenuid='$SubMenuID', eventid='$EventID', bannercatid=$bannercatid WHERE bannerid=$bannerid";
			}
			else { 
			$sqsite2= "INSERT INTO bannerpages (menuid,submenuid,eventid,bannerid,bannercatid) VALUES ('$MenuID','$SubMenuID','$EventID',$bannerid, $bannercatid)";
			}
			
			//echo $sqsite2; exit;
			mysql_select_db($database_conn, $conn);
			mysql_query($sqsite2,$conn);
			header("location:BannerassignAdmin.php?Edit=$bannerid");
}


function fileLoader($tgt){
	//echo $filename["name"];
$filename=$_FILES['docurl'];
	if ($filename["error"]==0) {	
	  //echo $filename["type"];
		if ((($filename["type"] == "application/pdf")
		|| ($filename["type"] == "application/vnd.ms-excel")
		|| ($filename["type"] == "application/vnd.ms-powerpoint")
		|| ($filename["type"] == "application/msword")
		|| ($filename["type"] == "image/jpeg")
		|| ($filename["type"] == "image/gif")
		|| ($filename["type"] == "image/png"))
		&& ($filename["size"] < 2000000))
		{
		/*if ($filename["error"] > 0)
		  {
		  echo "Error: " . $filename["error"] . "<br />";
		  }
		else
		  {
		  echo "Upload: " . $filename["name"] . "<br />";
	  echo "Type: " . $filename["type"] . "<br />";
		  echo "Size: " . ($filename["size"] / 1024) . " Kb<br />";
		  echo "Stored in: " . $filename["tmp_name"];
		  }*/
		$tmpName=$filename["tmp_name"];
		//echo getcwd(). "\n";
				if ('http://'.$_SERVER['HTTP_HOST'] == 'http://localhost'){
				$uploadDir = realpath(dirname($_SERVER['DOCUMENT_ROOT'])) . '/slc/'.$tgt.'/';
				} else {
				$uploadDir = realpath(dirname($_SERVER['DOCUMENT_ROOT'])) . '/httpdocs/'.$tgt.'/';
				//$uploadDir = '/var/www/vhosts/scslearning.com/httpdocs/images/';
				}
		//echo $uploadDir;
		$filePath = $uploadDir . $filename["name"];
		$result = move_uploaded_file($tmpName, $filePath);
		
	  }
	}
}



function imgLoader($tgt){
	//echo $filename["name"];
$filename=$_FILES['imageurl'];
	
}

 ?>
