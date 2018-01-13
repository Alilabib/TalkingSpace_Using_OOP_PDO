<?php
    include("includes/header.php");
?>
<!-- Header -->
     
                           <!-- Registeration Form -->
                                <form role="form" enctype="multipart/form-data" action="register.php" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="Email" name="email" class="form-control" placeholder="Enter Your Email Address">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Choose UserName</label>
                                        <input type="text" name="username" class="form-control" placeholder="Create A username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Create Enter a Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password2" class="form-control" placeholder="Enter Password agian">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Your Avatar</label>
                                        <input type="file" name="avatar">
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label> About Me</label>
                                        <textarea  id="about" rows="6" cols="80" class="form-control" name="about" placeholder="Tell Us About  Yourself (Optional)">
                                        </textarea>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-default" value="Register">
                                </form>
                                <!-- Registeration Form -->
                          
        <!-- Header -->

<?php include("includes/footer.php"); ?>