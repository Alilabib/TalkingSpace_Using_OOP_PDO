        </div>
      </div>
    </div>
                    
    <div class="col-md-4">
      <div class="sidebar">
        <div class="block">
        <?php if(isLoggedIn()){ ?>
          <div class="user-data">
            <h3> Welcome  </h3>
            <img class="img-circle" src="includes\uploads\images\avatars\\<?php echo getUser()['avatar']; ?>">
             <h4> Welcome  </h4>
              <a href=""><?php echo getUser()['username']; ?></a>
              <form class="form-inline" action="logout.php" method="POST">
                <input type="submit" name="logout" class="btn btn-danger logoutbtn" value="LOG Out"> 
              </form>
           </div> 
        <?php }else{ ?>
          <h3>Login Form </h3>
            <form role="form" action="login.php" method="POST">
              <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" placeholder="User Name">
              </div>
              <div class="form-group">
                <label>User Password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
              </div>
                <button type="submit"   name="login" class="btn btn-primary">Login</button> 
                <a href="register.html" class="btn btn-default ">Create Account</a> 
            </form>
            <?php } ?>
        </div>
        <div class="block">
        <h3> Categories </h3>
        <div class="list-group">
          <a class="list-group-item <?php echo is_active(null); ?>" href="topics.php">All Topics  </a>
            <?php foreach(getCategories() as $category){ ?>  
          <a class="list-group-item <?php echo is_active($category->id); ?>" href="topics.php?category=<?php echo $category->id; ?>"><?php echo $category->catename; ?> 
           </a>
            <?php } ?>

        </div>
        </div>    
       </div>
      </div>
                    
    </div>
  </div>          
</div>        
<!-- Header -->
    <script src="Design/js/jquery.min.js"></script>
    <script src="Design/js/bootstrap.min.js"></script>
    <script src="Design/js/main.js"></script> 
    </body>
</html>