<?php
$errors=array();
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $file_id=$_POST['file_id'];
    if(empty($title)){
        $errors[]="Empty title";
    }
    if(!preg_match("/^[\w ]+$/", $title)){
        $errors[]="Just numbers and letters allowed";
    }
    if(empty($description)){
        $errors[]="Empty description";
    }
    if(strlen($description)>200){
        $errors[]="Only 200 characters allowed";
    }
    if(empty($errors) && $title && $description){
        $query="INSERT INTO `form` (`title`,`description`,`uploads_id`) VALUES ('$title','$description','$file_id')";
        $stmt=$conn->prepare($query);
        $stmt->execute();
    }
    else{
        $errors[]='Add game failed';
    }
    
}

?>

<form id="fileupload" action="index.php?page=add_form" method="post" enctype="multipart/form-data">

  <input class="hidden_input" value="<?php echo @$game_id;?>" />
   <div class="container">
    <div class="col-md-12  border_form">
       <?php if(!empty($errors)){?>
        <ul class="error">
            <?php foreach($errors as $error):?>
                <li><?php echo $error;?></li>
            <?php endforeach;?>
        </ul>
        <?php } ?>
     <h2 class="title">Add Game</h2>
      <div class="input">
           <label for="title">Title</label>
           <div class="">
               <input class="form-control" id="title" type="text" name="title" value="<?php echo @$title;?>"/>
               <div id="error_title" ></div>
           </div>
      </div>
      <hr>
      <div class="input">
           <label for="description">Description</label>
           <div>
               <textarea class="form-control" name="description" id="description" cols="" rows="4" value="<?php echo $description;?>"></textarea>
               <div id="error_description" ></div>
           </div>
      </div>
      <hr>
      <div>
          <div id="error_upload" ></div>
           <?php include_once("upload.php");?>
      </div>
      <div class='col-md-12 text-center'>
          <input id="submit" class="btn btn-large btn-primary buton " type="submit" name="submit" value="Submit"/>
      </div> 
    </div>
  </div>
</form>