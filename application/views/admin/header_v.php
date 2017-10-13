<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="daru79">
        <link rel="icon" href="../../favicon.ico">

        <title>WCMS 1.0.0</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php print base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php print base_url('assets/admin/css/custom.css') ?>" rel="stylesheet">
        
        <!-- CKEditor script -->
        <script src="http://cdn.ckeditor.com/4.4.7/basic/ckeditor.js"></script>
        
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Press+Start+2P|UnifrakturCook:700|UnifrakturMaguntia' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><div class="logo"><span>WCMS 1.0.0</span></div></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php print base_url('admin/start_mail'); ?>">Start <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php print base_url('admin/content_start'); ?>">Treść</a></li>
                        <li><a href="<?php print base_url('admin/gallery_pic'); ?>">Zdjęcia</a></li>
                    </ul>
                    
                    <!-- Pole szukania 
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    /.Pole szukania -->
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php 
                            foreach($result as $item) {
                                print $item->a1_fname.' '.$item->a1_lname;
                                
                            }
                            ?>
                                
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php print base_url('admin/account/my_account'); ?>">Moje konto</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php print base_url('admin/account/sign_out'); ?>">Wyloguj mnie!</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->