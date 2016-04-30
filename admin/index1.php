<?php
require('../Includefiles/conn.inc');
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
                  <TD vAlign=top>
    <table width="100%" id='gut' border="0" cellspacing="0" cellpadding="3" height="29">
                  <tr valign="top"> 
                    <td ><a href="../index.php">Home</a></td>
                    <td  align="right"><a href="#">Contact Us</a></td>
                  </tr>
    </table></TD>
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
						  <?php
						  $AdminID=(int)$_SESSION['AdminID'];
						  //echo $AdminID; exit;
						  if ($AdminID==0) {
							
						  ?>
						  
							<?php
							}else{
							?>
                              <tr>
                                <td valign="top">
    <table width="100%" id='gut' border="0" cellspacing="0" cellpadding="3">
				      <tr>
					<td width="34%" align="center" valign="top" bgcolor="#CCCCCC" class="style4"><strong>Activation System </strong></td>
					<td width="33%" align="center" valign="top">&nbsp;</td>
					<td width="33%" align="center" valign="top">&nbsp;</td>
				</tr>
				      <tr>
					<td align="center" valign="top" bgcolor="#CCCCCC"><a href="menuAdmin.php"><strong>Add/Update/View Menu </strong></a></td>
					<td align="center" valign="top" bgcolor="#CCCCCC"><a href="SubMenuAdmin.php"><strong>Add/Update/View SubMenu </strong></a></td>

					<td align="center" valign="top" bgcolor="#CCCCCC" ><a href="ProgramAdmin.php"><strong>Add/Update/View Programs </strong></a></td>
				</tr>
				<tr>
					<td align="center" valign="top" bgcolor="#CCCCCC"><a href="ProgramDocAdmin.php"><strong>Add/Update/View Programs Docs </strong></a></td>
    <td align="center" valign="top" bgcolor="#CCCCCC"><a href="contactAdmin.php"><strong>Add/Update/View Contacts Admin </strong></a></td>
    <td align="center" valign="top" bgcolor="#CCCCCC"><a href="quoteAdmin.php"><strong>Add/Update/View Quote Admin </strong></a></td>
				  </tr>
				  <tr>
    <td align="center" valign="top" bgcolor="#CCCCCC"><a href="NewsAdmin.php"><strong>Add/Update/View News Admin </strong></a></td>
    <td align="center" valign="top" bgcolor="#CCCCCC"><a href="GalleryAdmin.php"><strong>Add/Update/View Gallery  Admin </strong></a></td>
					  <td align="center" valign="top" bgcolor="#CCCCCC" ><a href="AppendForum.php"><strong>Add/Update/View Forum Admin </strong></a></td>
				  </tr>
                                  </table>								</td>
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
