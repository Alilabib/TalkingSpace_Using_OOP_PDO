<?php include('includes/header.php'); ?>
   <!-- Header -->
       <!-- Topics -->
        <ul class="topics">
            
         <?php
            echo"<pre>";
            var_dump($topic); 
            echo"</pre>"
            ?>
            <!--Topic-->    
         <li class="topic profile-topic main-profile-topic">
          <div class="row">     
            <div class="col-md-2">
             <div class="user-info">
                 
              <img class="avatar pull-left" src="Design/image/Avatars/png/<?php echo  $topic->avatar; ?>">
              <ul class="info-list">
                <li><strong><?php echo $topic->username; ?></strong></li>
                <li><?php echo  userPostCount($topic->user_id);?>Posts</li>
                <li><a href="<?php echo BASE_URI;?>topics.php?user=<?php echo $topic->user_id; ?>">View Topics</a></li>
              </ul>
             </div>
            </div>    
            <div class="col-md-10">
             <div class="topic-content pull-right">
                <p><?php echo $topic->body; ?></p>        
             </div>    
            </div>
           </div>
          </li>
          <!--Topic-->
        <?php foreach($replies as $replay){ ?>
        <!--Replay-->    
         <li class="topic profile-topic main-profile-topic">
          <div class="row">     
            <div class="col-md-2">
             <div class="user-info">
              <img class="avatar pull-left" src="Design/image/Avatars/png/<?php echo  $replay->avatar; ?>">
              <ul class="info-list">
                <li><strong><?php echo $replay->username; ?></strong></li>
                <li><?php echo  userPostCount($replay->user_id);?>Posts</li>
                <li><a href="<?php echo BASE_URI;?>topics.php?user=<?php echo $replay->user_id; ?>">View Topics</a></li>
              </ul>
             </div>
            </div>    
            <div class="col-md-10">
             <div class="topic-content pull-right">
                <p><?php echo $replay->body; ?></p>        
             </div>    
            </div>
           </div>
          </li>
          <!--Replay-->
        <?php } ?>    
        </ul>
        <!-- Topics -->
        


    <!-- Topic Replay-->
      <h3> Replay To Topic </h3>
      <?php if(isLoggedIn()){ ?>
        <form role="form" action="topic.php?id=<?php echo$topic->id;?>" method="POST">
          <div class="form-group">
            <textarea id="replay" rows="10" cols="80" class="form-control" name="body"> </textarea>
                <script>
                  CKEDITOR.replace('replay');
                </script>
          </div>
           <button type="submit" name="Replay" class="btn btn-default" >Replay</button>
        </form> 
        <?php }else{ ?>
        <p> Please Login To Replay </p>   
      <?php } ?>  
    <!-- Topic Replay -->
            
         
        <!-- Header -->
<?php include('includes/footer.php'); ?>