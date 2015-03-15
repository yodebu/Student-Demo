<?php 
session_start();

include("conection.php");
include("modal.php");
if($_GET["view"] == "delete")
{
mysql_query("DELETE FROM studentdetails WHERE studid ='$_GET[slid]'");
}

if(isset($_SESSION["userid"]))
{
	if(isset($_GET['first'])) 
	{
	}
	else
	{
		$_GET['first'] =0;
	$_GET['last'] = 10;
	}
	
		if(isset($_POST["button"]))
	{
		$result = mysql_query("SELECT * FROM studentdetails where courseid='$_POST[courseid]' && semester='$_POST[semester]'");
	}
	else
	{
$result = mysql_query("SELECT * FROM studentdetails LIMIT $_GET[first] , $_GET[last]");
	}

$result1= mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
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
          <article class="post">
  <header class="postheader">
  <h2>Student Details</h2>
  <p>
  <form method="post" action="">
    <label for="textfield7"><strong>Course </strong></label>  
    <strong>&nbsp;&nbsp;
    <select name="courseid" id="select2">
      <option value=""> Select Course </option>
      <?php
 while($row1 = mysql_fetch_array($result1))
  {
  echo "<option value='$row1[courseid]'>$row1[coursekey]</option>";
  }
  ?>
    </select>
    &nbsp;  &nbsp;  &nbsp;
    <label for="textfield8">Semester</label>  
    &nbsp;
    <select name="semester" id="select">
     <option value=""> Select Semester </option>
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Fourth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
    </select> 
    </strong>
    <input type="submit" name="button" id="button" value="View Records" />
    
    </form>
  </p>
  </header>
  <section class="entry">
  </section>
  <section class="entry">
  </section>
  <section class="entry">
  </section>
  <section class="entry">
  <?php 
if(mysql_num_rows($result) >= 1)
{
	?>
    <table width="500" border="1">
      <tr>
        <td width="38"><strong>SL No.</strong></td>
        <td width="73"><strong>ID</strong></td>
        <td width="50"><strong>Name</strong></td>
        <td width="56"><strong>Date of birth</strong></td>
           <?php
      if($_SESSION["type"]=="admin")
	{
		?>
        <td width="119"><strong>Action</strong></td>
          <?php
	}
	?>
        </tr>
      <?php
$i =$_GET['first']+1;
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
    echo "<td>&nbsp;"  . $i . "</td>";
  echo "<td>&nbsp;" . $row['studid'] . "</td>";
  echo "<td>&nbsp;" . $row['studfname'] . " " . $row['studlname'] . "</td>";
    
	 echo "<td>&nbsp;" . $row['dob'] . "</td>";
	 
      if($_SESSION["type"]=="admin")
	{
	
	      echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[studid]&view=studentdetails'><img src='images/view.png' width='32' height='32' /></a>
		   <a href='studentins.php?slid=$row[studid]&view=studentdetails'>  <img src='images/edit.png' width='32' height='32' /></a>";
		   ?>
           
 <a href='student.php?slid=$row[studid]&view=delete'><img src='images/delete.png' width='32' height='32' onclick="return confirm('Are you sure??')"/></a></td>
	<?php
    }
  echo "</tr>&nbsp;";
 $i++;
  } 
    if($_SESSION["type"]=="admin")
	{
		$first=$_GET['first']-10;
$last= $_GET['last']- 10;
 
?>
      <tr>
        <td><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?>
    <a href="student.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
        <td colspan="2"><a href="#" onClick="openstudent(); return false"><img src="images/add.png" alt="" width="32" height="32" /></a></td>
          <?php 
$first=$_GET['first']+10;
$last = $_GET['last']+ 10;
?>
        <td><div align="right"><?php 
	if($first > mysql_num_rows($result))
	{ 
	} 
	else 
	{ ?>
    <a href="student.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" alt="" width="32" height="32" /></div></td>
        <td width="119" align="right">&nbsp;</td>
        </tr>
         <?php
	}
	?>
      </table>
      <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
<?php
     if($_SESSION["type"]=="admin")
	{
		?>
     <p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"><a href="#" onClick="openstudent(); return false"><strong>Add Students</strong></a></p>
 <?php
	}
	?>
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
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

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
