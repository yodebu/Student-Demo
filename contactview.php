<?php

include("conection.php");
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM contact WHERE contactid ='$_GET[slid]'");
}
$result = mysql_query("SELECT * FROM contact");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Student Information System</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
</head>

<body>
  <div id="main">
    <div id="site_content">  
	  <div id="menubar">
        <ul class="lavaLampWithImage" id="lava_menu">
          <li class="current"><a href="index.html">Home</a></li>
          <li><a href="ourwork.html">Students</a></li>
          <li><a href="testimonials.html">Testimonials</a></li>
          <li><a href="projects.html">Admin</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
	  </div><!--close menubar-->	
      <div id="header">  
        <h1>Student<span> Information System</span></h1>	
	    <h2>Get Students data</h2>
      </div><!--close header-->		
      <div id="content">
        <div class="clear"></div>
        <div class="content_item">
          <header class="postheader">
  <h2>Contact Inbox</h2>
  </header>
  <section class="entry">
  <form name="form2" method="post" action="">
<table width="485" border="1">
  <tr>
    <td width="56">&nbsp;</td>
<td width="202"><strong>Name</strong></td>
    <td width="205"><strong>Subject</strong></td>
  </tr>
  <?php
	  $i =1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp";
  ?>
  <a href='contactview.php?slid=<?php echo $row['contactid']; ?>&view=delete'><img src='images/delete.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a>
  <?php
  echo  $i . " </td>";
     	  echo "<td>&nbsp;" . $row['name'] . "</td>";
	   echo "<td>&nbsp;<a href='inbox.php?cid=$row[contactid]'>" . $row['subject'] . "</a></td>";
  echo "</tr>&nbsp;";
  $i++;
  }
  
?>

  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table>
    </form>
  </section>
		  
        </div><!--close content_item-->
	    
		  <div class="sidebar_container">  	  
		    <div class="sidebar">
              <div class="sidebar_item">
			  <?php include('adminmenu.php'); ?>
                <h2>Latest Blog</h2>
			    <h4>April 2012</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim.</p>
		          <a href="#">Read more</a>
              </div><!--close sidebar_item--> 
            </div><!--close sidebar-->     		 
           </div><!--close sidebar_container-->	
         <br style="clear:both;" />
      </div><!--close content-->	
    </div><!--close site_content-->	
    <div id="footer">
&copy;2012 All right reserve. 	
       </div><!--close footer-->	
  </div><!--close main-->	
</body>
</html>
