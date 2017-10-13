    <div class="container">
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-justify">
                    
                    <hr>
                    <?php foreach($content as $item) { ?>
                    
                    <h2 class="intro-text text-center">oferta</h2>
                    <hr>
                    
                    <h3 class="text-center"><?php print $item->c1_title; ?>
                        <br>
                        <small><?php print $item->c1_subtitle; ?></small>
                    </h3>
                    
                    <img class="img-responsive img-left" src="<?php print base_url('uploads/'.$item->c1_pic); ?>" alt="" width="500">
                    <hr class="visible-xs">
                    <?php print $item->c1_text; ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->