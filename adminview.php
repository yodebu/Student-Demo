<?php 
session_start();

include("conection.php");
include("modal.php");
$abc = 100;
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM administrator WHERE adminid ='$_GET[slid]'");
}
if(isset($_SESSION["userid"]))
{
	if(isset($_GET[first])) 
	{
	}
	else
	{
		$_GET[first] =0;
	$_GET[last] = 10;
	}
$result = mysql_query("SELECT * FROM administrator LIMIT $_GET[first] , $_GET[last]");

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
          <h2>Admin Menu</h2>
          <p></p>
	<h2 class="sitedescription">
Admin Details.  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Admin Details</h2>
  </header>
  <section class="entry">
  <font color="#330000">
    <table width="458" border="1">
  <tr>
    <th width="62" scope="col">Admin ID</th>
    <th width="73" scope="col">Admin Name</th>
    <th width="73" scope="col">Address</th>
    <th width="84" scope="col">Contact No</th>
    <th width="132" scope="col">Action</th>
  </tr>
  
  <?php
    $i =$_GET['first']+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td align=center>&nbsp;" . $i . "</td>";
  echo "<td>&nbsp;" . $row['adminname'] . "</td>";
   echo "<td>&nbsp;" . $row['address'] . "</td>";
   echo "<td>&nbsp;" . $row['contactno'] . "</td>";
   echo "<td>&nbsp; <a href='viewrecords.php?slid=$row[adminid]&view=administrator'><img src='images/view.png' width='32' height='32' /></a>
 <a href='addadmin.php?slid=$row[adminid]&view=administrator'>  <img src='images/edit.png' width='32' height='32' /></a>";
 ?>
 <a href='adminview.php?slid=$row[adminid]&view=delete'><img src='images/delete.png' width='32' height='32' onclick="return confirm('Are you sure??')" /></a> </td>
<?php
echo "</tr>&nbsp;";
	$i++;
  }
  $first=$_GET['first']-10;
$last= $_GET['last']- 10;
  ?>
  <tr>
    <th scope="col"><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?>
    <a href="adminview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" width="32" height="32" /></th>
    <th scope="col">
<a href="#" onClick="openadmin(); return false"><img src="images/add.png" width="32" height="32" /></a> <span id="youremail" style="color: red"></span>
</a></th> <?php 
$first=$_GET['first']+10;
$last = $_GET['last']+ 10;
?>
    <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    <th scope="col"><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="adminview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" width="32" height="32" /></th>
  </tr>
  </table>
  </section>
        </div><!--close content_item-->
	    
		  <div class="sidebar_container">  	  
		    <div class="sidebar">
              <div class="sidebar_item">
			  <?php 
}
else
{
		header("Location: admin.php");
}

include("adminmenu.php");

?>	  
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
