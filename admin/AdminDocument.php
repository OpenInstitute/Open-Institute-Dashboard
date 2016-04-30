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
<meta name="Title" content="scs.net - Home ">
<title>SCS ::</title>

<link rel="stylesheet" href="../main.css" type="text/css">
<script type="text/javascript" src="../js/jquery-latest.js"></script>
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"></script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link href="../cal.css" rel="stylesheet" type="text/css" >
<script language="JavaScript" type="text/javascript">
function dropdownmenu(listindex)
{
document.sampleform.submenuid.options.length = 0;
switch (listindex)
{
<?php  

$query_Contents0 =mysql_query("SELECT * FROM menu WHERE viewed=1;");
			$totalRows_Contents0 = mysql_num_rows($query_Contents0);
		//	if ($totalRows_Contents>=1){ 
			while($row_Contents0=mysql_fetch_array($query_Contents0)){
			
			echo "case '". $row_Contents0['menuid'] ."' :";
			
$query_Contents1 =mysql_query("SELECT * FROM submenu WHERE menuid =".$row_Contents0['menuid']." AND viewed=1;");
			$totalRows_Contents1 = mysql_num_rows($query_Contents1);
			if ($totalRows_Contents1>=1){
			$c=1;
				echo "document.sampleform.submenuid.options[0]=new Option('Select SubMenu','0');";
				while($row_Contents1=mysql_fetch_assoc($query_Contents1)){
				echo "document.sampleform.submenuid.options[$c]=new Option('".$row_Contents1['submenuname']."','".$row_Contents1['submenuid']."');";
				$c++;
				}
			}
			echo "break;";
		}
?>
}
return true;
}
</script>
</HEAD>

<BODY bgColor=#ffffff leftMargin=0 topMargin=0  marginwidth="0" marginheight="0" >
<DIV align=center>
<CENTER>

    <TABLE width="880" border=1 cellPadding=0 cellSpacing=0  bgcolor="#999999"  id='gut'>
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
									  </table>									</td>
									<td valign="top" width="81%"    bgcolor="#FFFFFF">
									<table width="100%" id='gut' border="0"  cellspacing="0" cellpadding="0">
                             <tr> 
                                        
                                <td width="46%" align="left"><b>View documents </b></td>
                                <td width="23%" align="right"><a href="?Add=1">Add</a></td>
				                <td width="15%" align="right"><a href="?">List</a></td>
				<td width="16%" align="right">&nbsp;</td>
                             </tr></table>
			<?php
			$formname=$_POST['formname'];
			$Edit=(int)($_GET['Edit']);
			$Del=(int)($_GET['Del']);
			$Add=(int)($_GET['Add']);			
                  
		//echo formname
			if ($Edit==0 && $Del==0 && $Add==0){
			?>			  
				  <table width="100%" id='gut' border="0" cellspacing="2" cellpadding="3">
			
					<?php 
					$MenuID=$_GET['MenuID'];
					$query = "SELECT documents.documentname, documents.documentid, menu.menuname, documents.viewed, documents.submenuid FROM documents inner join menu on documents.menuid = menu.menuid order by menuname";
					//echo $query ;
					$query_result = mysql_query ($query);
					while ($info = mysql_fetch_array($query_result)){
					$submenuid=$info['submenuid'];
					if ($submenuid>=1) { 
						$query1 = "SELECT submenuid, submenuname FROM submenu  WHERE submenuid =$submenuid";
						$query_result1 = mysql_query ($query1);
						$info1 = mysql_fetch_assoc($query_result1);
					}
					?>
					<tr> 
					  <td width="34%"><b><?php echo $info['documentname']; ?></b></td>
					  <td width="28%"><?php echo $info['menuname'];?></td>
					  <td width="20%"><?php echo $info1['submenuname'];?></td>
					  <td width="11%"><?php if($info['viewed']) {echo '<b>viewed</b>';} else {echo 'hidden';};?></td>
					  <td width="7%"><a href="?Edit=<?php echo $info['documentid'];?>">Edit</a></td>
				   </tr>
                  <?php }?>
					<tr> 
					  <td colspan=5>&nbsp;</td>
					</tr>
					<tr> 
					  <td class="style4" colspan="3">&nbsp;</td>
					  <td class="style4">&nbsp;</td>
					  <td><a href="?Add=1">Add</a></td>
					</tr>
				  </table>
				  <?php
			}
			if ($Edit>=1)
			{
	///echo $Edit;
			$query = "SELECT documentid,documentname,documenturl,documenttype,documentsize,menuid,submenuid,viewed FROM documents  WHERE documentid =$Edit";
			//echo $query;
					$query_result = mysql_query ($query);
					$info = mysql_fetch_assoc($query_result);
					$menuid=$info['menuid'];
					$submenuid=$info['submenuid'];
					$menuselected= $_GET['menuid'];
					if ($submenuid>=1) { 
						$query1 = "SELECT submenuid, submenuname FROM submenu  WHERE submenuid =$submenuid";
						$query_result1 = mysql_query ($query1);
						$info1 = mysql_fetch_assoc($query_result1);
					}
			?>
            <fieldset>
				  <legend style="color:#9933CC"><strong>Update  document </strong></legend>
				  <table  width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">
			  <form name="sampleform" action="log.php" method="post"  enctype="multipart/form-data" >
			  <tr>
                  <td width="43%">Menu</td>
				  <td width="57%">
		<select name="menuid" class="inputSelect"  style="width:320px"  onchange="javascript: dropdownmenu(this.options[this.selectedIndex].value);">
		      <?php menu($menuid);?>
		</select>   
				</td>
			 </tr>
			 <tr>
                  <td width="43%">Submenu</td>
				  <td width="57%">
				  <script type="text/javascript" language="JavaScript">
				  	document.write('<select name="submenuid"><option value="0">Select SubMenu</option><option selected value="<?php echo $info1['submenuid']; ?>"><?php echo $info1['submenuname']; ?></option></select>');
				  </script>
					<noscript>
					<select name="submenuid"><option value="0">Select SubMenu</option><option selected value="<?php echo $info1['submenuid']; ?>"><?php echo $info1['submenuname']; ?></option></select>
					</noscript>
				 </td>
			 </tr>
			 <tr>
                  <td width="43%">Document name</td>
				  <td width="57%"><input type="text" name="docname"  value="<?php echo $info['documentname']; ?>"></td>
			 </tr>
			 <tr>
                  <td width="43%">Document type</td>
				  <td width="57%">
				    <input name="doctype" type="radio" value="images" <?php if ($info['documenttype']=="images") { echo "checked";}?>>
				    image
					<input name="doctype" type="radio" value="documents" <?php if ($info['documenttype']=="documents") { echo "checked";}?> >
					.doc/.pdf</td>
			 </tr>
			 <tr>
                  <td width="43%">Current document</td>
				  <td width="57%"><?php echo $info['documenturl']; ?><br>
				    To change click browse: 
				      <input type="file" name="docurl"  value=""></td>
			 </tr>
			 
                <tr>
                  <td class="style4">Viewed</td>
                  <td >
                    <input type="checkbox" name="viewed" <?php if ($info['viewed']){ ?>checked<?php } ?> >
                </tr>
                <tr>
                  <td class="style4">
                    <input name="formname" type="hidden" value="PublicationUpdate" >
					<input name="documentid" type="hidden" value="<?php echo $info['documentid'];?>" ></td>
                  <td ><input style="width:320px" type="submit"  value="submit" name="submit" /></td>
                </tr>
			  </form>
            </table>
			</fieldset>
     <?php 
	 }
	
		  if ($Add==1) {
		  ?>
				  <fieldset>
				  <legend style="color:#9933CC"><strong>Add document  </strong></legend>
				  <table  width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">
			  <form name="sampleform" action="log.php" method="post"  enctype="multipart/form-data" >
			  <tr>
                  <td width="43%">Menu</td>
				  <td width="57%"><select name="menuid" class="inputSelect"  style="width:320px"  onchange="javascript: dropdownmenu(this.options[this.selectedIndex].value);">>
		      <?php  menu(0);?>
		    </select>   
				</td>
			 </tr>
			 <tr>
                  <td width="43%">Submenu</td>
				  <td width="57%">
				  <script type="text/javascript" language="JavaScript">
				  	document.write('<select name="submenuid"><option value="">Select SubMenu</option></select>');
				  </script>
					<noscript>
					<select name="submenuid" id="submenuid" >
					<option value="">Select SubMenu</option>
					</select>
					</noscript>
				 </td>
			 </tr>
			 <tr>
                  <td width="43%">Document name</td>
				  <td width="57%"><input type="text" name="docname"  value=""></td>
			 </tr>
			 <tr>
                  <td width="43%">Document type</td>
				  <td width="57%">
				    <input name="doctype" type="radio" value="images" checked="checked">
				    image
					<input name="doctype" type="radio" value="documents"  >
					.doc/.pdf</td>
			 </tr>
			 <tr>
                  <td width="43%">Current document</td>
				  <td width="57%"> 
				      <input type="file" name="docurl"  value=""></td>
			 </tr>
			 
                <tr>
                  <td class="style4">Viewed</td>
                  <td >
                    <input type="checkbox" name="viewed" checked >
                </tr>
                <tr>
                  <td class="style4">
                    <input name="formname" type="hidden" value="PublicationAdd" ></td>
                  <td ><input style="width:320px" type="submit"  value="submit" name="submit" /></td>
                </tr>
			  </form>
            </table>       
				  </fieldset>				  
				  
						<?php } ?>							
							</TD>
                                  </tr>
                                </table></td>
                              </tr>
							 
                            </table> </TD>
                   </TR>
                      </TBODY>
                  </TABLE></TD>
                </TR>
                
              </TBODY>
    </TABLE></TD></TR></TBODY></TABLE></CENTER></DIV></BODY></HTML>
								</TD>
                                  </tr>
                                </table></td>
                              </tr>
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
<?php }?>
