<?php 
session_start();
//echo $_SESSION["uid"];
if(isset($_SESSION["userid"]))
{
	if($_SESSION["type"]=="admin")
	{
	header("Location: dashboard.php");
	}
	else
	{	
	header("Location: lectureaccount.php");
	}
}

include("conection.php");
if(isset($_POST["uid"]) && isset($_POST["pwd"]) )
{
//	echo "sdfsd".	$_POST[uid];
$result = mysql_query("SELECT * FROM administrator WHERE adminid='$_POST[uid]'");
while($row = mysql_fetch_array($result))
  {
$pwdmd5 = $row["password"];
  }

if(md5($_POST["pwd"])==$pwdmd5)
{
	$_SESSION["userid"] = $_POST["uid"];
	$_SESSION["type"]="admin";
	header("Location: dashboard.php");
}
else
{
$log =  "Login failed.. Please try again..";
}
}

if(isset($_POST["luid"]) && isset($_POST["lpwd"]))
{

$result = mysql_query("SELECT * FROM lectures WHERE lecid='$_POST[luid]'");
	while($row = mysql_fetch_array($result))
 	 {
$pwdm= $row["password"];
$_SESSION["lecname"] = $row["lecname"];
$_SESSION["coid"] = $row["courseid"];
  	}
//echo"pwd". md5($_POST["lpwd"]);

if(md5($_POST["lpwd"])==$pwdm)
	{
		//echo $_POST["lpwd"];
	$_SESSION["userid"] = $_POST["luid"];
	$_SESSION["type"]=="lecturer";
	header("Location: lectureaccount.php");
	}
else
	{
		$log12 =  "Login failed.. Please try again..";
	}
}
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
          <h2>Login for Admin and Staffs (Lecturers, Professors)</h2>
          <p></p>
		  <article class="post">
  <header class="postheader">
  <h2><u>Admin Login</u></h2>
  <h2><?php  //echo $log;?></h2>
  </header>
  <section class="entry">
  <form action="admin.php" method="post" class="form">
   <p class="textfield">
      <label for="author">
             <small>Admin Login ID (required)</small>
          </label>
           <input name="uid" id="uid" value="" size="22" tabindex="1" type="text">
   </p>
   <p class="textfield">
   <label for="email">
              <small>Password (required)</small>
          </label>
       <input name="pwd" id="pwd" value="" size="22" tabindex="2" type="password">
   </p>
   <p>
     <input name="submit" id="submit" tabindex="5" type="submit" />
     <input name="comment_post_ID" value="1" type="hidden">
     
   </p>
   <div class="clear"></div>
</form>
  <form action="admin.php" method="post" class="form">
<div class="clear">
<hr />
  <header class="postheader">
    <h2><u>College Staff Login</u></h2>
    <h2><?php //echo $log12;?></h2>
  </header>
  <section class="entry">

      <p class="textfield">
        <label for="author2"> <small><br />
          Staff Login ID (required)</small> </label>
        <input name="luid" id="luid" value="" size="22" tabindex="3" type="text" />
      </p>
      <p class="textfield">
        <label for="email2"> <small>Password (required)</small> </label>
        <input name="lpwd" id="lpwd" size="22" tabindex="4" type="password" />
      </p>
      <p>
        <input name="submit2" id="submit2" tabindex="5" type="submit" />
        <input name="comment_post_ID2" value="1" type="hidden" />
      </p>
      <div class="clear"></div>
    </form>
    <div class="clear"></div>
  </section>
</div>
</section>
</article>
        </div><!--close content_item-->
	    
		  <div class="sidebar_container">  	  
		    <div class="sidebar">
              <div class="sidebar_item">
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
