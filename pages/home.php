
<?php 
$query="SELECT * FROM form LEFT JOIN uploads ON form.uploads_id=uploads.id";
if(isset($_GET['submit'])){
    @$search=$_GET['search'];
    if($search != ''){
        $query .= " WHERE title LIKE '%".$search."%'";  
    }
}
$stmt = $conn->prepare($query);
$stmt->execute();
$game=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="title">PORTOFOLIO</h1>
            <div class="section">
             <form action="index.php?page=home" method="GET">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg" name='search' value="<?php echo @$search;?>" placeholder="Search by title..." />
                                    <span class="input-group-btn">
                                        <input class="btn btn-info btn-lg" type="submit" name='submit' value='Search' >
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
               </form>
               
                <div class="col-md-12 col-sm-12">
				
					<div class="col-lg-1 hidden-md hidden-sm hidden-xs photo"></div>
					<?php foreach($game as $row){ ?>
					
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 photo">
                      
						<div class='image-wrapper'>
							<img id="image" src="<?php echo $row['path'];?>" />
							<div class='image-title'><?php echo $row['title'];?></div>
						</div>
                        <div class='image-description'><?php echo $row['description'];?></div>
						<div class='col-md-12 text-center'><button class="btn btn-large btn-primary buton " type="button">Play Demo</button></div>
                    </div>
                    <?php
                    } ?>
                    

					<div class="col-lg-1 hidden-md hidden-sm hidden-xs photo"></div>
					
                </div>
            </div>