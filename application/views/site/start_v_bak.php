    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($slider as $item) { ?>
                            
                            <div class="item <?php if($item->c11_status == 0) { print 'active'; }?>">
                                <img class="img-responsive" src="<?php print base_url('uploads/'.$item->c11_pic); ?>" alt="<?php print $item->c11_alt; ?>" width="100%">
                                <div class="carousel-caption">
                                    <h3><strong><?php print $item->c11_title; ?></strong></h3>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <?php foreach($content as $item) { ?>
                    <?php if($item->c1_id == 1) { ?>
                    
                    <h2 class="brand-before">
                        <small><?php print $item->c1_header; ?></small>
                    </h2>
                    <h1 class="brand-name"><?php print $item->c1_title; ?></h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small><?php print $item->c1_subtitle; ?></small>
                    </h2>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-justify">
                    
                    <hr>
                    <?php foreach($content as $item) { ?>
                    <?php if($item->c1_id == 2) { ?>
                    
                    <h2 class="intro-text text-center"><?php print $item->c1_header; ?></h2>
                    <hr>
                    
                    <h3 class="text-center"><?php print $item->c1_title; ?>
                        <br>
                        <small><?php print $item->c1_subtitle; ?></small>
                    </h3>
                    
                    <img class="img-responsive img-left" src="<?php print base_url('uploads/'.$item->c1_pic); ?>" alt="" width="250">
                    <hr class="visible-xs">
                    <?php print $item->c1_text; ?>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->