<?php
require('../Includefiles/conn.inc');
require('control.php'); ?>

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
										<! ------------------ Start List ---------->
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
								<td width="52%" align="left"><b>Add/Append Admin 2 Page </b></td>
								<td width="16%" align="right">&nbsp;</td>
								<td width="13%" align="right"><a href="?">List</a></td>
								<td width="19%" align="right">&nbsp;</td>
                             </tr>
							 <tr align="center">
                                <td colspan="4">

			<?php

			$formname=$_POST['formname'];
			$Edit=(int)($_GET['Edit']);
			$Del=(int)($_GET['Del']);
			$Add=(int)($_GET['Add']);
	
		//echo formname

			if ($Edit==0 && $Del==0 && $Add==0){
			?>				  
		  <table width="100%" border="0" cellspacing="2" cellpadding="3">
         <?php 
					//$pid=$_GET['pid'];
					$query_Links0= sprintf("SELECT * FROM _admincat ORDER BY CatName");
					mysql_select_db($database_conn, $conn);
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					//$row_Contents0 = mysql_fetch_assoc($Contents0);
					//$Links= mysql_fetch_array($row_Contents0);

					while ($row_Contents0=mysql_fetch_array($Contents0)) {
					$pid =$row_Contents0['pid'];
					?>
                                    <tr> 
                                      <td class="style4"><b><?php echo $row_Contents0['CatName'] ?></b></td>
                                      <td><a href="?Edit=<?php echo $row_Contents0['AdminCatID'] ?>">Edit</a></td>
                                      <td class="style4"> 
                                        <?php 
										//echo $row_Contents0['Viewed'];
										if ($row_Contents0['Viewed']){
										echo "<b>viewed</b>";
										 } ?>                                      
										 </td>

                                    </tr>
                        <?php }?>
                                    <tr> 
                                      <td colspan=3>&nbsp;</td>
                                    </tr>
                                    <tr> 
                                      <td class="style4">&nbsp;</td>
                                      <td  class="style4">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>

                                  </table>
			                      <?php
							}

			if ($Edit >= 1){
			$query_Contents = sprintf("SELECT  * FROM    _admincat WHERE (AdminCatID = $Edit)");
				//echo $query_Contents;
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			$row_Contents = mysql_fetch_assoc($Contents);
			$cid = $row_Contents['AdminCatID'] ;
			?>

            <table  width="100%" border="0" align="left" cellpadding="2" cellspacing="0">
			  <form name="sampleform" action="log.php" method="post"  >
			 <tr>

                  <td>
				  <fieldset>
				       <legend style="color:#9933CC"><strong>Category</strong> - <?php echo $row_Contents['CatName'] ?></legend>
                                          <table width="100%" border="1" cellpadding="0" cellspacing="2">
                                            <tr> 
                                              <td width="71%" class="style4"><strong>Page Name </strong></td>
                                              <td width="29%"><input style="width:220px" type="submit" value="Update" name="submit"></td>
                                            </tr>
                                            <?php
										$query_Contents1 = sprintf("SELECT * FROM    _adminpage WHERE Viewed =1 ORDER BY AdminPageTitle");
											//echo $query_Contents1;
										$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
										while ($row_Contents1=mysql_fetch_array($Contents1)) {
										$pid = $row_Contents1['AdminPageID'] ;					
										$query_Contents2 = sprintf("SELECT * FROM  _admincatpage WHERE (AdminPageID = $pid) and (AdminCatID = $cid)");
													//echo $query_Contents2;
												$Contents2 = mysql_query($query_Contents2, $conn) or die(mysql_error());
												$row_Contents2 = mysql_fetch_assoc($Contents2);
												$totalRows_Contents2 = mysql_num_rows($Contents2);

										?>
                                            <tr> 
                                              <td width="71%" class="style4"><?php echo $row_Contents1['AdminPageTitle'] ?></td>
                                              <td width="29%"> <div align="center">
                                                <input type="checkbox" name="PageID<?php echo $pid ?>" <?php if ($totalRows_Contents2>=1){ ?>checked<?php } ?>>
                                              </div></td>
                                            </tr>
											<?php } ?>
                                            <tr> 
                                              <td class="style4">&nbsp;</td>
                                              <td > <input style="width:220px" type="submit" value="Update" name="submit"></td>
                                            </tr>

                                            <tr> 

                                              <td colspan="2" align="center" class="style4">
                                                <input name="CID" type="hidden" value="<?php echo $cid ?>" >
                                                <input name="formname" type="hidden" value="PageCatUpdate" ></td>

                                            </tr>

                                          </table>

				  </fieldset> 				
				  </td>
				</tr>
			  </form>
</table>		
								<?php } ?>	
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
 <?php
							}
							?>