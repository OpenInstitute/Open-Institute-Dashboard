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

    <TABLE width="780" border=0 cellPadding=0 cellSpacing=0  bgcolor="#999999"  id='gut'>
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
						  
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                             <tr> 
                                        
                                <td width="50%" align="left" class="style4"><b>Add/Append Forums </b></td>
                                        <td width="11%" align="right">&nbsp;</td>
                                        <td width="12%" align="right">&nbsp;</td>
                                        <td width="27%" align="right">&nbsp;</td>
                             </tr>
							  <tr>
                                <td colspan="4">
                                <?php 
$formname=$_GET['formname'];
if ($formname==''){
print "<A href='?formname=post'>New Topic</a><br>";

print "<table class='maintable'>";
print "<tr class='headline'><td width=50%>Topic</td><td width=20%>Topic Starter</td><td>Replies</td><td>Last replied time</td></tr>";
$getthreads="SELECT * from forum_posts where parentid='0' order by lastrepliedto DESC";
$getthreads2=mysql_query($getthreads) or die("Could not get threads");
while($getthreads3=mysql_fetch_array($getthreads2))

{

  $getthreads3[title]=strip_tags($getthreads3[title]);
  $getthreads3[author]=strip_tags($getthreads3[author]);
  print "<tr class='mainrow'><td><A href='?formname=message&id=$getthreads3[postid]'>$getthreads3[title]</a></td><td>$getthreads3[author]</td><td>$getthreads3[numreplies]</td><td>$getthreads3[showtime]<br>Last post by <b>$getthreads3[lastposter]</b></td></tr>";

}

print "</table>";
}


if ($formname=='message'){
$id=$_GET['id'];
print "<A href='?formname='>Back to main forum</a> - <A href='?formname=post'>New Topic</a> - <A href='?formname=reply&id=$id'>Reply<br>";
print "<table class='maintable'>";
print "<tr class='headline'><td width=20%>Author</td><td width=80%>Post</td></tr>";
$gettopic="SELECT * from forum_posts where postid='$id'";
$gettopic2=mysql_query($gettopic) or die("Could not get topic");
$gettopic3=mysql_fetch_array($gettopic2);
print "<tr class='mainrow'><td valign='top'>$gettopic3[author]</td><td vakign='top'>Last replied to at $gettopic3[showtime]<br><hr>";

$message=strip_tags($gettopic3['post']);

$message=nl2br($message);

print "$message<hr><br>";

print "</td></tr>";
$getreplies="Select * from forum_posts where parentid='$id' order by postid desc"; //getting replies
$getreplies2=mysql_query($getreplies) or die("Could not get replies");
while($getreplies3=mysql_fetch_array($getreplies2))

{
   print "<tr class='mainrow'><td valign='top'>$getreplies3[author]</td><td valign='top'>Last replied to at $getreplies3[showtime]<br><hr>";

   $message=strip_tags($getreplies3['post']);
   $message=nl2br($message);
   print "$message<hr><br>";
   print "</td></tr>";
}
print "</table>";
}


if ($formname=='post'){

print "<table class='maintables'>";
print "<tr class='headline'><td>Post a message</td></tr>";
print "<tr class='maintables'><td>";

if(isset($_POST['submit']))
{
   $name=$_POST['name'];
   $yourpost=$_POST['yourpost'];
   $subject=$_POST['subject'];
   if(strlen($name)<1)

   {
      print "You did not type in a name."; //no name entered
   }
   else if(strlen($yourpost)<1)
   {
      print "You did not type in a post."; //no post entered
   }
   else if(strlen($subject)<1)
   {
      print "You did not enter a subject."; //no subject entered
   }
   else
   {
      $thedate=date("U"); //get unix timestamp
      $displaytime=date("F j, Y, g:i a");
      //we now strip HTML injections
      $subject=strip_tags($subject);
      $name=strip_tags($name);
      $yourpost=strip_tags($yourpost); 
      $insertpost="INSERT INTO forum_posts(author,title,post,showtime,realtime,lastposter) values('$name','$subject','$yourpost','$displaytime','$thedate','$name')";
      mysql_query($insertpost) or die("Could not insert post"); //insert post
      print "Message posted, go back to <A href='?formname='>Forum</a>.";

   }



}

else

{
   print "<form action='?formname=post' method='post'>";
   print "Your name:<br>";
   print "<input type='text' name='name' size='20'><br>";
   print "Subject:<br>";
   print "<input type='text' name='subject' size='20'><br>";
   print "Your message:<br>";
   print "<textarea name='yourpost' rows='5' cols='40'></textarea><br>";
   print "<input type='submit' name='submit' value='submit'></form>";

}

print "</td></tr></table>";

}


if ($formname=='reply'){
print "<table class='maintables'>";
print "<tr class='headline'><td>Reply</td></tr>";
print "<tr class='maintables'><td>";
if(isset($_POST['submit']))
{
   $name=$_POST['name'];
   $yourpost=$_POST['yourpost'];
   $subject=$_POST['subject'];
   $id=$_POST['id'];
   if(strlen($name)<1)
   {
      print "You did not type in a name."; //no name entered
   }
   else if(strlen($yourpost)<1)
   {
      print "You did not type in a post."; //no post entered
   }
   else
   {
      $thedate=date("U"); //get unix timestamp
      $displaytime=date("F j, Y, g:i a");

      //we now strip HTML injections
      $subject=strip_tags($subject);
      $name=strip_tags($name);
      $yourpost=strip_tags($yourpost); 

      $insertpost="INSERT INTO forum_posts(author,title,post,showtime,realtime,lastposter,parentid) values('$name','$subject','$yourpost','$displaytime','$thedate','$name','$id')";
      mysql_query($insertpost) or die("Could not insert post"); //insert post
      
	  $updatepost="Update forum_posts set numreplies=numreplies+'1', lastposter='$name',showtime='$displaytime', lastrepliedto='$thedate' where postid='$id'";
      mysql_query($updatepost) or die("Could not update post");
      print "Message posted, go back to <A href='?formname=message&id=$id'>Message</a>.";
   }
}
else
{
   $id=$_GET['id'];
   print "<form action='?formname=reply' method='post'>";
   print "<input type='hidden' name='id' value='$id'>";
   print "Your name:<br>";
   print "<input type='text' name='name' size='20'><br>";
   print "Your message:<br>";
   print "<textarea name='yourpost' rows='5' cols='40'></textarea><br>";
   print "<input type='submit' name='submit' value='submit'></form>";
}
print "</td></tr></table>";
}
?>
							  		</TD>
                                  </tr>
                                </table></td>
                              </tr>
							  
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table> </TD>
                   </TR>
                     
                  </TABLE></TD>
                </TR>
                
            
    </TABLE></TD></TR></TBODY></TABLE></CENTER></DIV></BODY></HTML>
<?php
							}
							?>