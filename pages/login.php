
<form id='login' action="index.php?page=login" method="post">
   <div class="container">
    <div class="col-md-12  border_form">
    <ul class="error">
        
    </ul>
        
     <h2 class="title">Login</h2>
      <div class="input">
           <label for="title">Username</label>
           <div class="">
               <input class="form-control" id="username" type="text" name="username" value=""/>
               <div id="error_title" ></div>
           </div>
      </div>
      <div class="input">
           <label for="title">Password</label>
           <div class="">
               <input class="form-control" id="password" type="password" name="password" value=""/>
               <div id="error_title" ></div>
           </div>
      </div>
      <div class='col-md-12 text-center'>
         <input type="hidden" name="hidden" id="hidden" value="1">
          <input id="submit" class="btn btn-large btn-primary buton " type="submit" name="submit" value="Submit"/>
      </div> 
      
    </div>
    </div>
</form>
      