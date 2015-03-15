<?php
session_start();

include("conection.php");
include("modal.php");
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
		$resultac = mysql_query("SELECT * FROM examination");
	echo	mysql_num_rows($result);
	}
	else
	{
	$result = mysql_query("SELECT * FROM examination LIMIT $_GET[first] , $_GET[last]");
	}
$result1 = mysql_query("SELECT * FROM course LIMIT $_GET[first] , $_GET[last]");
$result2 = mysql_query("SELECT * FROM subject LIMIT $_GET[first] , $_GET[last]");
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
  
  <script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
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
  <h2>Examination Details</h2>
  <p>&nbsp;</p>
   <?php include("selectcss.php"); ?>
  </header>
  <section class="entry">
     <p>
       <?php 
if(mysql_num_rows($resultac) >= 1)
{
	?>
     </p>
     <table width="533" border="1">
       <tr>
    <td width="57">ExamID</td>
    <td width="66">StudentID</td>
    <td width="64">SubjectID</td>
    <td width="60">CourseID</td>
    <td width="54">Internal Type</td>
    <td width="63">Max Marks</td>
    <td width="56">Scored</td>
    <td width="61">Result</td>
    <td width="62"><strong>Action</strong></td>
  </tr>
      <?php
	 $i =$_GET['first']+1;
  while($row = mysql_fetch_array($resultac))
  {
  echo "<tr>";
  echo "<td>&nbsp;"  . $i . "</td>";
    	  echo "<td>&nbsp;" . $row['studid'] . "</td>";
	   echo "<td>&nbsp;" . $row['subid'] . "</td>";
	   echo "<td>&nbsp;" . $row['courseid'] . "</td>";
	     echo "<td>&nbsp;" . $row['internaltype'] . "</td>";  
		 echo "<td>&nbsp;" . $row['maxmarks'] . "</td>";
		 echo "<td>&nbsp;" . $row['scored'] . "</td>";
		 echo "<td>&nbsp;" . $row['result'] . "</td>";
	   	  	   	   echo "<td>&nbsp;<a href='viewrecords.php?slid=$row[examid]&view=examination'><img  src='images/view.png' width='32' height='32' /></a> <a href='examupdate.php?exid=$row[examid]'> <img src='images/edit.png' width='32' height='32' /></a> . </td>";
  echo "</tr>&nbsp;";
  $i++;
  }
  $first=$_GET['first']-10;
$last= $_GET['last']- 10;
?>

 <tr>
          <td><?php 
	if($first <0)
	{ 
	} 
	else 
	{ ?><a href="examview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    
    <?php 
	}
	?><img src="images/previous.png" alt="" width="32" height="32" /></td>
          <td><a href="exam.php" ><img src="images/add.png" alt="" width="32" height="32" /></a></td>
           <?php 
$first=$_GET['first']+10;
$last = $_GET['last']+ 10;
?>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php 
	if($first > mysql_num_rows($resultac))
	{ 
	} 
	else 
	{ ?>
    <a href="examview.php?first=<?php echo $first; ?>&last=<?php echo $last; ?>">
    <?php
	}
	?><img src="images/next.png" alt="" width="32" height="32" /></td>
        </tr>
  
</table>
     <p>
       <?php
}
else
{
	echo "<h2>No Records Found...</h2>";
}
?>
     </p>
     <?php
     if($_SESSION["type"]=="admin")
	{
		?>
     <p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"><a href="exam.php" ><strong>Add Examination Records</strong></a></p>
 <?php
	}
	?>
  </section>
<p><a href="examview.php?first=<?php echo $first; ?>&amp;last=<?php echo $last; ?>"></a></p>

		  
        </div><!--close content_item-->
	    
		  <div class="sidebar_container">  	  
		    <div class="sidebar">
              <div class="sidebar_item">
			  <p>
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
</p>
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
