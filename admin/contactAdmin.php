<?php
require('../includefiles/conn.inc');
if ($_SESSION['UserID']=="") {
header("location:index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0035)http://127.0.0.1/xkenya/index.php -->
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Window-target" content="_top">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta name="Robots" content="index, follow">
<title>SCS ::</title>

<link rel="stylesheet" href="../main.css" type="text/css">

<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language="JavaScript">
function Message(){
window.open("Message2.asp",null,"height=160, width=250, status=No,toolbar=no,Officebar=no,location=no,scrollbars=No,left=150,top=70");
}
</script>
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"></script>
</HEAD>

<BODY leftMargin=0 topMargin=0  marginwidth="0" marginheight="0" >
<DIV align=center>
<CENTER>

    <TABLE cellSpacing=0 cellPadding=0  bgcolor="#999999" width="780" id='gut'  border=0>
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
    <table width="100%" border="1" id='gut' cellspacing="0" cellpadding="3" height="29">
                  <tr valign="top"> 
                    <td ><a href="../index.php">Home</a></td>
                    <td  align="right"><a href="#">Contact Us</a></td>
                  </tr>
    </table></TD>
                </TR>
                <TR> 
    <TD vAlign=top> <TABLE  id='gut'  cellSpacing=0 cellPadding=0 width="100%" border=0>
                      <TBODY>
                        <TR vAlign=center> 
                          <TD  height=30 bgcolor="#006633"> <DIV align=center><FONT color=#ffffff size=5><B><FONT size="4"
                  face="Verdana, Arial, Helvetica, sans-serif" 
                  class=headings>SCS - Contact Admin </FONT></B></FONT></DIV></TD>
                        </TR>
                        <TR> 
                          <TD class=localsites vAlign=top width="58%" height=178>
						  <table width="100%" border="0" id='gut' cellspacing="0" cellpadding="0">
                             <tr> 
                                <td width="32%" align="left"><b>Add/Append Contact </b></td>
                                        <td width="16%" align="right"><a href="?Add=1">Add</a></td>
				        <td width="20%" align="right"><a href="?">List</a></td>
                                        <td width="29%" align="right"><a href="index.php">Admin Root</a></td>
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
					$OfficeID=$_GET['OfficeID'];
					
					$query_Links0= sprintf("SELECT * FROM offices");
					mysql_select_db($database_conn, $conn);
					$Contents0 = mysql_query($query_Links0, $conn) or die(mysql_error());
					//$row_Contents0 = mysql_fetch_assoc($Contents0);
					//$Links= mysql_fetch_array($row_Contents0);
					while ($row_Contents0=mysql_fetch_array($Contents0)) {?>

                                    <tr> 
                                      <td class="style4"><b><?php echo $row_Contents0['OfficeName'] ?></b></td>
                                      <td><a href="?Edit=<?php echo $row_Contents0['OfficeId']?>">Edit</a></td>
                                      <td class="style4"> 
                                        <?php 
					//echo $row_Contents0['Viewed'];
					if ($row_Contents0['Viewed']){
					echo "<b>viewed</b>";
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
			
			
			$query_Contents = sprintf("SELECT * FROM    offices WHERE (OfficeId = $Edit)");
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
				  <legend style="color:#9933CC"><strong>Update Office </strong></legend>
    <table width="100%" border="0" id='gut' cellpadding="0" cellspacing="2">
                <tr>
                  <td width="25%" class="style4"><strong>Office Name </strong></td>
 
                  <td width="75%"><input name="OfficeName" type="text" id="OfficeName" style="width:320px" value="<?php echo $row_Contents['OfficeName'] ?>" size="50" maxlength="200"></td>
                </tr>
				 <tr>
                  <td class="style4"><strong> Office Details</strong></td>
                  <td bgcolor="#FFFFFF"><textarea name="Detail" rows="20" id="Detail" style="width:320px"><?php echo $row_Contents['Details'] ?></textarea>
                  <script language="javascript">generate_wysiwyg('Detail');</script>	           </td>
                </tr>
		<tr>
		  <td align="left" class="style4">Sequence</td>
		  <td align="left" valign="top"><input name="Seq" type="text" id="Seq"  style="width:320px" value="<?php echo $row_Contents['Seq']; ?>"/></td>
		</tr>
				
                <tr>
                  <td class="style4">Viewed</td>
                  <td >
                    <input type="checkbox" name="Viewed"<?php if ($row_Contents['Viewed']){ ?>checked<?php } ?>> 
                    <input name="formname" type="hidden" value="OfficeUpdate" >
					<input name="OfficeID" type="hidden" value="<?php echo $row_Contents['OfficeId'] ?>" >
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
                  <td bgcolor="#FFFFFF"><textarea name="Detail" rows="20" id="Detail" style="width:320px"></textarea>
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
  
</table> </TD></TR>
                      </TBODY>
                  </TABLE></TD>
                </TR>
                
              </TBODY>
            </TABLE></TD></TR></TBODY></TABLE></CENTER></DIV></BODY></HTML>
