<?php
require('../Includefiles/conn.inc');
require('control.php');
?>
<?php
  $AdminID=(int)$_SESSION['AdminID'];
  //echo $AdminID;
  if ($AdminID==0) {
  header("location:index.php");
  }
  if ($AdminID!=0) {
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0035)http://127.0.0.1/xkenya/index.php -->
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Window-target" content="_top">
<meta name="Description" content="Home page of Kenya's best.">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Robots" content="index, follow">
<meta name="Title" content="SCS.com - Home ">
<title>SCS ::</title>

<link rel="stylesheet" href="../main.css" type="text/css">
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"></script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>

</HEAD>

<BODY bgColor=#ffffff leftMargin=0 topMargin=0  marginwidth="0" marginheight="0" >
<DIV align=center>
<CENTER>

    <TABLE width="780" border=1 cellPadding=0 cellSpacing=0  bgcolor="#999999"  id='gut'>
              <TBODY>
			  <TR>
                  <TD vAlign=top>
    <form action="log.php" method="post">
    <TABLE width="100%" border=0 cellSpacing=0  id='gut'>
  <TBODY>
  <TR>
          <TD height=2 align="right" >
		  <input name="formname" value="AdmLogoff" type="hidden">
            <input type="submit" name="Submit" value="Log Off"></TD>
  </TR></TBODY></TABLE></form></TD>
                </TR>
                <TR>
                  <TD vAlign=top>&nbsp;</TD>
                </TR>
                <TR> 
    <TD vAlign=top> <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                      <TBODY>
                        <TR vAlign=center> 
                          <TD height=30 colSpan=3 bgcolor="#006633"><DIV align=center><FONT color=#ffffff size=5><B><FONT size="4"
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  class=headings>SCS -  Admin</FONT></B></FONT></DIV></TD>
                        </TR>
                        <TR> 
                          <TD class=localsites vAlign=top width="58%" height=178>
    <table  id='gut' width="100%" border="0" align="center" cellspacing="4" cellpadding="3">
						  
                              <tr>
                                <td valign="top"><table width="100%" height="87" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="25%" valign="top" bgcolor="#CCCCCC">
									<table width="100%" border="0" cellspacing="0" cellpadding="2">
										<tr>
										  <td>&nbsp;</td>
										</tr>
										<!------------------ Start List ---------->
										<?php
						$AdminID=(int)$_SESSION['AdminID'];
						$sqAdcat="SELECT * FROM _adminuser WHERE	AdminID = $AdminID ;";
						$rs=mysql_query($sqAdcat,$conn);
						$row_Contents = mysql_fetch_assoc($rs);
						$AdminCatID=$row_Contents['AdminCatID'];
						
						
						$sqAdcat1="SELECT _adminpage.AdminPageID, _adminpage.AdminPageTitle, _adminpage.AdminPageURL
								FROM _admincatpage
								INNER JOIN _adminpage ON _admincatpage.AdminPageID = _adminpage.AdminPageID
								WHERE _adminpage.Viewed =1
								AND _admincatpage.AdminCatID = $AdminCatID ORDER BY _adminpage.AdminPageTitle;";
						//echo $sqAdcat1; exit;
						$rs2=mysql_query($sqAdcat1,$conn);
			
						while($rsprod0=mysql_fetch_array($rs2))
						{
						?>
						<tr> 
						  <td valign="top"> 
							<a style="FONT-SIZE: 12px;TEXT-DECORATION: none; padding-left:10px" href="<?php echo $rsprod0["AdminPageURL"];?>?submenuid=<?php echo $rsprod0["AdminPageID"];?>"><?php echo $rsprod0["AdminPageTitle"];?></a></td>
					  </tr>
					  <?php	} //end while statement		?>
								<! ------- end list-------->
									  </table>
									</td>
									<TD width="81%" height=178 vAlign=top bgcolor="#FFFFFF">
						  
							<table width="100%" id='gut' border="0"  cellspacing="0" cellpadding="0">
                             <tr> 
                                        
                                <td width="46%" align="left"><b>View Gallery </b></td>
                                <td width="23%" align="right"><a href="?GalleryCatAdd=1">Add Gallery Cat</a></td>
				                <td width="15%" align="right"><a href="?">List</a></td>
				<td width="16%" align="right">&nbsp;</td>
                             </tr>
			     <tr>
                     <td colspan="4" valign="top">
                             <?php 
			
			$formname=$_GET['formname'];
			$List=$_GET['List'];
			$GalleryCatEdit=$_GET['GalleryCatEdit'];
			$GalleryCatAdd=$_GET['GalleryCatAdd'];
			$Gallery=$_GET['Program'];
			$GalleryEdit=$_GET['ProgramEdit'];
			$GalleryAdd=$_GET['GalleryAdd'];
	
			
			if ($List==0 && $GalleryCatEdit==0 && $GalleryCatAdd==0 && $Gallery==0 && $GalleryEdit==0 && $GalleryAdd==0 ) {
			
			$today = date("y-m-d");
			$query_Contents = sprintf("SELECT * FROM gallerycategory order by gallerycategoryname");
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			//$row_Contents = mysql_fetch_assoc($Contents);
			//$totalRows_Contents = mysql_num_rows($Contents);
			?>				  
			<table width="100%" id='gut' border="0" cellspacing="2" cellpadding="3">
            <tr>
				  <td>&nbsp;</td>
				  <td><font color="#FF0000"><strong>Category Name </strong></font></td>
				  <td align="center">&nbsp;</td>
            </tr>
			<?php 
			$c=1;
			while ($row_Contents=mysql_fetch_array($Contents)) {			
			?>
			<tr> 
			  <td width="5%"><b><?php echo $c;?></b></td>
			  <td width="53%"><a href="?GalleryCatEdit=<?php echo $row_Contents['gallerycategoryid'];?>"><?php echo $row_Contents['gallerycategoryname'];?></a></td>
			  
			  <td width="9%"><?php 
										//echo $row_Contents0['Viewed'];
										if ($row_Contents['viewed']){
										echo "<b>viewed</b>";
										 } ?></td>
			</tr>
            <?php 
			$c++;
			}
			?>
			<tr> 
			  <td colspan=3>&nbsp;</td>
			</tr>
		  </table>
		<?php }
		
			if ($List==0 && $GalleryCatEdit==0 && $GalleryCatAdd==1 && $Gallery==0 && $GalleryEdit==0 && $GalleryAdd==0 ) {
			
// 			$today = date("y-m-d");
// 			$query_Contents = sprintf("SELECT * FROM gallerycategory WHERE gallerycategoryid=$programCatEdit");
// 			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
// 			$row_Contents = mysql_fetch_assoc($Contents);
// 			$totalRows_Contents = mysql_num_rows($Contents);
// 			$gallerycategoryid=$row_Contents['gallerycategoryid'];
			?>	
			<table width="100%" border="0" id='gut' cellspacing="2" cellpadding="3">
                        <tr>
			  <td><font color="#FF0000"><strong>Category Name </strong></font></td>

			  <td align="left" valign="top"><font color="#FF0000"><strong>Viewed</strong></font></td>
			  <td align="center">&nbsp;</td>
                        </tr>
			<form name="" action="log.php" method="post">
			<tr> 
			  <td width="46%" valign="top"><input type="text" name="gallerycategory" style="width:220px" value="<?php echo $row_Contents['gallerycategory'];?>"></td>
			  <td width="12%" valign="top"><input type="checkbox" name="viewed" <?php if ($row_Contents['viewed']){ ?>checked<?php } ?>>
				<input type="hidden" name="formname" value="GalleryCatAdd">
			  </td>
			  <td width="19%"> <input type="submit" name="Submit" value="Add"></td>
			</tr>
		      </form>
			  </table>
		  <?php }
		
			if ($List==0 && $GalleryCatEdit>=1 && $GalleryCatAdd==0 && $Gallery==0 && $GalleryEdit==0 && $GalleryAdd==0 ) {
			
			$today = date("y-m-d");
			$query_Contents = sprintf("SELECT * FROM gallerycategory WHERE gallerycategoryid=$GalleryCatEdit");
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			$row_Contents = mysql_fetch_assoc($Contents);
			//$totalRows_Contents = mysql_num_rows($Contents);
			$gallerycategoryid=$row_Contents['gallerycategoryid'];
			?>	
			<table width="100%" border="0" id='gut' cellspacing="2" cellpadding="3">
            <tr>
				  <td><font color="#FF0000"><strong>Category Name </strong></font></td>
				  
				  <td align="center" valign="top"><font color="#FF0000"><strong>Viewed</strong></font></td>
				  <td align="center">&nbsp;</td>
            </tr>
			<form name="" action="log.php" method="post">
			<tr> 
			  <td width="46%" valign="top"><input type="text" name="gallerycategory" style="width:220px" value="<?php echo $row_Contents['gallerycategoryname'];?>"></td>
			  <td width="12%" valign="top"><input type="checkbox" name="viewed" <?php if ($row_Contents['viewed']){ ?>checked<?php } ?>>
			    <input type="hidden" name="gallerycategoryid" value="<?php echo $row_Contents['gallerycategoryid'];?>">
				<input type="hidden" name="formname" value="GalleryCatUpdate">
			  </td>
			  <td width="9%">
			    <input type="submit" name="Submit" value="Edit"></td>
			</tr>
            </form>
			<tr> 
			  <td colspan=3>
            <table width="100%" border="0" cellpadding="0" cellspacing="2" id='gut' bgcolor="#CCCCCC">
                <tr>
                  <td colspan=6><b>Images</b></td>
                </tr>
                <tr>
                <td width="6%">&nbsp;</td>
                  <td width="31%" align="center"><strong>Image Caption</strong></td>
                  <td width="42%" align="center"><strong>Image URL</strong></td>
                  <td width="8%" align="center"><strong>View</strong></td>
                  <td width="6%" align="center"><strong>Seq</strong></td>
                  <td width="7%">&nbsp;</td>
                </tr>
				<?php 
			$today = date("y-m-d");
			$query_Contents1 = sprintf("SELECT * FROM gallery WHERE gallerycategoryid=$GalleryCatEdit");
			//echo $query_Contents1;
			$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
			//$row_Contents = mysql_fetch_assoc($Contents);
			//$totalRows_Contents = mysql_num_rows($Contents);
			
			$c=1;
			while ($row_Contents1=mysql_fetch_array($Contents1)) {			
			?>	
		<form name="form1" action="log.php" method="post">
                <tr>
                  <td><?php echo $c ?></td>
                  <td align="center">
                <input type="text" name="galleryname" style="width:280;" value="<?php echo $row_Contents1['galleryname']?>"></td>
                  <td><a href="../gallery/<?php echo $row_Contents1['galleryimg']?>" target="_blank"><?php echo $row_Contents1['galleryimg']?></a></td>
                  <td align="center"><input type="checkbox" name="viewed" <?php if ($row_Contents1['viewed']){ ?>checked<?php } ?>></td>
                  <td><input type="text" name="seq" value="<?php echo $row_Contents1['seq']?>" style="width:20px;"></td>
                  <td><input type="submit" name="Submit" value="Edit">
		      <input type="hidden" name="galleryid" value="<?php echo $row_Contents1['galleryid'];?>">
		      <input type="hidden" name="gallerycategoryid" value="<?php echo $row_Contents1['gallerycategoryid'];?>">
		      <input type="hidden" name="formname" value="GalleryUpdate"></td>
                </tr>
			</form>
			<?php 
			$c++;
			}
			?>
		<form name="form2" action="log.php" method="post" enctype="multipart/form-data">
                <tr bgcolor="#66CCCC">
                  <td width=6% bgcolor="#6699FF">&nbsp;</td>
                  <td align="center" bgcolor="#6699FF"><input type="text" name="galleryname" style="width:280;" value=""></td>
                  <td align="center" bgcolor="#6699FF"><input type="file" name="imageurl"  value=""></td>
                  <td align="center" bgcolor="#6699FF"><input type="checkbox" name="viewed" checked></td>
                  <td bgcolor="#6699FF"><input type="text" name="seq" value="10" style="width:20px;"></td>
                  <td bgcolor="#6699FF"><input type="submit" name="Submit" value="Add">
  		  			<input type="hidden" name="gallerycategoryid" value="<?php echo $GalleryCatEdit;?>">
                  <input type="hidden" name="formname" value="GalleryAdd"></td>
                </tr>
		</form>
              </table>
              </td>
	       </tr>
	  </table>
		
        <?php }?>
			
                    </td>
					    </tr>
                    </table>								</TD>
                                  </tr>
                                </table></td>
                              </tr>
							  <?php
							}
							?>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table> </TD>
                   </TR>
                      </TBODY>
                  </TABLE></TD>
                </TR>
                
              </TBODY>
    </TABLE></TD></TR></TBODY></TABLE></CENTER></DIV></BODY></HTML>
