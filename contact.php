<?php
include("validation.php");
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
          <h2>Contact Us</h2>
          <p></p>
		  <?php
  if(isset($_POST["name"]))
  {
  include("conection.php");
$sql="INSERT INTO contact (name, emailid, contactno, subject, message) VALUES ('$_POST[name]','$_POST[email]','$_POST[contact]','$_POST[subject]','$_POST[message]')";
if (!mysql_query($sql,$con))
  {
  die('Error in mysql: ' . mysql_error());
  }
  else
  {
echo "Mail sent Successfully...<br /><p>You will be contact soon.....</p>";
  }
  }
  else
  {
	  ?>
		<form name="form1" method="post" action="" id="formID">
          <p class="textfield">
		  <label for="author">
             <small>Name (required)</small>
          </label>
       <input name="name" id="name" value="" size="22" tabindex="1" type="text" class="validate[required,custom[onlyLetterSp]] text-input">    
   </p>
   <p class="textfield">
   <label for="email">
              <small>Mail (will not be published) required)</small>
          </label>
       <input name="email" id="email" value="" size="22" tabindex="2" type="text" class="validate[required,custom[email]] text-input">
   </p>
   <p class="textfield">
   <label for="email">
              <small>Contact No</small>
          </label>
       <input name="contact" id="" value="" size="22" tabindex="2" type="text" class="validate[required,custom[email]] text-input">
   </p>
    <p class="textfield">
	<label for="url">
             <small>Subject</small>
          </label>
       <input name="subject" id="subject" value="" size="22" tabindex="3" type="text" class="validate[required] text-input">      
   </p>
   <p>
       <small><strong>Message</strong></small>
   :</p>
   <p class="text-area">
       <textarea name="message" id="message" class="validate[required]"  cols="50" rows="10" tabindex="4"></textarea>
   </p>
   <p>
       <input name="submit" id="submit" tabindex="5" type="submit">
       <input name="comment_post_ID" value="1" type="hidden">
   </p>
   <div class="clear"></div>
</form>
		  <?php
  }
  ?>
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
