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
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"></script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link href="../cal.css" rel="stylesheet" type="text/css" >
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script language="JavaScript" type="text/javascript" src="./wysiwyg.js"></script>
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
                                        
                                <td width="46%" align="left"><b>View Events </b></td>
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
					$db_table = $TBL_PR . "events";
					$query = "SELECT * FROM $db_table  ORDER BY event_year DESC, event_month DESC, event_day DESC";
					//echo $query ;
					$query_result = mysql_query ($query);
					while ($info = mysql_fetch_array($query_result)){
						$date = date ("l, jS F Y", mktime(0,0,0,$info['event_month'],$info['event_day'],$info['event_year']));
						$time_array = split(":", $info['event_time']);
						$time = date ("g:ia", mktime($time_array['0'],$time_array['1'],0,$info['event_month'],$info['event_day'],$info['event_year']));?>

                                    <tr> 
                                      <td width="25%"><b><?php echo $info['event_title'] ?></b></td>
                                      <td width="22%"><?php echo $date;?></td>
                                       <td width="10%"><?php echo $time; ?></td>
									   <td width="6%"><a href="?Edit=<?php echo $info['event_id'];?>">Edit</a></td>
                                   </tr>
                  <?php }?>
                                    <tr> 
                                      <td colspan=4>&nbsp;</td>
                                    </tr>
                                    <tr> 
                                      <td class="style4">&nbsp;</td>
                                      <td  class="style4" colspan=2>&nbsp;</td>
                                      <td><a href="?Add=1">Add</a></td>
                                    </tr>
                                  </table>
			                      <?php
							}

			if ($Edit>=1)
			{
	///echo $Edit;
	$db_table = $TBL_PR . "events";
			$query = "SELECT * FROM $db_table WHERE event_id='$_GET[Edit]' LIMIT 1";
			//echo $query;
					$query_result = mysql_query ($query);
					$info = mysql_fetch_assoc($query_result);
						$date = date ("l, jS F Y", mktime(0,0,0,$info['event_month'],$info['event_day'],$info['event_year']));
						$time_array = split(":", $info['event_time']);
						$time = date ("g:ia", mktime($time_array['0'],$time_array['1'],0,$info['event_month'],$info['event_day'],$info['event_year']));
			?>
            <table  width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">
			  <form name="sampleform" action="log.php" method="post"  >
			 <tr>
                  <td>
				  <fieldset>
				  <legend style="color:#9933CC"><strong>Update Events </strong></legend>
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Date</span><br> 
        <span class="addeventextrainfo">(MM/DD/YY)</span></td>
      <td width="430" height="40" valign="top"> <select name="month" id="month">
          <option value="1" <? IF($info['event_month'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($info['event_month'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($info['event_month'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($info['event_month'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($info['event_month'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($info['event_month'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($info['event_month'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($info['event_month'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($info['event_month'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($info['event_month'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($info['event_month'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($info['event_month'] == "12"){ echo "selected"; } ?>>12</option>
        </select> <select name="day" id="day">
          <option value="1" <? IF($info['event_day'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($info['event_day'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($info['event_day'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($info['event_day'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($info['event_day'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($info['event_day'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($info['event_day'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($info['event_day'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($info['event_day'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($info['event_day'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($info['event_day'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($info['event_day'] == "12"){ echo "selected"; } ?>>12</option>
          <option value="13" <? IF($info['event_day'] == "13"){ echo "selected"; } ?>>13</option>
          <option value="14" <? IF($info['event_day'] == "14"){ echo "selected"; } ?>>14</option>
          <option value="15" <? IF($info['event_day'] == "15"){ echo "selected"; } ?>>15</option>
          <option value="16" <? IF($info['event_day'] == "16"){ echo "selected"; } ?>>16</option>
          <option value="17" <? IF($info['event_day'] == "17"){ echo "selected"; } ?>>17</option>
          <option value="18" <? IF($info['event_day'] == "18"){ echo "selected"; } ?>>18</option>
          <option value="19" <? IF($info['event_day'] == "19"){ echo "selected"; } ?>>19</option>
          <option value="20" <? IF($info['event_day'] == "20"){ echo "selected"; } ?>>20</option>
          <option value="21" <? IF($info['event_day'] == "21"){ echo "selected"; } ?>>21</option>
          <option value="22" <? IF($info['event_day'] == "22"){ echo "selected"; } ?>>22</option>
          <option value="23" <? IF($info['event_day'] == "23"){ echo "selected"; } ?>>23</option>
          <option value="24" <? IF($info['event_day'] == "24"){ echo "selected"; } ?>>24</option>
          <option value="25" <? IF($info['event_day'] == "25"){ echo "selected"; } ?>>25</option>
          <option value="26" <? IF($info['event_day'] == "26"){ echo "selected"; } ?>>26</option>
          <option value="27" <? IF($info['event_day'] == "27"){ echo "selected"; } ?>>27</option>
          <option value="28" <? IF($info['event_day'] == "28"){ echo "selected"; } ?>>28</option>
          <option value="29" <? IF($info['event_day'] == "29"){ echo "selected"; } ?>>29</option>
          <option value="30" <? IF($info['event_day'] == "30"){ echo "selected"; } ?>>30</option>
          <option value="31" <? IF($info['event_day'] == "31"){ echo "selected"; } ?>>31</option>
        </select> <select name="year" id="year">
          <option value="2011" <? IF($info['event_year'] == "2011"){ echo "selected"; } ?>>2011</option>
          <option value="2012" <? IF($info['event_year'] == "2012"){ echo "selected"; } ?>>2012</option>
          <option value="2013" <? IF($info['event_year'] == "2013"){ echo "selected"; } ?>>2013</option>
          <option value="2014" <? IF($info['event_year'] == "2014"){ echo "selected"; } ?>>2014</option>
          <option value="2015" <? IF($info['event_year'] == "2015"){ echo "selected"; } ?>>2015</option>

        </select> </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Time</span><br> 
        <span class="addeventextrainfo">(24hr Format)</span></td>
      <td height="40" valign="top"> <input name="hour" type="text" id="hour" value="<?php echo $time_array[0];?>" size="2" maxlength="2">
        : 
        <input name="minute" type="text" id="minute" value="<?php echo $time_array[1];?>" size="2" maxlength="2"> 
      </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Title</span></td>
      <td height="40" valign="top"> <input name="title" type="text" id="title" size="20" value="<?php echo $info['event_title']?>"> 
      </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Description</span></td>
      <td height="40" valign="top"> <textarea name="description" cols="18" rows="5" id="description"><?php echo $info['event_desc']?></textarea> 
      </td>
    </tr>
    <tr> 
      <td width="228">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><input name="eventid" type="hidden" value="<?php echo $info['event_id']?>">
	  <input name="formname" type="hidden" value="EventUpdate"></td>
      <td><input name="submit" type="submit" id="submit" value="Update Event"></td>
    </tr>
  </table>
				  </fieldset> 				</td>
				</tr>
                
			  </form>
            </table>
     <?php 
	 }
	
		  if ($Add==1) {
		  ?><table  width="100%" border="0" cellpadding="2" cellspacing="0" id="gut">
                <tr>
                  <td>
				  <fieldset>
				  <legend style="color:#9933CC"><strong>Add Events  </strong></legend>
				  <form name="form1" method="post" action="log.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Date</span><br> 
        <span class="addeventextrainfo">(MM/DD/YY)</span></td>
      <td width="430" height="40" valign="top"> <select name="month" id="month">
          <option value="1" <? IF($_GET['month'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($_GET['month'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($_GET['month'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($_GET['month'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($_GET['month'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($_GET['month'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($_GET['month'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($_GET['month'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($_GET['month'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($_GET['month'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($_GET['month'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($_GET['month'] == "12"){ echo "selected"; } ?>>12</option>
        </select> <select name="day" id="day">
          <option value="1" <? IF($_GET['day'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($_GET['day'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($_GET['day'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($_GET['day'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($_GET['day'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($_GET['day'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($_GET['day'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($_GET['day'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($_GET['day'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($_GET['day'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($_GET['day'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($_GET['day'] == "12"){ echo "selected"; } ?>>12</option>
          <option value="13" <? IF($_GET['day'] == "13"){ echo "selected"; } ?>>13</option>
          <option value="14" <? IF($_GET['day'] == "14"){ echo "selected"; } ?>>14</option>
          <option value="15" <? IF($_GET['day'] == "15"){ echo "selected"; } ?>>15</option>
          <option value="16" <? IF($_GET['day'] == "16"){ echo "selected"; } ?>>16</option>
          <option value="17" <? IF($_GET['day'] == "17"){ echo "selected"; } ?>>17</option>
          <option value="18" <? IF($_GET['day'] == "18"){ echo "selected"; } ?>>18</option>
          <option value="19" <? IF($_GET['day'] == "19"){ echo "selected"; } ?>>19</option>
          <option value="20" <? IF($_GET['day'] == "20"){ echo "selected"; } ?>>20</option>
          <option value="21" <? IF($_GET['day'] == "21"){ echo "selected"; } ?>>21</option>
          <option value="22" <? IF($_GET['day'] == "22"){ echo "selected"; } ?>>22</option>
          <option value="23" <? IF($_GET['day'] == "23"){ echo "selected"; } ?>>23</option>
          <option value="24" <? IF($_GET['day'] == "24"){ echo "selected"; } ?>>24</option>
          <option value="25" <? IF($_GET['day'] == "25"){ echo "selected"; } ?>>25</option>
          <option value="26" <? IF($_GET['day'] == "26"){ echo "selected"; } ?>>26</option>
          <option value="27" <? IF($_GET['day'] == "27"){ echo "selected"; } ?>>27</option>
          <option value="28" <? IF($_GET['day'] == "28"){ echo "selected"; } ?>>28</option>
          <option value="29" <? IF($_GET['day'] == "29"){ echo "selected"; } ?>>29</option>
          <option value="30" <? IF($_GET['day'] == "30"){ echo "selected"; } ?>>30</option>
          <option value="31" <? IF($_GET['day'] == "31"){ echo "selected"; } ?>>31</option>
        </select> <select name="year" id="year">
          <option value="2011" <? IF($_GET['year'] == "2011"){ echo "selected"; } ?>>2011</option>
          <option value="2012" <? IF($_GET['year'] == "2012"){ echo "selected"; } ?>>2012</option>
          <option value="2013" <? IF($_GET['year'] == "2013"){ echo "selected"; } ?>>2013</option>
          <option value="2014" <? IF($_GET['year'] == "2014"){ echo "selected"; } ?>>2014</option>
          <option value="2015" <? IF($_GET['year'] == "2015"){ echo "selected"; } ?>>2015</option>

        </select> </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Time</span><br> 
        <span class="addeventextrainfo">(24hr Format)</span></td>
      <td height="40" valign="top"> <input name="hour" type="text" id="hour" value="20" size="2" maxlength="2">
        : 
        <input name="minute" type="text" id="minute" value="00" size="2" maxlength="2"> 
      </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Title</span></td>
      <td height="40" valign="top"> <input name="title" type="text" id="title" size="20"> 
      </td>
    </tr>
    <tr> 
      <td width="228" height="40" valign="top"><span class="addevent">Event Description</span></td>
      <td height="40" valign="top"> <textarea name="description" cols="18" rows="5" id="description"></textarea> 
      </td>
    </tr>
    <tr> 
      <td width="228">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><input name="formname" type="hidden" value="EventAdd"></td>
      <td><input name="submit" type="submit" id="submit" value="Add Event"></td>
    </tr>
  </table>
</form>         
				  </fieldset>				  
				  </td>
                </tr>
 
                
 
			
            </table>
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