<?php
require('../Includefiles/conn.inc');
if ($_SESSION['AdminID']=="") {
header("location:index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0035)http://127.0.0.1/xkenya/index.php -->
<HTML><HEAD>
<title>SCS ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href="../main.css" type="text/css">

<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>

</HEAD>

<BODY leftMargin=0 topMargin=0  marginwidth="0" marginheight="0" >
	  <TABLE width="708"  bgcolor="#999999" id='gut' border=0 align="center" cellSpacing=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width="100%">
 <form action="log.php" method="post">
    <TABLE width="100%" border=0 cellSpacing=0  id='gut'>
  <TBODY>
  <TR>
          <TD height=2 align="right" >
		  <input name="formname" value="AdmLogoff" type="hidden">
            <input type="submit" name="Submit" value="Log Off"></TD>
  </TR></TBODY></TABLE></form>
	  <table width="100%" id='gut' border="0" cellspacing="0" cellpadding="3">
                  <tr valign="top"> 
                    <td ><a href="../index.php">Home</a></td>
                    <td  align="right"><a href="#">Contact Us</a></td>
                  </tr>
        </table>
	  <TABLE cellSpacing=0 cellPadding=0 id='gut' width="100%" border=0>
              <TBODY>
                <TR> 
	  <TD vAlign=top > <TABLE cellSpacing=0 cellPadding=0 width="100%" id='gut' border=0>
                      <TBODY>
                        <TR vAlign=center> 
                          <TD height=30 colSpan=2 bgcolor="#006633"><DIV align=center><FONT color=#ffffff size=5><B><FONT size="4"
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  class=headings>SCS - News Admin</FONT></B></FONT></DIV></TD>
                        </TR>
                        <TR><td width="25%" valign="top" bgcolor="#CCCCCC">
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
									</td> <TD class=localsites vAlign=top width="61%" height=178 id='gut'>
	  <table width="100%" id='gut' border="0" cellspacing="0" cellpadding="0">
                             <tr> 
                                        
                                <td width="55%" align="left"><b>Add/Append News Articles </b></td>
                                        <td width="14%" align="right"><a href="?Add=1">Add</a></td>
                                        <td width="13%" align="right"><a href="?">List</a></td>
                                        <td width="18%" align="right"><a href="index.php">Admin Root</a></td>
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
	  <table id='gut' width="100%" border="0" cellspacing="2" cellpadding="3">
                                    <?php 
					
					mysql_select_db($database_conn, $conn);
					$query_Links0= sprintf("SELECT * FROM news  ORDER BY NewsDate DESC");
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					//$row_Contents0 = mysql_fetch_assoc($Contents0);
					//$Links= mysql_fetch_array($row_Contents0);
					while ($row_Contents0=mysql_fetch_array($Contents0)) {?>

                                    <tr> 
                                      <td colspan="2" valign="top"><a href="?Edit=<?php echo $row_Contents0['NewsID']?>"><?php echo $row_Contents0['NewsName'] ?></a></td>
                                      <td width="38%"><?php echo $row_Contents0['NewsDate'];?></td>
                                      <td width="14%"> 
                                       <?php if($row_Contents0['viewed']){?>
                                        <b>Active</b> 
                                        <?php  }
										else {
										?>
                                        <b>Not Active</b> 
                                        <?php  }?>                                      </td>
                                    </tr>
                                    <?php }?>
                                    <tr> 
                                      <td colspan=4>&nbsp;</td>
                                    </tr>
                                    <tr> 
                                      <td width="9%">&nbsp;</td>
                                      <td width="39%">&nbsp;</td>
                                      <td align="left"><a href="?Add=1">Add</a></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
			                      <?php
							}
			if ($Edit >= 1){
			
			
			$query_Contents = sprintf("SELECT   *  FROM   news	WHERE  NewsID = '$Edit'");
				//	echo $query_Contents;
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			$row_Contents = mysql_fetch_assoc($Contents);
			$totalRows_Contents = mysql_num_rows($Contents);
			?>
	  <table  width="100%" border="0" cellpadding="2" id='gut' cellspacing="0" class="Record">

			  <form name="sampleform" action="log.php" method="post"  >

			 <tr>
                  <td>
				  <fieldset>
				  <legend style="color:#9933CC"><strong>Update News Article </strong></legend>
	  <table width="100%" id='gut' border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td width="27%">Article Name </td>
 
                  <td width="73%"><input name="EventHeading" type="text" id="EventHeading" style="width:320px" value="<?php echo $row_Contents['NewsName'] ?>" size="50" maxlength="200"></td>
                </tr>
 <tr>
														  <td class="style4"> News Article:</td>
														  <td bgcolor="#F7F7F7"><textarea name="detail" rows="20" id="Detail" style="width:320px"><?php echo $row_Contents['NewsDetail'] ?></textarea>
	  <script language="javascript1.2">generate_wysiwyg('Detail');</script></td>
   									    </tr><tr>
												    <td align="left" class="style4">News Date (mm/dd/yy) </td>
												    <td align="left" valign="top"><input name="EventDate" type="text" id="EventDate"  style="width:280px" value="<?php echo $row_Contents['NewsDate']; ?>"/>
													<A title="Click to select an arrival date" href="javascript:NewCal('EventDate','yyyymmdd')">
								 <IMG  src="../images/cal.gif" alt="Click to select a date" width="16" height="16" border=0></A>
													</td>
													</tr>
																
																<tr>
																  <td class="style4">Viewed</td>
																  <td >
																	<input type="checkbox" name="viewed"<?php if ($row_Contents['viewed']){ ?>checked<?php } ?>>                </tr>
                <tr>
                  <td><input name="formname" type="hidden" value="NewsUpdate" >
                    <input name="EventID" type="hidden" value="<?php echo $row_Contents['NewsID'] ?>" ></td>
                  <td ><input style="width:320px" type="submit" value="Edit" name="submit"></td>
                </tr>
				</table>
				  </fieldset> 				
				  </td>
				</tr>
			  </form>
            </table>
     <?php 
										
	 
	 }
	
		  if ($Add==1) {
		  ?>
										<table id='gut'  width="100%" border="0" cellpadding="2" cellspacing="0" class="Record">

			  <form name="sampleform" action="log.php" method="post"  >
 
                <tr>
                  <td>
				  <fieldset>
				  
				  <legend style="color:#9933CC"><strong>Add News Article </strong></legend>
				  
				  <table width="100%" border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td width="27%">Article Name </td>
 
                  <td width="73%"><input name="EventHeading" type="text" id="EventHeading" style="width:320px" size="50" maxlength="200"></td>
                </tr>
 <tr>
														  <td class="style4"> News Article:</td>
														  <td bgcolor="#F2F2F2"><textarea name="detail" rows="20" id="Detail" style="width:320px"></textarea>
										 <script language="javascript1.2">generate_wysiwyg('Detail');</script></td>
   									    </tr><tr>
												    <td align="left" class="style4">News Date (mm/dd/yy) </td>
												    <td align="left" valign="top"><input name="EventDate" type="text" id="EventDate"  style="width:280px"/>
													<A title="Click to select an arrival date" href="javascript:NewCal('EventDate','yyyymmdd')">
								 <IMG  src="../images/cal.gif" alt="Click to select a date" width="16" height="16" border=0></A>
													</td>
													</tr>
																
																<tr>
																  <td class="style4">Viewed</td>
																  <td >
																	<input type="checkbox" name="viewed" checked>                </tr>
                <tr>
                  <td><input name="formname" type="hidden" value="NewsAdd" ></td>
                  <td ><input style="width:320px" type="submit" value="Add" name="submit"></td>
                </tr>
				</table>         
				  </fieldset>				  </td>
                </tr>
			  </form>
            </table>
  		<?php }?>
</table>
                          </td> </tr>
                    </table></TD>
                </TR>
              </TBODY>
            </TABLE></TD>
    </TR>
                
  </TBODY>
</TABLE></TD></TR></TBODY></TABLE>
</BODY></HTML>
