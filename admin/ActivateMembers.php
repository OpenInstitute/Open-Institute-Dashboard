<?php
require('../Includefiles/conn.inc');
require('control.php'); 

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
									<table width="100%" border="0" id='gut' cellspacing="0" cellpadding="0">
                             <tr> 
                                <td width="33%" align="left"><b>Add/Append Member </b></td>
                                        <td width="37%" align="right"><a href="?Add=1">Add</a></td>
				        <td width="15%" align="right"><a href="?">List</a></td>
                                        <td width="15%" align="right"><a href="index.php"></a></td>
                             </tr>
							  <tr>
                                <td colspan="4">
			<?php
			$formname=$_POST['formname'];
			
			$Edit=(int)($_GET['Edit']);
			$Del=(int)($_GET['Del']);
			$Add=(int)($_GET['Add']);
			
			
			
                  
		//echo formname
			If ($Edit==0 && $Del==0 && $Add==0){
			?>				  
<table width="100%" id='gut' border="0" cellspacing="2" cellpadding="3">
                                    <?php 
					$UserID=$_GET['UserID'];
					
					$query_Links0= sprintf("SELECT * FROM users");
					mysql_select_db($database_conn, $conn);
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					//$row_Contents0 = mysql_fetch_assoc($Contents0);
					//$Links= mysql_fetch_array($row_Contents0);
					while ($row_Contents0=mysql_fetch_array($Contents0)) {?>

                                    <tr> 
                                      <td class="style4"><a href="?Edit=<?php echo $row_Contents0['userid']?>"><b><?php echo $row_Contents0['orgname'] ?></b></a></td>
                                      <td> <?php 
					//echo $row_Contents0['Viewed'];
					if ($row_Contents0['active']){
					echo "<b>Active</b>";
					  } ?> </td>
                                      <td class="style4"> 
                                        <?php 
					if ($row_Contents0['viewed']){
					echo "<b>Viewed</b>";
					  } ?>                                      </td>
                                    </tr>
                                    <?php }?>
                                    <tr> 
                                      <td colspan=3>&nbsp;</td>
                                    </tr>
                                    <tr> 
                                      <td class="style4">&nbsp;</td>
                                      <td  class="style4">&nbsp;</td>
                                      <td><a href="?Add=1">Add</a></td>
                                    </tr>
                                  </table>
			           <?php
				}
			if ($Edit >= 1){
			
			
			$query_Contents = sprintf("SELECT * FROM    users WHERE (userid = $Edit)");
				//echo $query_Contents;
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			$row_Contents = mysql_fetch_assoc($Contents);
			$totalRows_Contents = mysql_num_rows($Contents);
			?>
            <table  width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">

			  <form name="sampleform" action="log.php" method="post"  >

			 <tr>
                  <td>
				  <fieldset>
				  <legend style="color:#9933CC"><strong>Update Organisation </strong></legend>
    <table width="100%" border="0" id='gut' cellpadding="0" cellspacing="2">
                <tr>
                  <td width="25%" class="style4"><strong>Organization Name </strong></td>
 
                  <td width="75%"><input name="OrgName" type="text" id="OrgName" style="width:320px" value="<?php echo $row_Contents['orgname'] ?>" size="50" maxlength="200"></td>
                </tr>
				 <tr>
                  <td class="style4"><strong>Email</strong></td>
                  <td><input name="Email" type="text" id="Email" style="width:320px" value="<?php echo $row_Contents['email'] ?>" size="50" maxlength="200"></td>
                </tr>
				<tr>
                  <td class="style4"><strong>Address</strong></td>
                  <td><input name="Address" type="text" id="Address" style="width:320px" value="<?php echo $row_Contents['address'] ?>" size="50" maxlength="200"></td>
                </tr>
				<tr>
                  <td class="style4"><strong>Telephone</strong></td>
                  <td><input name="Telephone" type="text" id="Telephone" style="width:320px" value="<?php echo $row_Contents['telephone'] ;?>" size="50" maxlength="200"></td>
                </tr>
				<tr>
                  <td class="style4"><strong>Country</strong></td>
                  <td><select name="CountryID" id="CountryID" style="width:320px">
						<?php echo country($row_Contents['countryid'])?>
                      </select></td>
                </tr>
				<tr>
                  <td class="style4">Active</td>
                  <td >
                    <input type="checkbox" name="active" <?php if ($row_Contents['active']){ ?>checked<?php } ?>> 
				 </td>
                </tr>
                <tr>
                  <td class="style4">Viewed</td>
                  <td >
                    <input type="checkbox" name="viewed"<?php if ($row_Contents['viewed']){ ?>checked<?php } ?>> 
                    <input name="formname" type="hidden" value="memberactivate" >
					<input name="ApplicantID" type="hidden" value="<?php echo $row_Contents['userid'] ?>" >
					                  </td>
                </tr>
                
                <tr>
                  <td class="style4">&nbsp;</td>
                  <td ><input style="width:320px" type="submit" value="Edit" name="submit"></td>
                </tr>
				</table>
				  </fieldset> 				</td>
				</tr>
                
			  </form>
            </table>
     <?php 
	 }
	
		  
		  
		  
		  if ($Add==1) {
		  ?>
            <table   width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">

			  <form name="sampleform" action="log.php" method="post"  >
 
                <tr>
                  <td>
				  <fieldset>
				  
				  <legend style="color:#9933CC"><strong>Add Office  </strong></legend>
				  
				  <table width="100%" border="0" cellpadding="0" cellspacing="2" id='gut'>
                <tr>
                  <td width="25%" class="style4"><strong>Office Name </strong></td>
 
                  <td width="75%"><input name="OfficeName" type="text" id="OfficeName" style="width:320px" size="50" maxlength="200"></td>
                </tr>
				 <tr>
                  <td class="style4"><strong> Office Details</strong></td>
                  <td><textarea name="Detail" rows="20" id="Detail" style="width:320px"></textarea>
		       <script language="javascript">generate_wysiwyg('Detail');</script></td>
                </tr>
        <tr>
      <td align="left" class="style4">Sequence</td>
      <td align="left" valign="top"><input name="Seq" type="text" id="Seq" value="10"  style="width:320px"/></td>
    </tr>
				
                <tr>
                  <td class="style4">Viewed</td>
                  <td >
                    <input type="checkbox" name="Viewed">
                    <input name="formname" type="hidden" value="OfficeAdd" >
				</td>
                </tr>
                
                <tr>
                  <td class="style4">&nbsp;</td>
                  <td ><input style="width:320px" type="submit" value="Add" name="submit"></td>
                </tr>
				</table>         
				  </fieldset>				  
				  </td>
                </tr>
 
                
 
			  </form>
            </table>
  		<?php


	}?>
  
</table>
									</TD>
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
