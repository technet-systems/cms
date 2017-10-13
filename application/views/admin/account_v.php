<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WCMS 0.3</title>

    <!-- Bootstrap -->
    <link href="<?php print base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <!-- Custom -->
    <link href="<?php print base_url('assets/admin/css/custom.css'); ?>" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P|UnifrakturCook:700|UnifrakturMaguntia' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><div class="logo"><span>WCMS 1.0.0</span></div></a>
            </div>

        </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container">

        <div class="row">
            <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-3 col-sm-6 col-sm-offset-3 col-md-offset-4 col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Logowanie</div>
                    <div class="panel-body">
                        <?php 
                        if(isset($message_sign_out)) { ?>
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="glyphicon glyphicon-info-sign"></span> <?php print $message_sign_out; ?>
                            </div>
                            
                        <?php } else if(isset($message_access_deny)) { ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="glyphicon glyphicon-warning-sign"></span> <?php print $message_access_deny; ?>
                            </div>
                        
                        <?php }                        
                        print form_open('admin/account/sign_in'); 
                        ?>
                        
                        <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-warning-sign"></span> ', '</div>'); ?>
                        
                        

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <?php 
                                $attr = array(
                                    'name' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'Mail'
                                    
                                );
                                
                                print form_input($attr);
                                ?>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <?php 
                                $attr = array(
                                    'name' => 'password',
                                    'class' => 'form-control',
                                    'placeholder' => 'Hasło'
                                    
                                );
                                
                                print form_password($attr);                                
                                ?>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="btn-group pull-right" role="group">
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Odzyskaj swoje hasło">Resetuj</button>
                                <button type="submit" class="btn btn-primary">Zaloguj</button>
                            </div>
                        </div>
                        <?php print form_close(); ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <footer class="text-center">
            <div class="logo">TECHNET.SYSTEMS</div>
            &copy; 2015
        </footer>

    </div><!--/.container-->
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php print base_url('assets/js/bootstrap.min.js'); ?>"></script>
    
    <!-- START: Skrypt dla 'podpowiadacza tekstowego' od Bootstrapa -->
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        
    });
    </script>
    <!-- KONIEC: Skrypt dla 'podpowiadacza tekstowego' od Bootstrapa -->
    
</body>
</html>