<?php 
    include ('includes/header.php');
?>
        <!-- Header -->
      
                                <!-- Registeration Form -->
                                <form role="form" enctype="multipart/form-data" action="create.php" method="post">
                                    <div class="form-group">
                                        <label>Topic Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                         <?php foreach (getcategories() as $category){ ?>
                                                <option value="<?php echo $category->id ?>"><?php echo $category->catename ?></option>
                                         <?php } ?>
                                        
                                        </select>
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label> Topic Body </label>
                                        <textarea  id="about" rows="10" cols="80" class="form-control" name="body">
                                                
                                        </textarea>
                                        <script>CKEDITOR.replace('about');</script>  
                                    </div>
                                    <input type="submit" name="create" class="btn btn-default" value="Create">
                                </form>
                                <!-- Registeration Form -->
                          
        <!-- Header -->

<?php include('includes/footer.php'); ?>