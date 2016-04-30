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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
                          <TD height=30 colSpan=3 bgcolor="#006633"><DIV align=center><FONT color=#ffffff size=5><B><FONT color=#ffffff size=5><B><FONT size="4"
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  class=headings>SCS</FONT></B></FONT><FONT size="4"
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  class=headings> -  Admin</FONT></B></FONT></DIV></TD>
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
						  
							<table width="100%" id='gut' border="0" bgcolor=#ffffff cellspacing="0" cellpadding="0">
                             <tr> 
                                        
                                <td width="46%" align="left">&nbsp;</td>
                                <td width="21%" align="right"><a href="?Add=1">Add Photo</a></td>
				                <td width="17%" align="right"><a href="?">List</a></td>
				<td width="16%" align="right"><a href="index.php"></a></td>
                             </tr>
			     <tr>
                     <td colspan="4" valign="top">
                 <?php 
			
			$formname=$_GET['formname'];
			$List=$_GET['List'];
			$Edit=$_GET['Edit'];
			$Add=$_GET['Add'];
						
			if ($List==0 && $Edit==0 && $Add==0) {
			
			$today = date("y-m-d");
		$query_Contents = sprintf("SELECT *	FROM photos");
			$Contents = mysql_query($query_Contents, $conn) or die(mysql_error());
			//$row_Contents = mysql_fetch_assoc($Contents);
			//$totalRows_Contents = mysql_num_rows($Contents);
			?>				  
			<table width="100%" id='gut' border="0" cellspacing="2" cellpadding="3">
            <tr>
				  <td>&nbsp;</td>
				  <td><font color="#FF0000"><strong>Photo  Name </strong></font></td>

                  <td align="center">&nbsp;</td>
            </tr>
			<?php 
			$c=1;
			while ($row_Contents=mysql_fetch_array($Contents)) {			
			?>
			<tr> 
			  <td width="8%"><b><?php echo $c;?></b></td>
			  <td width="63%"><?php echo $row_Contents['photoname'];?></td>

			  <td width="29%"><a href="?Edit=<?php echo $row_Contents['photoid'];?>">View</a></td>
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
		
			if ($List==0 && $Edit==0 && $Add==1) {
			?>	
			<table width="100%" border="0" cellpadding="0" cellspacing="2" id='gut'>
                
                <tr>
                <td width="27%"><strong><font color="#FF0000">New Home photo </font></strong></td>
                  <td width="73%">&nbsp;</td>
                  </tr>
				
		<form name="form1" action="log.php" method="post" enctype="multipart/form-data">
                <tr>
                  <td><strong>Caption Name</strong></td>
                  <td>
                <input type="text" name="photoname" style="width:280;" value=""></td>
                  </tr>
			
                <tr>
                  <td><strong>Photo File </strong></td>
                  <td><input type="file" name="imageurl" ></td>
                  </tr>
				  <tr>
                  <td><strong>Viewed</strong></td>
                  <td><input type="checkbox" name="viewed" checked></td>
                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Add">
                    <input type="hidden" name="formname" value="PhotoAdd"></td>
                  </tr>
</form>
              </table>
		  <?php }
		
			if ($List==0 && $Edit>=1 && $Add==0) {
			$today = date("y-m-d");
			$query_Contents1 = sprintf("SELECT * FROM photos WHERE photoid=$Edit");
			$Contents1 = mysql_query($query_Contents1, $conn) or die(mysql_error());
			$row_Contents1 = mysql_fetch_assoc($Contents1);
			//$totalRows_Contents = mysql_num_rows($Contents);
			
			?><table width="100%" border="0" cellpadding="0" cellspacing="2" id='gut'>
                
                <tr>
                <td width="27%"><strong><font color="#FF0000">Edit Home Photo </font></strong></td>
                  <td width="73%">&nbsp;</td>
                  </tr>
				
		<form name="form1" action="log.php" method="post" enctype="multipart/form-data">
                <tr>
                  <td><strong>Caption Name</strong></td>
                  <td>
                <input type="text" name="photoname" style="width:280;" value="<?php echo $row_Contents1['photoname']?>"></td>
                  </tr>
			
                <tr>
                  <td><strong>Photo</strong></td>
                  <td><?php echo $row_Contents1['photofile']; ?> <input type="file" name="imageurl" ></td>
                </tr>
				<tr>
                  <td><strong>Viewed</strong></td>
                  <td><input type="checkbox" name="viewed"<?php if ($row_Contents1['viewed']){ ?>checked<?php } ?>></td>
                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Edit">
                    <input type="hidden" name="photoid" value="<?php echo $row_Contents1['photoid'];?>">
                    <input type="hidden" name="formname" value="PhotoUpdate"></td>
                  </tr>
				   <tr>
                  <td colspan="2"><img src="../flash/<?php echo $row_Contents1['photofile'];?>">                   </td>
                  </tr>
</form>
              </table>
		  <?php }?>
                     </td>
			     </tr>
                    </table>								</TD>
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