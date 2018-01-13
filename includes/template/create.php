<?php 
    include ('includes/header.php');
?>
        <!-- Header -->
      
                                <!-- Registeration Form -->
                                <form role="form" enctype="multipart/form-data" action="register.php" method="post">
                                    <div class="form-group">
                                        <label>Topic Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option>Design</option>
                                            <option>Developmet</option>
                                            <option>Business & Marketing </option>
                                            <option>Search Engines</option>
                                            <option> Cloud & Hosting </option>
                                        </select>
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label> Topic Body </label>
                                        <textarea  id="about" rows="10" cols="80" class="form-control" name="body">
                                                
                                        </textarea>
                                        <script>CKEDITOR.replace('about');</script>  
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-default" value="Register">
                                </form>
                                <!-- Registeration Form -->
                          
        <!-- Header -->

<?php include('includes/footer.php'); ?>