<?php 
    include("includes/header.php");
?>
   
             <ul class="topics">
                <?php if($topics): ?>
                 <?php foreach($topics as $topic): ?>
                  <?php
                           echo"<pre>";
                           var_dump($topic);
                           echo"</pre>";    
                           ?>
                  <li class="topic">
                    <div class="row">
                       <div class="col-md-2">
                           
                         <img class="avatar pull-left" src="Design/image/Avatars/png/<?php echo $topic->avatar ?>">
                        </div>    
                        <div class="col-md-10">
                           <div class="topic-content pull-right">
                               <h3><a href="topic.html"><?php echo $topic->title; ?></a></h3>
                                <div class="topic-info">
                                <a href="topics.php?category=<?php echo urlFormat($topic->category_id);?>">
                                <?php echo $topic->catename ?></a> >> 
                                    <a href="topics.php?user=<?php echo urlFormat($topic->user_id); ?>">
                                    <?php echo $topic->username; ?></a> >> 
                                    <?php echo formatDate($topic->create_date); ?>
                                   <span class="badge pull-right"><?php echo replayCount($topic->id); ?></span>
                                </div>
                                                    
                            </div>
                        </div>                            
                     </div>
                    </li>
                 <?php endforeach; ?>
                <?php else: ?>
                    <p class="alert alert-info"> No Topics To Display </p>
                <?php endif; ?>                 
            </ul>
                                
            <!-- statics -->
            <h3>Forum Statistics </h3>
            <ul>
              <li>Total Number of Users: <strong>52</strong></li>
              <li>Total Number of Topics: <strong><?php echo $totalTopics; ?></strong></li>
              <li>Total Number of Categories: <strong><?php echo $totalCategories; ?></strong></li>    
            </ul>
            <!-- statics -->
                           





<?php
    include("includes/footer.php");
?>