<?php
require('../Includefiles/conn.inc');
  $AdminID=(int)$_SESSION['AdminID'];
		  //echo $UserID;
		  if ($AdminID==0) {
							
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
                          <TD class=localsites vAlign=top width="58%">
                        <tr>
                             <td align="center" valign="top">
   						
						  
								<table width="100%" border="0" cellpadding="3" cellspacing="2">
                                    <form action="log.php" name="Pass" lang="jscript" method="post">
									<tr>
                                        <td width="41%" align="right" nowrap ><strong>Name:</strong></td>
									    <td width="20%"  align="left"><input type="text" name="uname"></td>
									  <td width="39%" >&nbsp;</td>
                                    </tr>
									<tr>
									  <td align="right" nowrap ><strong>Password</strong></td>
									  <td  align="left"><input type="password" name="passw"></td>
									  <td >&nbsp;</td>
									  </tr>
									<tr>
									  <td align="right" nowrap >&nbsp;</td>
									  <td  align="left"><input type="submit" name="Submit" value="Sign In">
                                        <input type="hidden" name="formname" value="Admpass"></td>
									  <td >&nbsp;</td>
									  </tr>
									</form>
                            </table>		
								
                            </td>
                      </tr>
					  </TBODY>
                  </TABLE></TD>
                </TR>
                
              </TBODY>
    </TABLE></TD></TR></TBODY></TABLE></CENTER></DIV></BODY></HTML>
<?php }  else { header("location:AdminCategory.php");}?>	