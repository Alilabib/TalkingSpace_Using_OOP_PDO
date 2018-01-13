<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> TALKING  </title>
        <link rel="stylesheet" href="Design/css/bootstrap.css">
        <link rel="stylesheet" href="Design/css/Custom-bootstrap.css">
        <link rel="stylesheet" href="Design/css/main.css">
        <link rel="stylesheet" href="Design/css/font-awesome.min.css">
        <script src="Design/js/ckeditor/ckeditor.js"></script> 
        <?php
            //Check if title is set , if not assign it 
            if(!isset($title)){
                $title = SITE_TITLE;
            }
        ?>
    </head>
    
    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Talking Space</a>    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="register.php">Create Account <i class="fa fa-user-plus"></i></a></li>
                        <li><a href="create.php">Create a Topic    <i class="fa fa-calendar"></i></a></li>
                        
                    </ul>
                </div><!--/ .navbar-collapse -->
            </div>
            
        </div>
        <!-- Navbar -->
                    <!-- Header -->
        <div class="header">
            
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="main-col"> 
                            <div class="block">
                                <h2 class="pull-left"> <?php echo $title; ?> </h2>
                                <h4 class="pull-right">A Simple PHP Forum Engine</h4>
                                <div class="clearfix"></div>   
                                <hr>
                                
        