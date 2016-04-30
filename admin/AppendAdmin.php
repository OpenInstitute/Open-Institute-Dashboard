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
<meta name="Title" content="ssbf.net - Home ">
<title>SCS ::</title>

<link rel="stylesheet" href="../main.css" type="text/css">

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
						  
							<table width="100%" border="0" cellspacing="0" cellpadding="0" id='gut'>
                             <tr> 
                                        
                                <td width="50%" align="left" class="style4"><b>Add/Append Administrators </b></td>
                                        <td width="11%" align="right"><a href="?Add=1">Add</a></td>
                                        <td width="12%" align="right"><a href="?">List</a></td>
                                        <td width="27%" align="right">&nbsp;</td>
                             </tr>
							  <tr>
                                <td colspan="4">
                             
			<?php
			
			$formname=$_POST['formname'];
			
			$Edit=(int)($_GET['Edit']);
			$Del=(int)($_GET['Del']);
			$Add=(int)($_GET['Add']);
			$passw=(int)($_GET['passw']);
		//echo formname
			if ($Edit==0 && $Del==0 && $Add==0 && $passw==0){
			?>				  
								  <table width="100%" border="0" cellspacing="2" cellpadding="3">
                                    <?php 
					
					mysql_select_db($database_conn, $conn);
					$query_Links0= sprintf("SELECT _adminuser.AdminID,_adminuser.AdminUser,_adminuser.Active, _admincat.CatName FROM _adminuser INNER JOIN _admincat ON _admincat.AdminCatID = _adminuser.AdminCatID ORDER BY _adminuser.AdminUser");
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					//$row_Contents0 = mysql_fetch_assoc($Contents0);
					//$Links= mysql_fetch_array($row_Contents0);
					while ($row_Contents0=mysql_fetch_array($Contents0)) {?>
                                    <tr> 
                                      <td  valign="top"><b><?php echo $row_Contents0['AdminUser'] ?></b></td>
									  <td  valign="top"><?php echo $row_Contents0['CatName'] ?></td>
                                      <td width="12%" valign="top"><a href="?Edit=<?php echo $row_Contents0['AdminID']?>">Edit</a></td>
                                      <td width="31%" valign="top" class="style4"> 
                                        <?php if($row_Contents0['Active']){?>
                                        <b>Active</b> 
                                        <?php  }
										else {
										?>
                                        <b>Not Active</b> 
                                        <?php  }?>									  </td>
                                    </tr>
                                    <?php }?>
                                    
                                    <tr> 
                                      <td width="33%">&nbsp;</td>
                                      <td width="24%">&nbsp;</td>
                                      <td><a href="?Add=1">Add</a></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
			<?php
				}
			if ($Add == 1){
			?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <form name="sampleform" action="log.php" method="post">
		 <tr>
		  <td><fieldset>
	<legend class="style13"><strong><font color="#660000">Add User </font></strong>&nbsp;</legend>
		<table width="100%" border="0" cellpadding="1" cellspacing="1">
				  <tr>
					<td width="24%" align="left" class="style9"> Admin Name</td>
					<td width="76%" class="style9" ><input name="AdminName" type="text" class="inputText" id="AdminName"  style="width:320px" value="" />                                                    </td>
				  </tr>
				  <tr>
					  <td align="left" class="style4">Login Name</td>
					  <td align="left" valign="top"><input name="AdminUser" type="text" id="AdminUser"  style="width:320px" value=""/></td>
					</tr>
					<tr>
					  <td align="left" class="style4">Category</td>
					  <td align="left" valign="top"><select name="AdminCatID" id="AdminCatID" style="width:320px">
						<?php echo DropAdminCat(0)?>
                      </select></td>
					</tr>
					<tr>
					  <td align="left" class="style4">Password</td>
					  <td align="left" valign="top"><input name="passw" type="password" id="passw"  style="width:320px" value=""/></td>
					</tr>
					<tr>
					  <td class="style4">Active</td>
					  <td >
						<input type="checkbox" name="viewed" checked></tr>
					<tr>
					  <td class="style4"><input type="hidden" name="formname" value="AdminAdd" /></td>
					  <td ><input style="width:320px" type="submit"  value="Submit" name="submit" /></td>
					</tr>
				</table>
				  </fieldset>											  
				  </td>
				</tr>
				<tr>
				  <td align="center">&nbsp;</td>
				</tr>
	</form>
	  </table>
     <?php 
										
	 }
	  if ($Edit>=1) {
	  
			$query_Contents = sprintf("SELECT _adminuser.AdminID,_adminuser.AdminUser,_adminuser.AdminCatID,_adminuser.AdminName 	,_adminuser.AdminDescr, _adminuser.AdminPass,_adminuser.AdminJoinDate, _adminuser.Active, _admincat.CatName FROM _adminuser INNER JOIN _admincat ON _admincat.AdminCatID = _adminuser.AdminCatID WHERE _adminuser.AdminID = $Edit");
				//	echo $query_Contents;
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			$row_Contents = mysql_fetch_assoc($Contents);
			
		  ?>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <form name="sampleform" action="log.php" method="post" >
					<tr>
					  <td><fieldset>
				<legend class="style13"><strong><font color="#660000">Edit User </font></strong>&nbsp;</legend>
				<table width="100%" border="0" cellpadding="1" cellspacing="1">
				  <tr>
					<td width="24%" align="left" class="style9"> Admin Name</td>
					<td width="76%" class="style9" ><input name="AdminName" type="text" class="inputText" id="AdminName"  style="width:320px" value="<?php echo $row_Contents['AdminName']?>" />                                                    </td>
				  </tr>
				  <tr>
					  <td align="left" class="style4">Login Name</td>
					  <td align="left" valign="top"><input name="AdminUser" type="text" id="AdminUser"  style="width:320px" value="<?php echo $row_Contents['AdminUser']; ?>"/></td>
					</tr>
					<tr>
					  <td align="left" class="style4">Category</td>
					  <td align="left" valign="top"><select name="AdminCatID" id="AdminCatID" style="width:320px">
						<?php echo DropAdminCat($row_Contents['AdminCatID'])?>
                      </select></td>
					</tr>
					<tr>
					  <td align="left" class="style4">Password</td>
					  <td align="left" valign="top"><input name="passw" type="password" id="passw"  style="width:320px" value="<?php echo $row_Contents['AdminPass']; ?>"/></td>
					</tr>
					<tr>
					  <td class="style4">Active</td>
					  <td >
						<input type="checkbox" name="viewed" <?php if ($row_Contents['Active']){ ?>checked<?php } ?>>                </tr>
					<tr>
					  <td class="style4"><input type="hidden" name="formname" value="AdminUpdate" />
						<input type="hidden" name="AdminID1" value="<?php echo $row_Contents['AdminID'] ?>" />
						</td>
					  <td ><input style="width:320px" type="submit"  value="Submit" name="submit" /></td>
					</tr>
				</table>
				</fieldset></td>
			</tr>
			
	</form>
  </table>		
		<?php
						
			}?>
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
