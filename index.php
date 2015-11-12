<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="upload_photo_css/jquery.fileupload.css">
    <link rel="stylesheet" href="upload_photo_css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="upload_photo_css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="upload_photo_css/jquery.fileupload-ui-noscript.css"></noscript>
        
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="my_js/function.js"></script>

        <link rel="stylesheet" type="text/css" href="my_css/style.css">
		
		
    </head>
    <body>
<?php if(isset($_SESSION['logged_in'])) { ?>
    <div class='col-md-12 logged_in'>
        You are logged in as 
        <label style='color:#D89818;'>
            <?php echo @$_SESSION['first_name'];?> 
            <?php echo @$_SESSION['last_name'];?> 
        </label>
        <div class="btn btn-large btn-primary buton " type="button"><a class='logout' href="logout.php">Logout</a></div>
        <div class="btn btn-large btn-primary buton " type="button"><a class='logout' href="index.php?page=add_form">Add Game</a></div>
        <div class="btn btn-large btn-primary buton " type="button"><a class='logout' href="index.php?page=home">Home</a></div>
    </div>
<?php } ?>
<?php if(@$page != 'login' && @$_SESSION['logged_in'] != true) { ?>
          <div class='col-md-12 logged_in'>
           <div class="btn btn-large btn-primary buton " type="button"><a class='logout' href="index.php?page=login">Login</a></div>
          </div>
<?php } ?>

            
<?php
   @$page=$_GET['page'];
   include_once('mysql_connect.php');
   switch($page){
       case 'home':
         include_once('pages/home.php');
         break;
       
       case 'add_form':
        if(@$_SESSION['logged_in']==true){
         include_once('pages/add_form.php');
        }
           else{
               include_once('pages/login.php');
           }
         break;
        
       case 'login':
         include_once('pages/login.php');
         break;
       case 'upload':
         include_once('pages/upload.php');
         break;
       default :
         include_once('pages/home.php');     
   }           
?>
        

    </body>
</html>